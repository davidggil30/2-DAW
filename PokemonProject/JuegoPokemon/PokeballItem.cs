using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.ConstrainedExecution;
using System.Security.Cryptography;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class PokeballItem : Item
    {
        double ratioCapture;
        IO functions;

        public PokeballItem(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint, int quantity, double ratioCapture) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint, quantity)
        {
            this.ratioCapture = ratioCapture;
        }
        public PokeballItem(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint)
        {

        }

        public override void InteractItem(IndividualPokemon pokemon)
        {

        }

        public double GetRatioCapture()
        {
            return ratioCapture;
        }

        public override bool ThrowItem()
        {
            return true;
        }

        public override bool BuyItem()
        {
            return true;
        }

        public override bool SellItem()
        {
            return true;
        }

        public override bool UseWhileCombat()
        {
            return true;
        }

        public override bool UseOutCombat()
        {
            return true;
        }
    

    

        
    /*public override void InteractItem(IndividualPokemon pokemon)
    {
        Random rnd = new Random();
            int RCm = ((3 * pokemon.GetMaxHP()) - (2 * pokemon.GetCurrentHP())) / (3 * pokemon.GetMaxHP());

            int tries = 0;
            double ag = 65536 / (Math.Pow((255 / RCm), 0.1875)); // Fórmula de cada agitado
            int num = rnd.Next(0, 65536);

            for(int i = 0; i < 4; ++i)
            {

            }

            if (num >= ag)
            {
                functions.SlowType("\n ¡QUÉ LÁSTIMA! El POKéMOn rival " + rivalPokemon.GetSpecie() + " no ha sido capturado", timeSleep);
                tries = tries + 1;
                return 0;
            }
            else
            {
                functions.SlowType("\n ¡ENHORBUENA! El POKéMON rival " + rivalPokemon.GetSpecie() + " ha sido capturado.", timeSleep);
                AddCapture(rivalPokemon); // Lo añadimos a la bolsa de mis POKéMONS
                return 1;
            }
            switch (ratioCapture)
            {
                case 1:
                    pokemon.SetRc(pokemon.GetRc() * 1);
                    break;
                case 2.55:
                    pokemon.SetRc(pokemon.GetRc() * 2.55);
                    break;
                case 3:
                    pokemon.SetRc(pokemon.GetRc() * 3);
                    break;
                case 255:
                    pokemon.SetRc(pokemon.GetRc() * 255);
                    break;
            }
        
        }*/
    }

}
