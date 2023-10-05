using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml;
using Microsoft.SqlServer.Server;

namespace JuegoPokemon
{
    [Serializable]
    abstract class Item
    {
        protected string name;
        protected int buyPokedollar;
        protected int buyPokemilla;
        protected int buyBattlepoint;
        protected int sellPokedollar;
        protected int sellPokemilla;
        protected int sellBattlepoint;
        protected int quantity;

        public Item(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint, int quantity)
        {
            this.name = name;
            this.buyPokedollar = buyPokedollar;
            this.buyPokemilla = buyPokemilla;
            this.buyBattlepoint = buyBattlepoint;
            this.sellPokedollar = sellPokedollar;
            this.sellPokemilla = sellPokemilla;
            this.sellBattlepoint = sellBattlepoint;
            this.quantity = quantity;
        }

        public Item(string name, int buyPokedollar, int buyPokemilla, int buyBattlepoint, int sellPokedollar, int sellPokemilla, int sellBattlepoint)
        {
            this.name = name;
            this.buyPokedollar = buyPokedollar;
            this.buyPokemilla = buyPokemilla;
            this.buyBattlepoint = buyBattlepoint;
            this.sellPokedollar = sellPokedollar;
            this.sellPokemilla = sellPokemilla;
            this.sellBattlepoint = sellBattlepoint;
        }
        public Item() { }

        //getters
        public string GetName()
        {
            return name;
        }
        public int GetBuyPokedollar()
        {
            return buyPokedollar;
        }
        public int GetBuyPokemilla()
        {
            return buyPokemilla;
        }
        public int GeBuyBattlePoint()
        {
            return buyBattlepoint;
        }
        public int GetSellPokedollar()
        {
            return sellPokedollar;
        }
        public int GetSellPokemilla()
        {
            return sellPokemilla;
        }
        public int GetSellBattlePoint()
        {
            return sellBattlepoint;
        }

        public int GetQuantity()
        {
            return quantity;
        }

        
        

        public void SetQuantity(int quantity)
        {
            this.quantity = quantity;
        }

        public void AddQuantity (int quantity)
        {
            this.quantity += quantity;
        }
        public void RestQuantity(int quantity)
        {
            this.quantity -= quantity;
        }

        //metodos

        //Método interactuar Item
        public abstract void InteractItem(IndividualPokemon pokemon);
        //Método tirar Item
        public abstract bool ThrowItem();
        // Método comprar Item
        public abstract bool BuyItem();
        // Método vender Item
        public abstract bool SellItem();
        // Método utilizar durante el combate
        public abstract bool UseWhileCombat();
        // Método usar fuera de combate
        public abstract bool UseOutCombat();

    }
}
