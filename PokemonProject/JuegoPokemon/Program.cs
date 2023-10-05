using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using PokemonInterface;

namespace JuegoPokemon
{
    internal class Program
    {
        [STAThread]
        static void Main(string[] args)
        {
            IO io = new CLI();
            Game g = new Game(io);
            g.Run();

            //PokemonInterface.App app = new PokemonInterface.App();
            //PokemonInterface.MainWindow win = new PokemonInterface.MainWindow();
            //app.MainWindow = win;
            //app.InitializeComponent();
            //app.Run();
        }
    }
}
