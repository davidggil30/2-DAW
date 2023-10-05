using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class Revives : Medicine
    {
        int plusHP;

        public Revives(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint, int quantity, int plusHP) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint, quantity) 
        {
            this.plusHP = plusHP;
        }
        public Revives(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint)
        {

        }
        

       
        public override void InteractItem(IndividualPokemon pokemon)
        {
            switch (plusHP)
            {
                case 0: // Para Revives
                    if(pokemon.GetCurrentHP() == 0)
                    {
                        pokemon.SetCurrentHP(pokemon.GetMaxHP() / 2);
                    }
                    break;
                default: // Para MaxRevives
                    if (pokemon.GetCurrentHP() == 0)
                    {
                        pokemon.SetCurrentHP(pokemon.GetMaxHP());
                    }
                    break;
            }
        }        

    }
}
