using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    abstract class BattleItem : Item
    {
        public BattleItem(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint, int quantity) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint, quantity) { }
        public BattleItem(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint) : base(name, buyPokedollar, buyPokemilla, buyBattlepoint, sellPokedollar, sellPokemilla, sellBattlepoint) { }

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
            return true;
        }

        public override bool UseOutCombat()
        {
            return true;
        }
    }
}
