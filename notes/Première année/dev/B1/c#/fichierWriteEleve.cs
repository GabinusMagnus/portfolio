using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp64
{
    class Program
    {
        static void Main(string[] args)
        {

            string pathFile = @"\\nas-sio1\donnees\profs\nrisser\fichierWriteV1.txt";
            File.WriteAllText(pathFile, "plus de spectacles au crré magique");
            File.WriteAllText(pathFile, "si en avril 2021");

            List<string> lignesAEcrire = new List<string>();
            lignesAEcrire.Add("il y  aura des chants grégoriens");
            lignesAEcrire.Add("puis des chants russes");
            File.AppendAllLines(pathFile, lignesAEcrire);

        }
    }
}

