using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class Treasure : Item
    {
        public Treasure(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint, int quantity) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint, quantity) { }
        public Treasure(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint) { }


        public override void InteractItem(IndividualPokemon pokemon)
        {

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
            return false;
        }

        public override bool UseOutCombat()
        {
            return true;
        }
    }
}
