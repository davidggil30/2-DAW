using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.ConstrainedExecution;
using System.Runtime.InteropServices.WindowsRuntime;
using System.Runtime.Remoting.Messaging;
using System.Security.Policy;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace JuegoPokemon
{
    [Serializable]
    abstract class IO
    {

        public delegate void MainMenuFunction();

        // metodo elegir opcion
        public abstract int ChooseOption(string[] s, int wait);
        // Escribir lento
        public abstract void SlowType(string s, int wait);
        // Introducir número por teclado
        public abstract int IntToString();
        // Introducir texto por teclado
        public abstract string Text();


        public abstract void MainLoop();
    }
}
