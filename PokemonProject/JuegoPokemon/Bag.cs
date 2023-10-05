using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Remoting.Messaging;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class Bag
    {
        

        Item[][] item;

        public Bag()
        {
            this.item = AssignItem();
        }
        
        public Item[][] AssignItem()
        {
            int[] buyPrice;
            int[] sellPrice;
            item = new Item[6][];

            item[0] = new Medicine[10];

            item[0][0] = new Potion("Potion", 20, 0, 0, 20, 0, 0, 5, 20);
            item[0][1] = new Potion("SuperPotion", 60, 0, 0, 60, 0, 0, 5, 60);
            item[0][2] = new Potion("HyperPotion", 200, 0, 0, 200, 0, 0, 5, 200);
            item[0][3] = new Potion("MaxPotion", 400, 0, 0, 400, 0, 0, 5, 0);

            item[0][4] = new Revives("Revives", 200, 0, 0, 200, 0, 0, 5, 0);
            item[0][5] = new Revives("MaxRevives", 500, 0, 0, 500, 0, 0, 5, 1);

            item[0][6] = new Elixirs("Ether", 100, 0, 0, 100, 0, 0, 5, 10);
            item[0][7] = new Elixirs("MaxEther", 200, 0, 0, 200, 0, 0, 5, 0);
            item[0][8] = new Elixirs("Elixir", 400, 0, 0, 400, 0, 0, 5, 11);
            item[0][9] = new Elixirs("MaxElixir", 800, 0, 0, 800, 0, 0, 5, 1);

            item[1] = new PokeballItem[4];
            item[1][0] = new PokeballItem("Pokeball", 15, 0, 0, 15, 0, 0, 5, 1);
            item[1][1] = new PokeballItem("Superball", 100, 0, 0, 100, 0, 0, 5, 2.5);
            item[1][2] = new PokeballItem("Ultraball", 500, 0, 0, 500, 0, 0, 5, 3);
            item[1][3] = new PokeballItem("Masterball", 2000, 0, 0, 2000, 0, 0, 5, 255);

            item[2] = new BattleItem[1];
            item[2][0] = new Pokedoll("Pokedoll", 300, 0, 0, 300, 0, 0, 5);

            item[3] = new MT[5];

            item[4] = new Treasure[9];
            item[4][0] = new Treasure("Perl", 1000, 0, 0, 1000, 0, 0, 0);
            item[4][1] = new Treasure("Stardust", 1500, 0, 0, 1500, 0, 0, 0);
            item[4][2] = new Treasure("Big Mushroom", 2500, 0, 0, 2500, 0, 0, 0);
            item[4][3] = new Treasure("Big Pearl", 4000, 0, 0, 4000, 0, 0, 0);
            item[4][4] = new Treasure("Nugget", 5000, 0, 0, 5000, 0, 0, 0);
            item[4][5] = new Treasure("Star Piece", 6000, 0, 0, 6000, 0, 0, 0);
            item[4][6] = new Treasure("Comet Shard", 12500, 0, 0, 12500, 0, 0, 0);
            item[4][7] = new Treasure("Big Nugget", 20000, 0, 0, 20000, 0, 0, 0);
            item[4][8] = new Treasure("Relic Gold", 30000, 0, 0, 30000, 0, 0, 0);


            item[5] = new EvolutionStone[3];
            item[5][0] = new EvolutionStone("WaterStone", 50000, 0, 0, 50000, 0, 0, 0);
            item[5][1] = new EvolutionStone("FireStone", 50000, 0, 0, 50000, 0, 0, 0);
            item[5][2] = new EvolutionStone("ThunderStone", 50000, 0, 0, 50000, 0, 0, 0);

            return item;
        }

        public Item[][] GetItem()
        {
            return item;
        }
    }
}
