using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    class Movements
    {
        string category; // Categoría del movimiento
        string name; // Nombre del movimiento
        int id; // id del movimiento
        int maxPowerPoints; // Puntos de poder del movimiento
        int currentPowerPoints;
        int power; // Potencia del movimiento
        int precision; // Precisión del movimiento
        int priority; // Prioridad del movimiento

        public Movements(string category, string name, int id, int power, int maxPowerPoints, int precision, int priority)
        {
            this.category = category;
            this.name = name;
            this.id = id;
            this.maxPowerPoints = maxPowerPoints;
            this.currentPowerPoints = maxPowerPoints;
            this.power = power;
            this.precision = precision;
            this.priority = priority;
        }
        public Movements() { }

        public void SetCategory(string category)
        {
            this.category = category;
        }
        public string GetCategory()
        {
            return category;
        }
        public void SetName(string name)
        {
            this.name = name;
        }
        public string GetName()
        {
            return name;
        }
        public void SetId(int id)
        {
            this.id = id;
        }
        public int GetId()
        {
            return id;
        }
        public void SetMaxPowerPoints(int maxPowerPoints)
        {
            this.maxPowerPoints = maxPowerPoints;
        }
        public int GetMaxPowerPoints() // pasar a individualpokemon
        {
            return maxPowerPoints;
        }
        public void SetCurrentPowerPoints(int amount)
        {
            this.currentPowerPoints -= amount;
        }
        public int GetCurrentPowerPoints()
        {
            return currentPowerPoints;
        }
        public void SetPower(int power)
        {
            this.power = power;
        }
        public int GetPower()
        {
            return power;
        }
        public void SetPrecision(int precision)
        {
            this.precision = precision;
        }
        public int GetPrecision()
        {
            return precision;
        }
        public void SetPriority(int priority)
        {
            this.priority = priority;
        }
        public int GetPriority()
        {
            return priority;
        }
        public Movements[] Moves() // en el game
        {
            Movements[] movements = new Movements[24];
            movements[0] = new Movements("Especial", "Destructor", 1, 40, 35, 100, 0);
            movements[1] = new Movements("Especial", "Golpe Kárate", 2, 50, 25, 100, 0);
            movements[2] = new Movements("Especial", "Doble Bofetón", 3, 15, 10, 85, 0);
            movements[3] = new Movements("Especial", "Puño Cometa", 4, 18, 15, 85, 0);
            movements[4] = new Movements("Especial", "Megapuño", 5, 80, 20, 85, 0);
            movements[5] = new Movements("Especial", "Día de pago", 6, 40, 20, 100, 0);
            movements[6] = new Movements("Especial", "Puño Fuego", 7, 75, 15, 100, 0);
            movements[7] = new Movements("Especial", "Puño Hielo", 8, 75, 15, 100, 0);
            movements[8] = new Movements("Especial", "Puño Trueno", 9, 75, 15, 100, 0);
            movements[9] = new Movements("Especial", "Arañazo", 10, 40, 35, 100, 0);
            movements[10] = new Movements("Especial", "Agarre", 11, 55, 30, 100, 0);
            movements[11] = new Movements("Especial", "Guillotina", 12, 1, 5, 30, 0);
            movements[12] = new Movements("Especial", "Viento Coretante", 13, 80, 10, 100, 0);
            movements[13] = new Movements("Especial", "Corte", 14, 50, 30, 95, 0);
            movements[14] = new Movements("Especial", "Tornado", 15, 40, 35, 100, 0);
            movements[15] = new Movements("Especial", "Ataque Ala", 16, 60, 35, 100, 0);
            movements[16] = new Movements("Especial", "Vuelo", 17, 90, 15, 95, 0);
            movements[17] = new Movements("Especial", "Atadura", 18, 15, 20, 85, 0);
            movements[18] = new Movements("Especial", "Atizar", 19, 80, 20, 75, 0);
            movements[19] = new Movements("Especial", "Látigo Cepa", 20, 45, 25, 100, 0);
            movements[20] = new Movements("Especial", "Pisotón", 21, 65, 20, 100, 0);
            movements[21] = new Movements("Especial", "Doble Patada", 22, 30, 30, 100, 0);
            movements[22] = new Movements("Especial", "Megapatada", 23, 120, 5, 75, 0);
            movements[23] = new Movements("Especial", "Patada Salto", 24, 100, 10, 95, 0);
            return movements;
        }
    }
}
