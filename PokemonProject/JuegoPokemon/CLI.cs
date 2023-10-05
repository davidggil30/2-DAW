using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using Microsoft.SqlServer.Server;
using System.Windows.Controls;

namespace JuegoPokemon
{
    class CLI : IO
    {
        // metodo elegir opcion
        //public override int ChooseOption(string s, int wait)
        //{
        //    for (int i = 0; i < s.Length; i++)
        //    {
        //        Console.Write(s[i]);
        //        Thread.Sleep(wait);
        //    }
        //    int option = IntToString();
        //    return option;
        //}

        public override int ChooseOption(string[] options, int wait)
        {
            for (int i = 0; i < options.Length; i++)
            {
                string s = options[i];
                for (int j = 0; j < s.Length; j++)
                {
                    Console.Write(s[j]);
                    Thread.Sleep(wait);
                }
                Console.WriteLine();
            }

            while (true)
            {
                try
                {
                    SlowType(" Introduce una opción: ", 0);
                    int option = IntToString();
                    if (option >= 0 && option <= options.Length)
                    {
                        return option;
                    }
                    else
                    {
                        SlowType("Opción inválida. Por favor, elige una opción válida.", 0);
                    }
                }
                catch (FormatException)
                {
                    SlowType("Opción inválida. Por favor, ingresa un número válido.", 0);
                }
            }
        }


        // Escribir lento
        public override void SlowType(string s, int wait)
        {
            for (int i = 0; i < s.Length; i++)
            {
                Console.Write(s[i]);
                Thread.Sleep(wait);
            }
        }
        // Introducir número por teclado
        public override int IntToString()
        {
            int number = 0;
            bool isValidInput = false;

            while (!isValidInput)
            {
                //string input = Console.ReadLine();
                try
                {
                    number = int.Parse(Console.ReadLine());
                    isValidInput = true;
                }
                catch (FormatException)
                {
                    Console.WriteLine("Entrada inválida. Por favor, ingrese un número entero válido.");
                }
            }
            return number;
        }

        // Introducir texto por teclado
        public override string Text()
        {
            string text = Console.ReadLine();
            return text;
        }

        public override void MainLoop()
        {
            throw new NotImplementedException();
        }
    }
}
