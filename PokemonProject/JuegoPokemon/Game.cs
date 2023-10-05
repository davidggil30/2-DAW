using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.IO;
using System.Linq;
using System.Linq.Expressions;
using System.Runtime.ConstrainedExecution;
using System.Runtime.InteropServices;
using System.Runtime.Remoting;
using System.Runtime.Remoting.Messaging;
using System.Runtime.Serialization.Formatters.Binary;
using System.Security.Cryptography;
using System.Security.Policy;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Documents;
using System.Windows.Markup.Localizer;
using System.Windows.Shapes;
using MySqlConnector;
using static System.Net.WebRequestMethods;
using File = System.IO.File;

namespace JuegoPokemon
{
    class Game
    {
        Random rnd;
        int timeSleep = 0;

        Trainer trainer;
        IndividualPokemon[] initialPokemon;
        IndividualPokemon[] rivalPokemon;
        IndividualPokemon[] myPokemons; //trainer
        IndividualPokemon myRivalPokemon;
        IndividualPokemon[][] boxesPokemon;//trainer
        Movements[] moves;
        Item[] item;

        Bag bag;

        public IndividualPokemon[] InitialPokemons() // Posibles POKéMONs iniciales
        {
            List<IndividualPokemon> initPokemonList = new List<IndividualPokemon>();
            MySqlConnection con;
            con = new MySqlConnection("server=127.0.0.1; database=Pokemon; Uid=root; pwd=1234");
            con.Open();

            MySqlCommand query = new MySqlCommand("select * from InitPokemon", con);
            MySqlDataReader r = query.ExecuteReader();

            while (r.Read())
            {
                string specie = r.GetString(0);
                string type = r.GetString(1);
                int id = r.GetInt32(2);
                int level = r.GetInt32(3);
                int maxHP = r.GetInt32(4);
                int currentHP = r.GetInt32(5);
                int attack = r.GetInt32(6);
                int specialAttack = r.GetInt32(7);
                int defense = r.GetInt32(8);
                int specialDefense = r.GetInt32(9);
                int speed = r.GetInt32(10);
                IndividualPokemon pok = new IndividualPokemon(new SpeciesPokemon(specie, type, id, level, maxHP, currentHP, attack, specialAttack, defense, specialDefense, speed));
                initPokemonList.Add(pok);
                
                //return initPokemons;
            }
            IndividualPokemon[] initPokemons = initPokemonList.ToArray();
            con.Close();
            return initPokemons;
        }

        public IndividualPokemon[] RivalPokemons() // Posibles POKéMONs rivales
        {
            IndividualPokemon[] rivalPokemons = new IndividualPokemon[3];
            rivalPokemons[0] = new IndividualPokemon(new SpeciesPokemon("RATTATA", "NORMAL", 019, 5, 30, 30, 56, 25, 35, 35, 72));
            rivalPokemons[1] = new IndividualPokemon(new SpeciesPokemon("KAKUNA", "BUG", 014, 5, 45, 45, 25, 25, 50, 25, 35));
            rivalPokemons[2] = new IndividualPokemon(new SpeciesPokemon("SPEAROW", "FLYING", 021, 5, 40, 40, 60, 31, 30, 31, 70));
            return rivalPokemons;
        }

        public Item[] AllItemShop() // Los Items que tenemos en la tienda
        {
            Item[] allItem = new Item[26];
            allItem[0] = new Potion("Potion", 20, 0, 0 , 20, 0, 0);
            allItem[1] = new Potion("SuperPotion", 60, 0, 0, 60, 0, 0);
            allItem[2] = new Potion("HyperPotion", 200, 0, 0,200, 0, 0);
            allItem[3] = new Potion("MaxPotion", 400, 0, 0,400, 0, 0);
            allItem[4] = new Revives("Revives", 200, 0, 0, 200, 0, 0);
            allItem[5] = new Revives("MaxRevives", 500, 0, 0,  500, 0, 0);
            allItem[6] = new Elixirs("Ether", 100, 0, 0, 100, 0, 0);
            allItem[7] = new Elixirs("MaxEther", 200, 0, 0,  200, 0, 0);
            allItem[8] = new Elixirs("Elixir", 400, 0, 0 ,  400, 0, 0);
            allItem[9] = new Elixirs("MaxElixir", 800, 0, 0, 800, 0, 0);
            allItem[10] = new PokeballItem("Pokeball", 15, 0, 0, 15, 0, 0);
            allItem[11] = new PokeballItem("Superball", 100, 0, 0, 100, 0, 0);
            allItem[12] = new PokeballItem("Ultraball", 500, 0, 0, 500, 0, 0);
            allItem[13] = new PokeballItem("Masterball", 2000, 0, 0, 2000, 0, 0);
            allItem[14] = new Treasure("Perl", 1000, 0, 0, 1000, 0, 0);
            allItem[15] = new Treasure("Stardust", 1500, 0, 0, 1500, 0, 0);
            allItem[16] = new Treasure("Big Mushroom", 2500, 0, 0, 2500, 0, 0);
            allItem[17] = new Treasure("Big Pearl", 4000, 0, 0, 4000, 0, 0);
            allItem[18] = new Treasure("Nugget", 5000, 0, 0, 5000, 0, 0);
            allItem[19] = new Treasure("Star Piece", 6000, 0, 0, 6000, 0, 0);
            allItem[20] = new Treasure("Comet Shard", 12500, 0, 0, 12500, 0, 0);
            allItem[21] = new Treasure("Big Nugget", 20000, 0, 0, 20000, 0, 0);
            allItem[22] = new Treasure("Relic Gold", 30000, 0, 0, 30000, 0, 0);
            allItem[23] = new EvolutionStone("WaterStone", 50000, 0, 0, 50000, 0, 0);
            allItem[24] = new EvolutionStone("FireStone", 50000, 0, 0, 50000, 0, 0);
            allItem[25] = new EvolutionStone("ThunderStone", 50000, 0, 0, 50000, 0, 0);
            return allItem;
        }
        

        IO functions;
        public Game(IO functions)
        {
            this.functions = functions;
            this.rnd = new Random();
        }

        // menu cargar partida
        public void Run()
        {
            int option;
            do
            {
                functions.SlowType(" ¿Quieres cargar una partida guardada?", timeSleep);
                string[] options = { "\n\t 1.- Si", "\t 2.- No" };
                option = functions.ChooseOption(options , timeSleep);
            } while (option != 1 && option != 2);
            switch(option){
                case 1:
                    LoadGame();
                    break;
                case 2:
                    GamePokemon();
                    break;
                default:
                    break;
            }
        }
        
        // cargar la partida
        public void LoadGame()
        {
            functions.SlowType("¿Qué partida quieres abrir?", timeSleep);
            string path = functions.Text();
            path += ".bin";
            BinaryFormatter bf = new BinaryFormatter();
            FileStream file = System.IO.File.OpenRead(path);
            object ob = bf.Deserialize(file);
            Trainer tr = (Trainer)ob;
            MainMenu();
        }

        // Elegir juego estándar o juego rápido
        public void GamePokemon()
        {
            int option = 0;
            do
            {
                functions.SlowType("\n ¿Qué modo de juego quieres jugar?", timeSleep);
                string[] options = { "\n\t 1.- Juego estándar", "\t 2.- Juego rápido" };
                option = functions.ChooseOption(options , timeSleep);
            } while (option != 1 && option != 2);
            switch (option)
            {
                case 1:
                    StandardGame();
                    break;
                case 2:
                    //LoadGame();
                    FastGame();
                    break;
            }
        }

        // Juego rápido
        public void FastGame()
        {
            timeSleep = 0;
            TrainerData();
            //Trainer trainer = new Trainer("Dvaid", "Chico", IdTrainer(), bag);
            trainer.SetInitTime(DateTime.Now);
            functions.SlowType("\n ¡Bienvenido al mundo POKéMON!", timeSleep);
            initialPokemon = InitialPokemons();
            functions.SlowType("\n\t Tu POKéMON será " + initialPokemon[0].GetSpecie(), timeSleep);
            myPokemons = trainer.MyPokemons();
            rivalPokemon = RivalPokemons();
            boxesPokemon = trainer.Boxes();
            myPokemons[0] = initialPokemon[0];
            myPokemons[0].SetEo(trainer.GetId());
            MainMenu();
        }

        //Juego estándar
        public void StandardGame()
        {
            functions.SlowType("¡Hola! \n¡Éste es el mundo de POKéMON! \n¡Me llamo OAK! ¡Pero la gente me llama PROFESOR POKéMON! " +
                "¡Éste mundo está habitado por unas criaturas llamadas POKéMON!" + "\nPara algunos los POKéMON son sólo mascotas. Pero otros los usan para pelear. " +
                "\nBueno, cuéntame algo de ti...", timeSleep);
            TrainerData();
            functions.SlowType("\nBienvenido " + trainer.GetName() + ", vamos a comenzar.\n", timeSleep);
            initialPokemon = InitialPokemons();
            myPokemons = trainer.MyPokemons();
            ChooseInitPokemon();
            rivalPokemon = RivalPokemons();
            boxesPokemon = trainer.Boxes();
            MainMenu();
        }

        // Datos del jugador
        public void TrainerData()
        {
            string name = NameTrainer();
            string genderTrainer = GenderTrainer();
            string idTrainer = IdTrainer();
            bag = new Bag();
            trainer = new Trainer(name, genderTrainer, idTrainer, bag);
            trainer.SetInitTime(DateTime.Now);
        }

        // Imprimir datos del entrenador
        public void PrintTrainerData()
        {
            functions.SlowType("\n\t Nombre: " + trainer.GetName() + 
                    "\n\t Género: " + trainer.GetGender() +
                    "\n\t ID: " + trainer.GetId() +
                    "\n\t Pokedollares: " + trainer.GetPokeDollars() +
                    "\n\t Puntos de batalla: " + trainer.GetBattlePoints() +
                    "\n\t Pokemillas: " + trainer.GetPokemillas() +
                    "\n\t Fecha de comienzo de la aventura: " + trainer.GetInitDate() +
                    "\n\t ", timeSleep);
        }

        // Elegir nombre del entrenador
        public string NameTrainer()
        {
            functions.SlowType("\n ¿Cómo te llamas? \n\t", timeSleep);
            string name = functions.Text();
            return name;
        }

        // Elegir género del entrenador
        public string GenderTrainer()
        {
            int option = 0;
            do
            {
                functions.SlowType("\n ¿De qué género eres?", timeSleep);
                string[] options = {"\n\t 1.- Chico", "\t 2.- Chica" , "\t 3.- Otro" };
                option = functions.ChooseOption(options , timeSleep);
                //functions.SlowType("\n    Introduce una opción: ", timeSleep);
                //option = functions.IntToString();
                switch (option)
                {
                    case 1:
                        return "Chico";
                    case 2:
                        return "Chica";
                    case 3:
                        return "Otro";
                }
            } while (option > 0 && option < 4);
            functions.SlowType(" Introduce una opción correcta \n", timeSleep);
            return GenderTrainer();
        }

        // Elegir número ID del entrenador
        public string IdTrainer()
        {
            int minValue = 000000000;
            int maxValue = 1000000000;
            int numRegion = 0;
            string id = "";
            int option = 0;
            int numCompleteId = Random(minValue, maxValue);
            do
            {
                functions.SlowType("\n ¿A qué zona perteneces?", timeSleep);
                string[] options = {"\n\t 1.- Europa", "\t 2.- Norte América", "\t 3.- Asia-Australia", "\t 4.- África", "\t 5.- Sur América" };
                option = functions.ChooseOption(options , timeSleep);
                //functions.SlowType("\n    Introduce una opción: ", timeSleep);
                //option = functions.IntToString();
                switch (option) {
                    case 1:
                        numRegion = 0;
                        id = String.Concat(numRegion, numCompleteId);
                        return id;
                    case 2:
                        numRegion = 1;
                        id = String.Concat(numRegion, numCompleteId);
                        return id;
                    case 3:
                        numRegion = 2;
                        id = String.Concat(numRegion, numCompleteId);
                        return id;
                    case 4:
                        numRegion = 3;
                        id = String.Concat(numRegion, numCompleteId);
                        return id;
                    case 5:
                        numRegion = 4;
                        id = String.Concat(numRegion, numCompleteId);
                        return id;
                }
            } while (option > 0 & option < 6);
            functions.SlowType(" Introduce una opción correcta \n", timeSleep);
            return IdTrainer();
        }

        // Método Random
        public int Random(int min, int max)
        {
            int number = rnd.Next(min, max);
            return number;
        }

        // Elegir 1 POKéMON inicial de los 3 posibles
        public string ChooseInitPokemon()
        {
            functions.SlowType("\n¡Aquí hay tres POKéMON! ¡Están dentro de las POKé BALLS! Te daré uno. ¿Cuál quieres?", timeSleep);
            string[] options = { "\n\t 1.- " + initialPokemon[0].GetSpecie() , "\t 2.- " + initialPokemon[1].GetSpecie(), "\t 3.- " + initialPokemon[2].GetSpecie() };  
            int option = 0;
            for (int i = 0; i < initialPokemon.Length; ++i) // Recorro el array de POKéMONS iniciales para elegir uno de los 3
            {
                do
                {
                    option = functions.ChooseOption(options, timeSleep);
                    //option = functions.IntToString();
                    switch (option)
                    {
                        case 1:
                            myPokemons[0] = initialPokemon[0]; // El elegido me lo guardo en mi equipo myPokemons
                            myPokemons[0].SetEo(trainer.GetId());
                            return initialPokemon[0].GetSpecie();
                        case 2:
                            myPokemons[0] = initialPokemon[1];
                            myPokemons[0].SetEo(trainer.GetId());
                            return initialPokemon[1].GetSpecie();
                        case 3:
                            myPokemons[0] = initialPokemon[2];
                            myPokemons[0].SetEo(trainer.GetId());
                            return initialPokemon[2].GetSpecie();
                    }
                } while (option > 0 && option < 4);
                functions.SlowType("\n   Introduce una opción correcta \n", timeSleep);
            }
            return ChooseInitPokemon();
        }

        // Menú principal
        public bool MainMenu()
        {
            int option = 0;
            bool exitCheck = false;
            do
            {
                functions.SlowType("\n ¿Qúe desea hacer? ", timeSleep);
                string[] options = { "\n\t 1.- Ver los datos del entrenador.",  "\t 2.- Ver los datos de los POKéMON del equipo.", "\t 3.- Ver las cajas.", "\t 4.- Combatir.", "\t 5.- Centro POKéMON", "\t 6.- Mochila", "\t 7.- Tienda\t", "\t 8.- Cerrar el juego.", "\t 9.- Guardar partida"};
                option = functions.ChooseOption(options, timeSleep);
                //functions.SlowType("   Elige una opción: ", timeSleep);
                //option = functions.IntToString();
                switch (option)
                {
                    case 1: //Datos del entrenador
                        PrintTrainerData();
                        break;
                    case 2: //Datos básicos de los POKéMON
                        ShowBasicDataPokemon();
                        break;
                    case 3:
                        ShowBoxes();
                        break;
                    case 4:
                        functions.SlowType("\n ¡Te has encontrado con un " + ChooseRivalPokemon() + " salvaje! ¡Ten cuidado, será muy difícil de vencer! \n", timeSleep);
                        Combat();
                        break;
                    case 5:
                        functions.SlowType("\n Recuperando la vida de todos tus POKéMON", timeSleep);
                        functions.SlowType("\n ... \n ... \n ... \n ... \n ...\n", timeSleep + 50);
                        functions.SlowType(" ¡Gracias por visitarnos, todos tus POKéMON están curados!\n", timeSleep);
                        PokemonCenter();
                        break;
                    case 6:
                        ShowBag();
                        break;
                    case 7:
                        functions.SlowType("\n Bienvenido a la tienda ¿Qué quieres hacer? \n\t 1.- Comprar \n\t 2.- Vender \n\t 3.- Salir al menú principal", timeSleep);
                        functions.SlowType("\n     Introduce una opción: ", timeSleep);
                        int shopOption = functions.IntToString();
                        switch(shopOption)
                        {
                            case 1:
                                BuyItem();
                                break;
                            case 2:
                                MenuSellItem();
                                break;
                            case 3:
                                break;
                        }
                        
                        break;
                    case 8:
                        int numExit = Exit();
                        if(numExit == 0)
                        {
                            functions.SlowType("Cerrando...", timeSleep);
                            Environment.Exit(0);
                        }
                        break;
                    case 9:
                        SaveGame();
                        break;
                }
                Console.WriteLine();
            } while (exitCheck == false);
            return true;
        }
        // Ver mi equipo
        public void ShowBasicDataPokemon()
        {
            functions.SlowType("\n ¡Muy bien! Veamos cúales son tus POKéMON: \n ", timeSleep);
            for (int i = 0; i < myPokemons.Length; i += 1) // Recorremos nuestro equipo de POKéMONS 
            {
                if (myPokemons[i] != null) // imprimimos los datos básicos sólo de los POKéMONS que no son nulos, es decir, de los que tenemos guardados
                {
                    functions.SlowType("\n     POKéMON " + (i + 1) +
                        "\n\t Especie: " + myPokemons[i].GetSpecie() +
                        "\n\t Vida máxima: " + myPokemons[i].GetMaxHP() +
                        "\n\t Vida actual: " + myPokemons[i].GetCurrentHP() +
                        "\n ", timeSleep);
                }
            }
            MenuMyPokemon();
        }

        // Menú equipo POKéMON
        public void MenuMyPokemon()
        {
            int option = 0;
            do
            {
                functions.SlowType("\n ¿Qué desea hacer?", timeSleep);
                string[] options = { "\n\t 1.- Ver más datos de los POKéMON", "\t 2.- Dar medicamento", "\t 3.- Ir al menú" };
                option = functions.ChooseOption(options, timeSleep);
                //functions.SlowType("\n     Introduce una opción: ", timeSleep);
                //option = functions.IntToString();
                switch (option)
                {
                    case 1: // Datos extendidos de los POKéMON
                        ShowAllDataPokemon();
                        break;
                    case 2: // Dar medicamento
                        if(UseMedicine() == 0)
                        {
                            return;
                        }
                        break;
                    case 3:
                        return;
                }
            } while (option > 0 && option < 4);
            functions.SlowType(" Introduce una opción correcta \n", timeSleep);
            MenuMyPokemon();
        }

        // Datos extendidos de mis POKéMON
        public void ShowAllDataPokemon()
        {
            functions.SlowType("\n ¿De cuál de ellos quieres verlos?", timeSleep);
            for (int i = 0; i < myPokemons.Length; ++i)
            {
                if (myPokemons[i] != null) // Si la bolsa no está vacía.
                {
                    functions.SlowType("\n\t " + (i + 1) + ".- " + myPokemons[i].GetSpecie(), timeSleep); // Mostramos los nombres de cada uno
                }
            }
            functions.SlowType("\n     Introduce una opción: ", timeSleep);
            int option = functions.IntToString();
            if (myPokemons[option - 1] == null)
            {
                functions.SlowType("\n En esta posición no tienes nigún POKéMON.\n", timeSleep);
            }
            else
            {
                functions.SlowType("\n     POKéMON " + (option) +
                    "\n\t Especie: " + myPokemons[option - 1].GetSpecie() +
                    "\n\t Tipo: " + myPokemons[option - 1].GetType() +
                    "\n\t Nivel: " + myPokemons[option - 1].GetLevel() +
                    "\n\t Género: " + myPokemons[option - 1].GetGender() +
                    "\n\t Vida máxima: " + myPokemons[option - 1].GetMaxHP() +
                    "\n\t Vida actual: " + myPokemons[option - 1].GetCurrentHP() +
                    "\n\t Ataque: " + myPokemons[option - 1].GetAttack() +
                    "\n\t Ataque especial: " + myPokemons[option - 1].GetSpecialAttack() +
                    "\n\t Defensa: " + myPokemons[option - 1].GetDefense() +
                    "\n\t Defensa especial: " + myPokemons[option - 1].GetSpecialDefense() +
                    "\n\t Velocidad: " + myPokemons[option - 1].GetSpeed() +
                    "\n\t ID: " + myPokemons[option - 1].GetEo() +
                    "\n\t " + myPokemons[option - 1].GetDate() +
                    "\n ", timeSleep);
            }
        }

        // Centro POKéMON
        public void PokemonCenter()
        {
            for(int i = 0; i < myPokemons.Length; ++i)
            {
                if(myPokemons[i] != null)
                {
                    myPokemons[i].SetCurrentHP(myPokemons[i].GetMaxHP()); // Recorremos el equipo y a cada POKéMON le establecemos la vida actual igual a la máxima
                }
                for (int j = 0; j < myPokemons[i].GetMovements().Length; ++j) //error
                    {
                        if (myPokemons[i].GetMovements()[j] != null)
                        {
                            myPokemons[i].GetMovements()[j].SetCurrentPowerPoints(myPokemons[i].GetMovements()[j].GetMaxPowerPoints()); // PP al máximo
                        }
                }
            }
        }

        // Salir del programa
        public int Exit()
        {
            functions.SlowType("\n ¿Desea salir del programa ?", timeSleep);
            string[] options = { "\n\t 1.- Si", "\t 2.- No" };
            int option = functions.ChooseOption(options, timeSleep);
            //int option = functions.IntToString();
            switch (option)
            {
                case 1:
                    MenuSaveGame();
                    return 0;// Salimos del programa
                case 2: // Volvemos al menú principal
                    functions.SlowType("\n Volveremos al menú principal", timeSleep);
                    return 1;
                default:
                    functions.SlowType("\n Por protocolos de seguridad, volveremos al menú principal", timeSleep);
                    return 1;
            }
        }

        public void MenuSaveGame()
        {
            functions.SlowType("\n ¿Desea guardar partida?", timeSleep);
            string[] options = { "\n\t 1.- Si", "\t 2.- No" };
            int option = functions.ChooseOption(options, timeSleep);
            switch (option)
            {
                case 1:
                    SaveGame();
                    Environment.Exit(0);
                    break;
                case 2:
                    functions.SlowType("Saliendo...", timeSleep);
                    Environment.Exit(0);
                    break;

            }
        }

        // Guardar en fichero .bin
        public void SaveGame()
        {
            functions.SlowType("\n ¿Nombre del archivo de guardado?", timeSleep);
            string path = functions.Text();
            FileStream file = File.OpenWrite(path + ".bin");
            BinaryFormatter bf = new BinaryFormatter();
            bf.Serialize(file, trainer);
            file.Close();

            // Guardar en formato de texto
            StreamWriter writer = new StreamWriter(path + ".txt");
            writer.WriteLine("Información de la partida:");
            writer.WriteLine($"Nombre: {path}");
            writer.WriteLine($"Entrenador: {trainer.GetName()}");
            writer.WriteLine($"Género: {trainer.GetGender()}");
            writer.WriteLine($"ID: {trainer.GetId()}");
            writer.WriteLine($"Número secreto: {trainer.GetSecretnumber()}");
            writer.WriteLine($"PokeDólares: {trainer.GetPokeDollars()}");
            writer.WriteLine($"Puntos de batalla: {trainer.GetBattlePoints()}");
            writer.WriteLine($"PokeMillas: {trainer.GetPokemillas()}");
            writer.WriteLine($"Fecha de inicio: {trainer.GetInitDate()}");
            writer.WriteLine("Equipo Pokémon:");

            writer.Close();

            functions.SlowType("Partida guardada correctamente.\n", timeSleep);
        }

        // Combate
        public void Combat()
        {
            bool exitCheck = false;
            int option = 0;
            IndividualPokemon pokemonFighter = ChooseFighter(myPokemons); // Elegimos para combatir siempre a nuestro POKéMON inicial
            IndividualPokemon rivalPokemon = myRivalPokemon;
            do
            {
                functions.SlowType("\n ¿Qué desea hacer?", timeSleep);
                string[] options = { "\n\t 1.- Atacar", "\t 2.- Cambiar de POKéMON", "\t 3.- Capturar POKéMON", "\t 4.- Escapar" };
                option = functions.ChooseOption(options, timeSleep);
                //functions.SlowType("\n     Elige una opción: ", timeSleep);
                //option = functions.IntToString();
                switch (option)
                { 
                    case 1: // Atacar
                        bool attack = Attack(pokemonFighter, rivalPokemon);
                        if(attack == true)
                        {
                            return;
                        }
                        Console.WriteLine();
                        break;
                    case 2: // Cambiar de POKéMON
                        functions.SlowType("\n ¡Perfecto! Has elegido cambiar de POKéMON \n", timeSleep);
                        pokemonFighter = ChangePokemon(pokemonFighter, rivalPokemon);
                        break;
                    case 3: // Capturar POKéMON
                        if(Capture(rivalPokemon) == 1)
                        {
                            return;
                        }
                        exitCheck = true;
                        break;
                    case 4: // Escapar
                        if(GetAway(pokemonFighter, rivalPokemon) == 1)
                        {
                            return;
                        }
                        break;
                }
            } while (option > 0 && option < 5);
        }

        // Elegir POKéMON fighter

        public IndividualPokemon ChooseFighter(IndividualPokemon[] teamPokemon)
        {
            int counter = 0; // Cuenta los posibles pokémon para luchar
            for (int i = 0; i < teamPokemon.Length; i += 1)
            {
                if (teamPokemon[i] != null && teamPokemon[i].GetCurrentHP() > 0)
                {
                    ++counter;
                }
            }

            switch (counter)
            {
                case 0:
                    functions.SlowType("\n Ninguno de tus pokémon puede combatir. ", timeSleep);
                    return null;
                default:
                    int posTeam = 0;
                    for (int i = 0; i < teamPokemon.Length; i += 1)
                    {
                        if (teamPokemon[i].GetCurrentHP() != 0)
                        {
                            posTeam = i;
                            break;
                        }
                    }
                    return teamPokemon[posTeam];
            }
        }

        //Elegir POKéMON rival
        public string ChooseRivalPokemon() // Elegimos el POKéMON rival de manera aleatoria entre 3 POKéMON posibles
        {
            int option = Random(0, 3);
            myRivalPokemon = rivalPokemon[option];
            myRivalPokemon.SetCurrentHP(myRivalPokemon.GetMaxHP());
            return rivalPokemon[option].GetSpecie();
        }

        // Atacar
        public bool Attack(IndividualPokemon pokemonFighter, IndividualPokemon rivalPokemon)
        {
            int numMovF = NumMovementFighter(pokemonFighter);
            do
            {
                if (pokemonFighter.GetMovements()[numMovF].GetCurrentPowerPoints() <= 0)
                {
                    pokemonFighter.GetMovements()[numMovF].SetCurrentPowerPoints(0);
                    functions.SlowType("\n No tienes suficientes PP para realizar este ataque.", timeSleep);
                    numMovF = NumMovementFighter(pokemonFighter);
                }
                
            } while (pokemonFighter.GetMovements()[numMovF].GetCurrentPowerPoints() <= 0);
            
            int numMovR = NumMovementRival(rivalPokemon);
            if (pokemonFighter.GetMovements()[numMovF].GetPriority() > rivalPokemon.GetMovements()[numMovR].GetPriority()) // Prioridad de movimiento mayor
            {
                bool myAttack = MyPokemonAttackFirst(pokemonFighter, rivalPokemon, numMovF, numMovR);
                if (myAttack)
                {
                    return true;
                }
                return false;
            }
            else
            {
                if (rivalPokemon.GetMovements()[numMovR].GetPriority() > pokemonFighter.GetMovements()[numMovF].GetPriority()) //Prioridad de su movimiento mayor
                {
                    bool rivalAttack = RivalPokemonAttackFirst(rivalPokemon, pokemonFighter, numMovR, numMovF);
                    if (rivalAttack)
                    {
                        return true;
                    }
                    return false;
                }
                else // Prioridad de nuestros movimiento en igual
                {
                    if (pokemonFighter.GetSpeed() > rivalPokemon.GetSpeed()) // Si la velocidad de mi POKéMON es mayo que la del rival
                    {
                        bool myAttack = MyPokemonAttackFirst(pokemonFighter, rivalPokemon, numMovF, numMovR);
                        if (myAttack)
                        {
                            return true;
                        }
                        return false;
                    }
                    else // Si la velocidad del POKéMON rival es mayor que la del mío
                    {
                        bool rivalAttack =  RivalPokemonAttackFirst(rivalPokemon, pokemonFighter, numMovR, numMovF);
                        if (rivalAttack)
                        {
                            return true;
                        }
                        return false;
                    }
                }
            }
        }

        // Método ataco yo primero
        public bool MyPokemonAttackFirst(IndividualPokemon pokemonFighter, IndividualPokemon rivalPokemon, int numMovF, int numMovR)
        {
            rivalPokemon.SetCurrentHP(rivalPokemon.GetCurrentHP() - Damage(pokemonFighter, rivalPokemon, numMovF)); // Ataco yo primero
            pokemonFighter.GetMovements()[numMovF].SetCurrentPowerPoints(1);
            functions.SlowType("\n Tu POKéMON " + pokemonFighter.GetSpecie() + " ha utilizado " + pokemonFighter.GetMovements()[numMovF].GetName(), timeSleep);
            pokemonFighter.SetCurrentHP(pokemonFighter.GetCurrentHP() - Damage(rivalPokemon, pokemonFighter, numMovR)); // Después me ataca él
            functions.SlowType("\n El pokemon rival " + rivalPokemon.GetSpecie() + " ha utilizado " + rivalPokemon.GetMovements()[numMovR].GetName(), timeSleep);
            bool weakened = Weakened(pokemonFighter, rivalPokemon); // Si hay alguno debilitado
            if (weakened == true)
            {
                return true;
            }
            return false;
        }

        // Método ataca el rival primero
        public bool RivalPokemonAttackFirst(IndividualPokemon rivalPokemon, IndividualPokemon pokemonFighter, int numMovR, int numMovF)
        {
            pokemonFighter.SetCurrentHP(pokemonFighter.GetCurrentHP() - Damage(rivalPokemon, pokemonFighter, numMovR)); // Ataca él
            functions.SlowType("\n El pokemon rival " + rivalPokemon.GetSpecie() + " ha utilizado " + rivalPokemon.GetMovements()[numMovR].GetName(), timeSleep);
            rivalPokemon.SetCurrentHP(rivalPokemon.GetCurrentHP() - Damage(pokemonFighter, rivalPokemon, numMovF)); // Después ataco yo
            pokemonFighter.GetMovements()[numMovF].SetCurrentPowerPoints(1);
            if (pokemonFighter.GetMovements()[numMovF].GetCurrentPowerPoints() < 0)
            {
                pokemonFighter.GetMovements()[numMovF].SetCurrentPowerPoints(0);
                functions.SlowType("\n No tienes suficientes PP para realizar este ataque.", timeSleep);
                numMovF = NumMovementFighter(pokemonFighter);
            }
            functions.SlowType("\n Tu POKéMON " + pokemonFighter.GetSpecie() + " ha utilizado " + pokemonFighter.GetMovements()[numMovF].GetName(), timeSleep);
            bool weakened = Weakened(pokemonFighter, rivalPokemon); // Si hay alguno debilitado
            if (weakened == true)
            {
                return true;
            }
            return false;
        }

        // Qué movimiento escoge nuestro POKéMON
        public int NumMovementFighter(IndividualPokemon pokemonFighter)
        {
            int numMov = 0;
            Movements[] movements = pokemonFighter.GetMovements(); //Movimientos de nuestro POKéMON
            do
            {
                functions.SlowType("\n ¿Qué movimiento quieres realizar?", timeSleep);
                string[] options = {" \n\t Nombre: " + movements[0].GetName() + " " +
                         movements[0].GetCurrentPowerPoints()  + "/" + movements[0].GetMaxPowerPoints(), 
                    " \t Nombre: " + movements[1].GetName() + " " +
                         movements[1].GetCurrentPowerPoints()  + "/" + movements[1].GetMaxPowerPoints(),
                    " \t Nombre: " + movements[2].GetName() + " " +
                         movements[2].GetCurrentPowerPoints()  + "/" + movements[2].GetMaxPowerPoints(),
                    " \t Nombre: " + movements[3].GetName() + " " +
                         movements[3].GetCurrentPowerPoints()  + "/" + movements[3].GetMaxPowerPoints()};
                numMov = functions.ChooseOption(options, timeSleep);
                //numMov = functions.IntToString();
                switch (numMov)
                {
                    case 1:
                        return 0;
                    case 2:
                        return 1;
                    case 3:
                        return 2;
                    case 4:
                        return 3;
                }
            } while (numMov > 0 && numMov < 5);
            functions.SlowType(" Introduce una opción correcta \n", timeSleep);
            return NumMovementFighter(pokemonFighter);
        }

        // Qué movimiento escoge el POKéMON rival
        public int NumMovementRival(IndividualPokemon rivalPokemon) 
        {
            int numMov = Random(0, 4);
            return numMov;
        }

        // Cambiar POKéMON
        public IndividualPokemon ChangePokemon(IndividualPokemon pokemonFighter, IndividualPokemon rivalPokemon)
        {
            functions.SlowType("\n Tus POKéMON son: ", timeSleep);
            for (int i = 0; i < myPokemons.Length; ++i) // Recorro mis POKéMONS
            {
                if (myPokemons[i] != null) // Si la bolsa no está vacía.
                {
                    functions.SlowType("\n\t " + (i + 1) + ".- " + myPokemons[i].GetSpecie(), timeSleep); // Mostramos los nombres de cada uno
                }
            }
            functions.SlowType("\n ¿Qué POKéMON quieres elegir?: ", timeSleep);
            int option = functions.IntToString();
            for (int i = 0; i < myPokemons.Length; ++i)
            {
                if (pokemonFighter == myPokemons[option - 1]) // Si elegimos el mismo POKéMON que tenemos actualmente
                {
                    functions.SlowType("\n ¡Has decidido seguir luchando con el mismo POKéMON, " + pokemonFighter.GetSpecie() + "! \n", timeSleep);
                    pokemonFighter.SetCurrentHP(pokemonFighter.GetCurrentHP() - Damage(rivalPokemon, pokemonFighter, rnd.Next(0,rivalPokemon.GetMovements().Length)));
                    functions.SlowType(" " + rivalPokemon.GetSpecie() + " te ha atacado " + "\n Tu pokemon " + pokemonFighter.GetSpecie() + " tiene " + pokemonFighter.GetCurrentHP() + " de vida actual.\n", timeSleep);
                    return pokemonFighter;
                }
                else // Si elegimos otro de la bolsa
                {
                    if (myPokemons[option - 1] == null) // Si en la posición que hemos elegido no tenemos nigún POKéMON, tenemos que elegir otro
                    {
                        functions.SlowType("\n En esta posición no tenemos ningún POKéMON, elige otra. \n", timeSleep);
                        break;
                    }
                    else
                    {
                        pokemonFighter = myPokemons[option - 1]; // Si tenemos un POKéMON en esa posición, empezaremos a combatir con él
                        if (pokemonFighter.GetCurrentHP() <= 0)
                        {
                            functions.SlowType("¡Qué lástima! El POKéMON elegido está debilitado, elige otro", timeSleep);
                            break;
                        }
                        functions.SlowType("\n ¡Tu nuevo POKéMON para el combate va a ser " + pokemonFighter.GetSpecie() + "!\n", timeSleep);
                        pokemonFighter.SetCurrentHP(pokemonFighter.GetCurrentHP() - Damage(rivalPokemon, pokemonFighter, rnd.Next(0, rivalPokemon.GetMovements().Length)));
                        functions.SlowType(" " + rivalPokemon.GetSpecie() + " te ha atacado " + "\n Tu pokemon " + pokemonFighter.GetSpecie() + " tiene " + pokemonFighter.GetCurrentHP() + " de vida actual.\n", timeSleep);
                        return pokemonFighter;
                    }
                }
            }
            return ChangePokemon(pokemonFighter, rivalPokemon);
        }

        // Capturar 
        public int Capture(IndividualPokemon rivalPokemon)
        {
            functions.SlowType("\n ¿Qué Pokeball quieres utilizar?", timeSleep);
            for(int i = 0; i < trainer.GetBag().GetItem()[1].Length; ++i)
            {
                functions.SlowType("\n\t " + (i + 1) + ": " + trainer.GetBag().GetItem()[1][i].GetName(), timeSleep);
            }
            functions.SlowType("\n    Introduce una opción: ", timeSleep);
            int tipePokeball = functions.IntToString();
            trainer.GetBag().GetItem()[1][tipePokeball - 1].SetQuantity(trainer.GetBag().GetItem()[1][tipePokeball - 1].GetQuantity() - 1);
            double RCm = 0;
            switch (tipePokeball)
            {
                case 1:
                    RCm = ((3 * rivalPokemon.GetMaxHP() - 2 * rivalPokemon.GetCurrentHP() * rivalPokemon.GetRc() * 1) / (3 * rivalPokemon.GetMaxHP()));
                    break;
                case 2:
                    RCm = ((3 * rivalPokemon.GetMaxHP() - 2 * rivalPokemon.GetCurrentHP() * rivalPokemon.GetRc() * 2.55) / (3 * rivalPokemon.GetMaxHP()));
                    break;
                case 3:
                    RCm = ((3 * rivalPokemon.GetMaxHP() - 2 * rivalPokemon.GetCurrentHP() * rivalPokemon.GetRc() * 3) / (3 * rivalPokemon.GetMaxHP()));
                    break;
                case 4:
                    RCm = ((3 * rivalPokemon.GetMaxHP() - 2 * rivalPokemon.GetCurrentHP() * rivalPokemon.GetRc() * 255) / (3 * rivalPokemon.GetMaxHP()));
                    break;
                default:
                    functions.SlowType("Opción inválida", timeSleep);
                    return 1;
            }

            double ag = 65536 / Math.Pow((255 / RCm), 0.1875);

            Random rnd = new Random();
            int num = rnd.Next(0, 65536);

            bool captured = true;

            int attemps;
            for (attemps = 0; attemps < 4; ++attemps)
            {
                if (num >= ag)
                {
                    captured = false;
                    break;
                }
            }
            if (captured)
            {
                AddCapture(rivalPokemon);
                return 1;
            }
            return 0;
        }

        // Añadir POKéMON capturado a nuestro equipo
        public void AddCapture(IndividualPokemon rivalPokemon)
        {
            int counter = 0; 
            for (int i = 0; i < myPokemons.Length; ++i)
            {
                if (myPokemons[i] != null) //Si la posición del equipo no está vacía
                {
                    ++counter; 
                    if (counter == myPokemons.Length) //Si tenemos el equipo lleno, el POKéMON capturado se guardará directamente en la caja
                    {
                        functions.SlowType("\n Tu equipo está lleno, se guardará en la caja. \n", timeSleep);
                        for (int caja = 0; caja < boxesPokemon.Length; ++caja)
                        {
                            for (int posCaja = 0; posCaja < boxesPokemon[caja].Length; ++posCaja)
                            {
                                if (boxesPokemon[caja][posCaja] == null)
                                {
                                    boxesPokemon[caja][posCaja] = rivalPokemon;
                                    boxesPokemon[caja][posCaja] = new IndividualPokemon(new SpeciesPokemon(rivalPokemon.GetSpecie(), rivalPokemon.GetType(), rivalPokemon.GetId(), rivalPokemon.GetLevel(), rivalPokemon.GetMaxHP(), rivalPokemon.GetCurrentHP(), rivalPokemon.GetAttack(), rivalPokemon.GetSpecialAttack(), rivalPokemon.GetDefense(), rivalPokemon.GetSpecialDefense(), rivalPokemon.GetSpeed()));
                                    boxesPokemon[caja][posCaja].SetDate(DateTime.Now);
                                    boxesPokemon[caja][posCaja].SetEo(trainer.GetId());
                                    return;
                                }
                            }
                        }
                    }
                }
            }
            
            for (int i = 0; i < myPokemons.Length; ++i)
            {
                if (myPokemons[i] == null) // Si la posición está vacía
                {
                    myPokemons[i] = rivalPokemon; // Añadimos el POKéMON capturado en la posición que creamos
                    myPokemons[i] = new IndividualPokemon(new SpeciesPokemon(rivalPokemon.GetSpecie(), rivalPokemon.GetType(), rivalPokemon.GetId(), rivalPokemon.GetLevel(), rivalPokemon.GetMaxHP(), rivalPokemon.GetCurrentHP(), rivalPokemon.GetAttack(), rivalPokemon.GetSpecialAttack(), rivalPokemon.GetDefense(), rivalPokemon.GetSpecialDefense(), rivalPokemon.GetSpeed())); // Al POKéMON añadido le ponemos los atributos con los que se ha quedado tras la captura del POKéMON
                    myPokemons[i].SetDate(DateTime.Now); // y le establecemos la fecha en la que le añadimos a nuestro equipo
                    myPokemons[i].SetEo(trainer.GetId());
                    return;
                }  
            }
        }

        // Enseñar bolsa
        public void ShowBoxes()
        {
            bool exitCheck = false;
            int counter = 0;
            for (int caja = 0; caja < boxesPokemon.Length; ++caja)
            {
                for (int posCaja = 0; posCaja < boxesPokemon[caja].Length; ++posCaja)
                {
                    if (boxesPokemon[caja][posCaja] != null)
                    {
                        functions.SlowType("\n     CAJA " + (caja + 1) +
                            "\n\t     POKéMON " + (posCaja + 1) +
                            "\n\t Especie: " + boxesPokemon[caja][posCaja].GetSpecie() +
                            "\n ", timeSleep);
                    }
                    else
                    {
                        ++counter;
                        if (counter == boxesPokemon[caja].Length)
                        {
                            functions.SlowType("\n Tu bolsa está vacía. \n", timeSleep);
                            exitCheck = true;
                            break;
                        }
                    }
                }
                if(exitCheck == false)
                {
                    if(AskChangeTeamBoxes() == 1)
                    {
                        return;
                    }
                }
            }
        }

        public int AskChangeTeamBoxes()
        {
            
            functions.SlowType("\n ¿Quieres cambiar algún POKéMON de la bolsa por alguno de tu equipo?: (1.- Si, 2- No): ", timeSleep);
            int option = functions.IntToString();
            do
            {
                switch(option){
                    case 1:
                        ChangeTeamBoxes();
                        return 0;
                    case 2:
                        functions.SlowType("\n ¡Perfecto! Volverememos al menú principal\n", timeSleep);
                        return 1;
                    default:
                        return 1;
                }
            } while (option > 0 && option < 3);
        }

        // Cambiar POKéMON del equipo con los de la bolsa
        public void ChangeTeamBoxes()
        {
            int numBox;
            int numPosBox;
            do
            {
                functions.SlowType("\n ¿De qué caja quieres sacar un POkéMON?: ", timeSleep);
                numBox = functions.IntToString();
                functions.SlowType("\n ¿De qué posición?: ", timeSleep);
                numPosBox = functions.IntToString();
                if (boxesPokemon[numBox - 1][numPosBox - 1] == null)
                {
                    functions.SlowType("\n Introduce una posición no vacía", timeSleep);
                }
            } while (boxesPokemon[numBox - 1][numPosBox - 1] == null);
            IndividualPokemon pokemonBox = boxesPokemon[numBox - 1][numPosBox - 1];
            functions.SlowType("\n Vas a introducir en tu equipo a "+ pokemonBox.GetSpecie() + "\n", timeSleep);
            functions.SlowType("\n Estos son los POKéMON de tu equipo: ", timeSleep);
            for (int posTeam = 0; posTeam < myPokemons.Length; ++posTeam)
            {
                if (myPokemons[posTeam] != null)
                {
                    functions.SlowType("\n     POKéMON " + (posTeam + 1) +
                        "\t Especie: " + myPokemons[posTeam ].GetSpecie(), timeSleep);
                }
            }
            functions.SlowType("\n ¿Qué POkéMON quieres meter en la caja?: ", timeSleep);
            int posPokemonTeam = functions.IntToString();
            IndividualPokemon pokemonTeam = myPokemons[posPokemonTeam - 1];
            functions.SlowType("\n Vas a guardar en la caja a " + myPokemons[posPokemonTeam - 1].GetSpecie(), timeSleep);
            myPokemons[posPokemonTeam - 1] = pokemonBox;
            boxesPokemon[numBox - 1][numPosBox - 1] = pokemonTeam;

        }

        // Escapar
        public int GetAway(IndividualPokemon pokemonFighter, IndividualPokemon rivalPokemon)
        {
            int attemps = 0;
            //Random random = new Random();
            //int num = random.Next(0, 256);
            int num = Random(0, 256);
            if (pokemonFighter.GetSpeed() > rivalPokemon.GetSpeed()) // Si la velocidad se mi POKéMON es mayor que la del rival, escapamos siempre
            {
                functions.SlowType("\n Has escapado de tu rival.\n", timeSleep);
                return 1;
                attemps = 1;
            }
            else // Si la velocidad del POKéMON rival es mayor que la de mi POKéMON
            {
                int oddScape = (((pokemonFighter.GetSpeed() * 128) / rivalPokemon.GetSpeed()) + 30 + attemps) % 256; // Fórmula para escapar
                if (num < oddScape) // Si el número random es menor que el número de espacar, escapamos
                {
                    functions.SlowType("\n Has escapado de tu rival.\n", timeSleep);
                    return 1;
                }
                else // si no, no escapamos
                {
                    functions.SlowType("\n¡Qué lástima! ¡No has conseguido escapar!\n", timeSleep);
                    return 0;
                    attemps = attemps + 1;
                    pokemonFighter.SetCurrentHP(pokemonFighter.GetCurrentHP() - Damage(rivalPokemon, pokemonFighter, rnd.Next(0, rivalPokemon.GetMovements().Length))); // y el POKéMON rival ataca al nuestro
                    functions.SlowType("\n Tu pokemon " + pokemonFighter.GetSpecie() + " tiene " + pokemonFighter.GetCurrentHP() + " de vida actual.", timeSleep);
                    functions.SlowType("\n Tu pokemon rival " + rivalPokemon.GetSpecie() + " tiene " + rivalPokemon.GetCurrentHP() + " de vida actual.", timeSleep);
                }
            }
        }
        // Debilitado o no
        public bool Weakened(IndividualPokemon pokemonFighter, IndividualPokemon rivalPokemon)
        {
            if(pokemonFighter.GetCurrentHP() <= 0 ) // Si la vida de mi POKéMON después de atacarme es menor o igual que 0
            {
                pokemonFighter.SetCurrentHP(0); // le establecemos la vida actual a 0 y perdemos el combate
                functions.SlowType("\n Tu pokemon " + pokemonFighter.GetSpecie() + " tiene " + pokemonFighter.GetCurrentHP() + " de vida actual.", timeSleep);
                functions.SlowType("\n Tu pokemon rival " + rivalPokemon.GetSpecie() + " tiene " + rivalPokemon.GetCurrentHP() + " de vida actual. \n", timeSleep);
                functions.SlowType("\n El pokemon " + pokemonFighter.GetSpecie() + " ha quedado debilitado.", timeSleep);
                functions.SlowType("\n ¡Qué lástima! Has perdido el combate.\n", timeSleep);
                return true;
            }
            else
            {
                if (rivalPokemon.GetCurrentHP() <= 0) // Si la vida del POKéMON rival después de atacarle es menor o igual que 0
                {
                    rivalPokemon.SetCurrentHP(0); // le establecemos la vida actual a 0 y ganamos el combate
                    functions.SlowType("\n Tu pokemon " + pokemonFighter.GetSpecie() + " tiene " + pokemonFighter.GetCurrentHP() + " de vida actual.", timeSleep);
                    functions.SlowType("\n Tu pokemon rival " + rivalPokemon.GetSpecie() + " tiene " + rivalPokemon.GetCurrentHP() + " de vida actual.\n", timeSleep);
                    functions.SlowType("\n El pokemon " + rivalPokemon.GetSpecie() + " ha quedado debilitado.", timeSleep);
                    functions.SlowType("\n ¡Enhorabuena! Has ganado el combate.\n", timeSleep);
                    return true;
                }
                else
                {
                    functions.SlowType("\n Tu pokemon " + pokemonFighter.GetSpecie() + " tiene " + pokemonFighter.GetCurrentHP() + " de vida actual.", timeSleep);
                    functions.SlowType("\n Tu pokemon rival " + rivalPokemon.GetSpecie() + " tiene " + rivalPokemon.GetCurrentHP() + " de vida actual. \n", timeSleep);
                }
            }
            return false;
        }

        // Mostrar la mochila
        public void ShowBag()
        {
            int option = 0;
            do
            {
                functions.SlowType("\n ¿Qué objetos quieres ver de tu mochila?" +
                "\n\t 1.- Medicinas. \n\t 2.- Pokeballs. \n\t 3.- Objetos de combate. \n\t 4.- Máquinas técnicas. \n\t 5.- Tesoros. \n\t 6.- Piedras evolutivas. \n\t 7.- Salir al menú", timeSleep);
                functions.SlowType("\n   Elige una opción: ", timeSleep);
                option = functions.IntToString();
                switch (option)
                {
                    case 1: // Mostrar Medicinas
                        ShowItem(0);
                        break;
                    case 2: // Mostrar Pokeballs
                        ShowItem(1);
                        break;
                    case 3: // Mostrar Objetos de Combate
                        ShowItem(2);
                        break;
                    case 4: // Mostrar Máquinas de Combate
                        ShowItem(3);
                        break;
                    case 5: // Mostrar Tesoros
                        ShowItem(4);
                        break;
                    case 6: // Mostrar Piedras Evolutivas
                        ShowItem(5);
                        break;
                    case 7:
                        return;
                }
                Console.WriteLine();
            } while (option > 0 && option < 8);
            functions.SlowType("Debes escoger una opción correcta ", timeSleep);
            ShowBag();
        }

        // Mostrar Medicinas
        public void ShowItem(int pocket)
        {
            int counter = 0;
            functions.SlowType("\n Tienes: ", timeSleep);
            for (int i = 0; i < trainer.GetBag().GetItem()[pocket].Length; ++i)
            {
                if (trainer.GetBag().GetItem()[pocket][i] != null && trainer.GetBag().GetItem()[pocket][i].GetQuantity() > 0)
                {
                    ++counter;
                    functions.SlowType("\n\t " + trainer.GetBag().GetItem()[pocket][i].GetName() + ": x" + trainer.GetBag().GetItem()[pocket][i].GetQuantity(), timeSleep);
                }
            }
            if(counter == 0)
            {
                functions.SlowType("\n\t Tu bolsillo está vacío", timeSleep);
            }
        }

        public int UseMedicine()
        {
            
            functions.SlowType("\n ¿A qué POKéMON quieres darle un medicamento?", timeSleep);
            for (int i = 0; i < myPokemons.Length; ++i)
            {
                if (myPokemons[i] != null) // Si la bolsa no está vacía.
                {
                    functions.SlowType("\n\t " + (i + 1) + ".- " + myPokemons[i].GetSpecie(), timeSleep); // Mostramos los nombres de cada uno
                }
            }
            functions.SlowType("\n     Introduce una opción: ", timeSleep);
            int posPokemon = functions.IntToString();
            if (myPokemons[posPokemon - 1] == null)
            {
                functions.SlowType("\n En esta posición no tienes nigún POKéMON.\n", timeSleep);
                return 0;
            }
            else
            {
                int tipeMedicine = 0;
                do
                {
                    functions.SlowType("\n ¿Qué medicina quieres dar a tu POKéMON? ", timeSleep);
                    for(int i = 0; i < trainer.GetBag().GetItem()[0].Length; ++i)
                    {
                        functions.SlowType("\n\t" + (i+1) + ": " + trainer.GetBag().GetItem()[0][i].GetName(), timeSleep);
                    }
                    functions.SlowType("\n     Elige una opción: ", timeSleep);
                    tipeMedicine = functions.IntToString();
                    if (trainer.GetBag().GetItem()[0][tipeMedicine - 1].GetQuantity() > 0)
                    {
                        trainer.GetBag().GetItem()[0][tipeMedicine - 1].InteractItem(myPokemons[posPokemon - 1]);
                        trainer.GetBag().GetItem()[0][tipeMedicine - 1].RestQuantity(1);
                        return 1;
                    }
                } while (tipeMedicine > 0 && tipeMedicine < 11);
                return 0;
            }
        }
        
        // Comprar item
        public void BuyItem()
        {
            Item[] availableItem = AllItemShop();
            functions.SlowType("\n Estos son los items que tenemos disponibles: ", timeSleep);
            for(int i = 0; i < availableItem.Length; ++i)
            {
                if(availableItem[i] != null && availableItem[i].BuyItem() == true)
                {
                    functions.SlowType("\n\t" + (i+1) + ": " + availableItem[i].GetName() + " -> Pokedollares: " + availableItem[i].GetBuyPokedollar(), timeSleep);
                }
            }
            functions.SlowType("\n\n     ¿Cuál desea comprar?: ", timeSleep);
            int itemBought = functions.IntToString();
            functions.SlowType("     ¿Cuántos desea?: ", timeSleep);
            int numItem = functions.IntToString();
            int price = numItem * availableItem[itemBought - 1].GetBuyPokedollar(); trainer.SetPokeDollars(trainer.GetPokeDollars() - price);
            if (trainer.GetPokeDollars() < 0)
            {
                functions.SlowType("\n No puedes comprar tantas", timeSleep);
            }
            else
            {
                functions.SlowType("\n ¡Perfecto, has comprado: x" + numItem + " " + availableItem[itemBought - 1].GetName().ToUpper() + " por " + price + "!", timeSleep);
                if (availableItem[itemBought - 1] is Medicine)
                {
                    for (int i = 0; i < trainer.GetBag().GetItem()[0].Length; ++i)
                    {
                        if (availableItem[itemBought - 1].GetName() == trainer.GetBag().GetItem()[0][i].GetName())
                        {
                            trainer.GetBag().GetItem()[0][i].AddQuantity(numItem);
                        }
                    }
                }
                else
                {
                    if (availableItem[itemBought - 1] is PokeballItem)
                    {
                        for (int i = 0; i < trainer.GetBag().GetItem()[1].Length; ++i)
                        {
                            if (availableItem[itemBought - 1].GetName() == trainer.GetBag().GetItem()[1][i].GetName())
                            {
                                trainer.GetBag().GetItem()[1][i].AddQuantity(numItem);
                            }
                        }
                    }
                    else
                    {
                        if (availableItem[itemBought - 1] is BattleItem)
                        {
                            for (int i = 0; i < trainer.GetBag().GetItem()[2].Length; ++i)
                            {
                                if (availableItem[itemBought - 1].GetName() == trainer.GetBag().GetItem()[2][i].GetName())
                                {
                                    trainer.GetBag().GetItem()[2][i].AddQuantity(numItem);
                                }
                            }
                        }
                        else
                        {
                            if (availableItem[itemBought - 1] is Treasure)
                            {
                                for (int i = 0; i < trainer.GetBag().GetItem()[4].Length; ++i)
                                {
                                    if (availableItem[itemBought - 1].GetName() == trainer.GetBag().GetItem()[4][i].GetName())
                                    {
                                        trainer.GetBag().GetItem()[4][i].AddQuantity(numItem);
                                    }
                                }
                            }
                            else
                            {
                                if (availableItem[itemBought - 1] is EvolutionStone)
                                {
                                    for (int i = 0; i < trainer.GetBag().GetItem()[5].Length; ++i)
                                    {
                                        if (availableItem[itemBought - 1].GetName() == trainer.GetBag().GetItem()[5][i].GetName())
                                        {
                                            trainer.GetBag().GetItem()[5][i].AddQuantity(numItem);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        // Vender Item
        public void MenuSellItem()
        {
            
            int pocket = 0;
            do
            {
                functions.SlowType("\n ¿Qué desea vender?:" +
                "\n\t 1.- Medicina \n\t 2.- Pokeball \n\t 3.- Objeto de combate \n\t 4.- Tesoro \n\t 5.- Piedra evolutiva \n\t 6.- Volver al menú principal", timeSleep);
                functions.SlowType("\n     Introduce una opción: ", timeSleep);
                pocket = functions.IntToString();
                switch (pocket)
                {
                    case 1:
                        SellItem(0);
                        break;
                    case 2:
                        SellItem(1);
                        break;
                    case 3:
                        SellItem(2);
                        break;
                    case 4:
                        SellItem(4);
                        break;
                    case 5:
                        SellItem(5);
                        break;
                    case 6:
                        return;
                }
            } while (pocket > 0 && pocket < 6);
        }

        // Vender Item
        public void SellItem(int pocket)
        {
            for(int i = 0; i < trainer.GetBag().GetItem()[pocket].Length; ++i) // Enseñamos los Items que tenemos en el bolsillo elegido en el menú
            {
                if (trainer.GetBag().GetItem()[pocket][i] != null && trainer.GetBag().GetItem()[pocket][i].GetQuantity() > 0)
                {
                    functions.SlowType("\n\t " + (i + 1) + ": " + trainer.GetBag().GetItem()[pocket][i].GetName() + ": x" + trainer.GetBag().GetItem()[pocket][i].GetQuantity(), timeSleep);
                }
            }
            functions.SlowType("\n     ¿Cuál desea vender?: ", timeSleep);
            int itemSold = functions.IntToString();
            trainer.GetBag().GetItem()[pocket][itemSold - 1].GetName();
            functions.SlowType("     ¿Cuántos desea vender?: ", timeSleep);
            int numItem  = functions.IntToString();

            do
            {
                if (numItem > trainer.GetBag().GetItem()[pocket][itemSold - 1].GetQuantity()) //Si no tenemos suficientes para vender
                {
                    
                        functions.SlowType("\n\t     ¡Qué lástima! No puedes tienes suficientes " + trainer.GetBag().GetItem()[pocket][itemSold - 1].GetName().ToUpper() + " para vender.", timeSleep);
                        functions.SlowType("\n\t     ¿Cuántos desea vender?: ", timeSleep);
                        numItem = functions.IntToString();
                    
                }
            } while (numItem > trainer.GetBag().GetItem()[pocket][itemSold - 1].GetQuantity());

            if(numItem <= trainer.GetBag().GetItem()[pocket][itemSold - 1].GetQuantity()) //Si tenemos suficientes para vender
            {
                int price = trainer.GetBag().GetItem()[pocket][itemSold - 1].GetSellPokedollar() * numItem;
                functions.SlowType("\n\t ¡Perfecto, has vendido x" + numItem + " " + trainer.GetBag().GetItem()[pocket][itemSold - 1].GetName().ToUpper() + " por " + price + "! \n", timeSleep);
                trainer.GetBag().GetItem()[pocket][itemSold - 1].RestQuantity(numItem);
                trainer.SetPokeDollars(trainer.GetPokeDollars() + price);
            }
        }

        // Critical
        public double Critical()
        {
            //Random r = new Random();
            //double crit = r.Next(0, 25); 
            double crit = Random(0, 25);
            if (crit == 1) // Probabilidad de 1/24
            {
                return 1.5;
            }
            else
            {
                return 1;
            }
        }
        // Daño
        public int Damage(IndividualPokemon pokemon1, IndividualPokemon pokemon2, int numMov)
        {
            double rand = (double)Random(85, 101);
            double daño = 0;
            
            if (pokemon1.GetMovements()[numMov].GetCategory() == "Especial" || pokemon2.GetMovements()[numMov].GetCategory() == "Especial")
            {
                daño = (((2 * pokemon1.GetMovements()[numMov].GetPower() * (pokemon1.GetSpecialAttack() / pokemon2.GetSpecialDefense())) / 50) + 2) * (rand / 100) * Critical(); // Fórmula del daño
            }
            else
            {
                daño = (((2 * pokemon1.GetMovements()[numMov].GetPower() * (pokemon1.GetAttack() / pokemon2.GetDefense())) / 50) + 2) * (rand / 100) * Critical(); // Fórmula del daño
            }
            return (int)daño; // Hacemos un casting 
        }
    }
}

