using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class Potion : Medicine
    {
        int plusHP;

        public Potion(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint, int quantity, int plusHP) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint, quantity) 
        { 
            this.plusHP = plusHP;
        }
        public Potion(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint)
        {

        }


        public override void InteractItem(IndividualPokemon pokemon)
        {
            switch (plusHP)
            {
                case 0: //Para la MaxPotion
                    pokemon.SetCurrentHP(pokemon.GetMaxHP());
                    break;
                default: // Para las demás pociones
                    pokemon.SetCurrentHP(pokemon.GetCurrentHP() + plusHP);
                    if(pokemon.GetCurrentHP() > pokemon.GetMaxHP()) //controlar en el individuo
                    {
                        pokemon.SetCurrentHP(pokemon.GetMaxHP());
                    }
                    break;
            }
        }        
    }
}
