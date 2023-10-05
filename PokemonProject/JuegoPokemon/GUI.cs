using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using PokemonInterface;
using static System.Net.Mime.MediaTypeNames;

namespace JuegoPokemon
{
    class GUI : IO
    {
        PokemonInterface.App app;
        PokemonInterface.MainWindow win;

        public GUI()
        {
            win = new MainWindow();            
        }

        public override void MainLoop()
        {
            win = new MainWindow();
        }

        public override int ChooseOption(string[] s, int wait)
        {
            string concatenatedString = string.Join("\n ", s);
            win.TextBlock.Text += concatenatedString;
            win.ShowDialog();
            int option = IntToString();
            win = new MainWindow();
            return option;
        }


        public override int IntToString()
        {
            try
            {
                int number;
                if (int.TryParse(win.TextBox.Text, out number))
                {
                    return number;
                }
                return 0;
            }
            catch (Exception ex)
            {
                // Manejo de la excepción
                Console.WriteLine("Ocurrió un error: " + ex.Message);
                return -1; // Valor de retorno para indicar un error
            }
        }

        public override void SlowType(string s, int wait)
        {
            win.TextBlock.Text += s;
        }

        public override string Text()
        {
            string text = win.TextBox.Text;
            win.TextBlock.Text = text;
            return text;
        }
    }
}
