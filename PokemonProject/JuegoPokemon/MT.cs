using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class MT : Item
    {
        Movements movement;

        public override void InteractItem(IndividualPokemon pokemon)
        {

        }

        public override bool ThrowItem()
        {
            return false;
        }

        public override bool BuyItem()
        {
            return false;
        }

        public override bool SellItem()
        {
            return false;
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
