using System;
using System.Collections;
using System.Collections.Generic;
using System.Collections.Specialized;
using System.Linq;
using System.Runtime.InteropServices;
using System.Security.Policy;
using System.Text;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    class IndividualPokemon
    {
        SpeciesPokemon specie;
        char gender;
        //int level;
        string eo;
        DateTime? date;
        Movements moves = new Movements();

        Movements[] movements = new Movements[4];

        public IndividualPokemon(SpeciesPokemon specie)
        {
            this.specie = specie;
            this.gender = GenerateGender();
            this.movements = SetMoves();
        }

        
        //setters
        public void SetNameSpecie(string nameSpecie)
        {
            specie.SetSpecie(nameSpecie);
        }
        public void SetTypeSpecie(string typeSpecie)
        {
            specie.SetType(typeSpecie);
        }
        public void SetIdSpecie(int idSpecie)
        {
            specie.SetId(idSpecie);
        }
        public void SetMaxHP(int maxHP)
        {
            specie.SetMaxHP(maxHP);
        }
        public void SetCurrentHP(int currentHP)
        {
            specie.SetCurrentHP(currentHP);
        }
        public void SetAttack(int attack)
        {
            specie.SetAttack(attack);
        }
        public void SetSpecialAttack(int specialAttack)
        {
            specie.SetSpecialAttack(specialAttack);
        }
        public void SetDefense(int defense)
        {
            specie.SetDefense(defense);
        }
        public void SetSpecialDefense(int specialDefense)
        {
            specie.SetSpecialDefense(specialDefense);
        }
        public void SetSpeed(int speed)
        {
            specie.SetSpeed(speed);
        }
        public void SetRc(double rc)
        {
            specie.SetRc(rc);
        }
        public void SetEo(string eo)
        {
            this.eo = eo;
        }

        //Getters

        public char GetGender() { 
        
            return gender;
        }
        public int GetLevel()
        {
            return specie.GetLevel();
        }
        public string GetEo()
        {
            return eo;
        }
        public string GetSpecie()
        {
            return specie.GetSpecie();
        }
        public string GetType()
        {
            return specie.GetType();
        }
        public int GetId()
        {
            return specie.GetId();
        }
        public int GetMaxHP()
        {
            return specie.GetMaxHP();
        }
        public int GetCurrentHP()
        {
            return specie.GetCurrentHP();
        }
        public int GetAttack()
        {
            return specie.GetAttack();
        }
        public int GetSpecialAttack()
        {
            return specie.GetSpecialAttack();
        }
        public int GetDefense()
        {
            return specie.GetDefense();
        }
        public int GetSpecialDefense()
        {
            return specie.GetSpecialDefense();
        }
        public int GetSpeed()
        {
            return specie.GetSpeed();
        }
        public double GetRc()
        {
            return specie.GetRc();
        }
        public Movements[] GetMovements()
        {
            return movements;
        }


        public Movements[] SetMoves()
        {
            Random rand = new Random();
            Movements[] movements = new Movements[4];
            for (int i = 0; i < movements.Length; i++)
            {
                movements[i] = moves.Moves()[rand.Next(0, moves.Moves().Length)];
            }
            return movements;
        }

        public char GenerateGender() // Generamos el género de manera aleatoria
        {
            Random r = new Random(); // Coger del Game
            int num = r.Next(0, 2);
            if (num == 0)
            {
                return 'M';
            }
            else
            {
                return 'F';
            }
        }
        public void SetDate(DateTime? captureDate)
        {
            captureDate = DateTime.Now;
            this.date = captureDate;
        }
        public DateTime? GetDate()
        {
            return date;
        }
    }
}
