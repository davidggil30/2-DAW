using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Remoting.Messaging;
using System.Security;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class Trainer
    {
        Bag bag;
        string name;
        string gender;
        string id;
        int secretNumber;
        int pokeDollars;
        int battlePoints;
        int pokemillas;
        DateTime initDate;
        IndividualPokemon[] myPokemons;



        public Trainer(string name, string gender, string id, Bag bag)
        {
            this.name = name;
            this.gender = gender;
            this.id = id;
            this.pokeDollars = 10000;
            this.battlePoints = 10000;
            this.pokemillas = 10000;
            this.bag = bag;
            this.secretNumber = SetSecretNumber();
            myPokemons = new IndividualPokemon[6];
        }

        public string GetName()
        {
            return name;
        }
        public void SetName(string name)
        {
            this.name = name;
        }
        public string GetGender()
        {
            return gender;
        }
        public void SetGender(string gender)
        {
            this.gender = gender;
        }
        public string GetId()
        {
            return id;
        }
        public void SetId(string id)
        {
            this.id = id;
        }
        public int GetSecretnumber()
        {
            return secretNumber;
        }
        public int SetSecretNumber()
        {
            int minValue = 000000000;
            int maxValue = 1000000000;
            Random rand = new Random();
            int secretNumber = rand.Next(minValue,maxValue);
            this.secretNumber = secretNumber;
            return this.secretNumber;
        }
        public int GetPokeDollars()
        {
            return pokeDollars;
        }
        public void SetPokeDollars(int pokeDollars)
        {
            this.pokeDollars = pokeDollars;
        }
        public int GetBattlePoints()
        {
            return battlePoints;
        }
        public void SetBattlePoints(int battlePoints)
        {
            this.battlePoints = battlePoints;
        }
        public int GetPokemillas()
        {
            return pokemillas;
        }
        public void SetPokemillas(int pokemillas)
        {
            this.pokemillas = pokemillas;
        }
        public Bag GetBag()
        {
            return bag;
        }

        public DateTime GetInitDate()
        {
            return initDate;
        }
        public void SetInitTime(DateTime initDate)
        {
            this.initDate = initDate;
        }
        public IndividualPokemon[] MyPokemons()
        {
            IndividualPokemon[] myPokemons = new IndividualPokemon[6];
            return myPokemons;
        }
        public IndividualPokemon[][] Boxes()
        {
            IndividualPokemon[][] boxes = new IndividualPokemon[32][];
            for(int i = 0; i < boxes.Length; ++i)
            {
                boxes[i] = new IndividualPokemon[30];
            }
            return boxes;
        }
    }
}
