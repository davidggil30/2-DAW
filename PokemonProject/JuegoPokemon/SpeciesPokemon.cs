using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    class SpeciesPokemon
    {

        string specie;
        string type;
        int id;
        int level;
        int maxHP;
        int currentHP;
        int attack;
        int specialAttack;
        int defense;
        int specialDefense;
        int speed;
        double rc;

        Random rand = new Random();

        // Constructores
        public SpeciesPokemon(string specie, string type, int id, int level, int maxHP, int currentHP, int attack, int specialAttack, int defense, int specialDefense, int speed)
        {
            this.specie = specie;
            this.type = type;
            this.id = id;
            this.level = level;
            this.maxHP = maxHP;
            this.currentHP = currentHP;
            this.attack = attack;
            this.specialAttack = specialAttack;
            this.defense = defense;
            this.specialDefense = specialDefense;
            this.speed = speed;
            rc = GenerateRc();
        }

        // Getter y Setters
        public string GetSpecie()
        {
            return specie;
        }
        public void SetSpecie(string specie)
        {
            this.specie = specie;
        }
        public string GetType()
        {
            return type;
        }
        public void SetType(string type)
        {
            this.type = type;
        }
        public int GetId()
        {
            return id;
        }
        public void SetId(int id)
        {
            this.id = id;
        }
        public int GetMaxHP()
        {
            return maxHP;
        }
        public void SetMaxHP(int maxHP)
        {
            this.maxHP = maxHP;
        }
        public int GetCurrentHP()
        {
            return currentHP;
        }
        public void SetCurrentHP(int currentHP)
        {
            this.currentHP = currentHP;
        }
        public int GetSpeed()
        {
            return speed;
        }
        public void SetSpeed(int speed)
        {
            this.speed = speed;
        }
        public int GetLevel()
        {
            return level;
        }
        public void SetLevel(int level)
        {
            this.level = level;
        }
        public int GetAttack()
        {
            return attack;
        }
        public void SetAttack(int attack)
        {
            this.attack = attack;
        }
        public int GetSpecialAttack()
        {
            return specialAttack;
        }
        public void SetSpecialAttack(int specialAttack)
        {
            this.specialAttack = specialAttack;
        }
        public int GetDefense()
        {
            return defense;
        }
        public void SetDefense(int defense)
        {
            this.defense = defense;
        }
        public int GetSpecialDefense()
        {
            return specialDefense;
        }
        public void SetSpecialDefense(int specialDefense)
        {
            this.specialDefense = specialDefense;
        }
        public double GetRc()
        {
            return rc;
        }
        public void SetRc(double rc)
        {
            this.rc = rc;
        }
        public int GenerateRc() // Generamos el ratio de captura de manera aleatoria
        {
            int rc = rand.Next(0, 256);
            return rc;
        }
    }
}
