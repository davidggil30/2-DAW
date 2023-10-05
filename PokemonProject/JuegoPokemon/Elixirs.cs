using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Authentication.ExtendedProtection;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Markup.Localizer;

namespace JuegoPokemon
{
    [Serializable]
    class Elixirs : Medicine
    {
        int plusPP;

        public Elixirs(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint, int quantity, int plusPP) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint, quantity) 
        {
            this.plusPP = plusPP;
        }
        public Elixirs(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint)
        {

        }
        

        public int GetPlusPP()
        {
            return plusPP;
        }


        public override void InteractItem(IndividualPokemon pokemon)
        {
            switch (plusPP)
            {
                case 0:
                    int numMov_ = numMov(pokemon);
                    pokemon.GetMovements()[numMov_ - 1].SetCurrentPowerPoints(pokemon.GetMovements()[numMov_ - 1].GetMaxPowerPoints());
                    break;
                case 1:
                    for(int i = 0; i < pokemon.GetMovements().Length; i++)
                    {
                        pokemon.GetMovements()[i].SetCurrentPowerPoints(pokemon.GetMovements()[i].GetMaxPowerPoints());
                    }
                    break;
                case 10:
                    numMov_ = numMov(pokemon);
                    pokemon.GetMovements()[numMov_ - 1].SetCurrentPowerPoints(pokemon.GetMovements()[numMov_ - 1].GetCurrentPowerPoints() + 10);
                    break;
                default:
                    for (int i = 0; i < pokemon.GetMovements().Length; i++)
                    {
                        pokemon.GetMovements()[i].SetCurrentPowerPoints(pokemon.GetMovements()[i].GetCurrentPowerPoints() + 10);
                    }
                    break;            
            }
        }

        public int numMov(IndividualPokemon pokemon)
        {
            for (int i = 0; i < pokemon.GetMovements().Length; ++i)
            {
                Console.WriteLine(" \n\t Nombre: " + pokemon.GetMovements()[i].GetName() + " " +
                     pokemon.GetMovements()[i].GetCurrentPowerPoints() + "/" + pokemon.GetMovements()[i].GetMaxPowerPoints()); 
            }
            Console.WriteLine("A que movimiento quieres darselo", 0);
            int numMov = int.Parse(Console.ReadLine());
            return numMov;
        }
    }
}
