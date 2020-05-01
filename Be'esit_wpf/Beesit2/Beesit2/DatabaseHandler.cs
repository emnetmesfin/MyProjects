using MySql.Data.MySqlClient;
using System;
using static System.Console;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Beesit2
{
    public class DatabaseHandler
    {
        string connectionString = "Server=localhost;port=3306;Database=beesit;username=root;password='';";
        public bool AddUser(string number)
        {
            using (MySqlConnection mysqlCon = new MySqlConnection(connectionString))
            {

                MySqlCommand command = new MySqlCommand($"insert into user (phoneNum) values('{number}')", mysqlCon);
                MySqlDataReader reader;
                try
                {
                    mysqlCon.Open();
                }
                catch (Exception ex)
                {
                    WriteLine(ex.Message);
                    return false;
                }
                reader = command.ExecuteReader();
                while (reader.Read())
                {
                }

            }
            return true;
        }

        public bool AddMessage(string message, string title)
        {
            using (MySqlConnection mysqlCon = new MySqlConnection(connectionString))
            {

                MySqlCommand command = new MySqlCommand($"insert into client_message (content, title) values('{message}', '{title}')", mysqlCon);
                MySqlDataReader reader;
                try
                {
                    mysqlCon.Open();
                }
                catch (Exception ex)
                {
                    WriteLine(ex.Message);
                    return false;
                }
                reader = command.ExecuteReader();
                while (reader.Read())
                {
                }

            }
            return true;
        }


        public string SelectOne(string col, string from, string where, string key)
        {
            string toReturn = "";
            using (MySqlConnection mysqlCon = new MySqlConnection(connectionString))
            {

                MySqlCommand command = new MySqlCommand($"select {col} from {from} where {where} = {key};", mysqlCon);
                Console.WriteLine($"select {col} from {from} where {where} = {key};");
                MySqlDataReader reader;
                try
                {
                    mysqlCon.Open();
                }
                catch (Exception ex)
                {
                    WriteLine(ex.Message);
                }
                reader = command.ExecuteReader();
                while (reader.Read())
                {
                    toReturn = reader[col].ToString();
                }

            }
            return toReturn;
        }

        public List<string> SelectAll(string col, string from)
        {
            List<string> toReturn = new List<string>();
            using (MySqlConnection mysqlCon = new MySqlConnection(connectionString))
            {

                MySqlCommand command = new MySqlCommand($"select * from {from};", mysqlCon);
                MySqlDataReader reader;
                try
                {
                    mysqlCon.Open();
                }
                catch (Exception ex)
                {
                    WriteLine(ex.Message);
                }
                reader = command.ExecuteReader();
                while (reader.Read())
                {
                    toReturn.Add(reader[col].ToString());
                }

            }
            return toReturn;
        }
    }
}

