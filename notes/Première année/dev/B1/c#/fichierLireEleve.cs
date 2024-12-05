using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp63
{
    class Program
    {
        static void Main(string[] args)
        {  
            string[] lines = File.ReadAllLines(@"F:\btssio\SLAM\SI4\Cours\verslobjetS1\utilisationOOExistant\essaiprod1.txt");
            foreach (string line in lines)
            {
                Console.WriteLine(line);
            }
            Console.ReadKey();
        }
    }
}
