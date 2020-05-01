using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Beesit2
{
    public class MessageHandler
    {
        private String message, phoneNumber;
        private DatabaseHandler databaseHandler = new DatabaseHandler();
        MainWindow main;
        States state;

        public void SetMessage(string message, string phoneNumber, MainWindow main, States state)
        {
            this.message = message;
            this.phoneNumber = phoneNumber;
            this.main = main;
            this.state = state;
            analyzeMessage();
        }

        private void analyzeMessage()
        {
            if (state == States.LANG)
            {
                if (message == "4")
                {
                    main.SetState(States.SERVICE);
                }
                else if (message  == "1")
                {
                    main.SetState(States.AMHARIC);
                }
                
            }
            else if (state == States.SERVICE)
            {
                if (message == "1")
                {
                    main.SetState(States.ADDRESSSTATE);
                    
                }
                else if (message == "2")
                {
                    main.SetState(States.LOCATION);
                }
                else if (message == "3")
                {
                    listMentors();
                }
                else if (message[0].Equals('M'))
                {
                    getMentor(message[1]);
                    main.SetState(States.MENTOR);

                }
                else if(message == "4")
                {
                    main.SetState(States.EXPERIENCE);
                }
            }
            else if (state == States.MENTOR)
            {
                if (message == "1")
                {
                    main.showMessage("Registration was successful");
                }
                else if (message == "2")
                {
                    main.SetState(States.MENTORLIST);
                }
                else if (message == "*")
                {
                    main.SetState(States.SERVICE);
                }
            }
            else if (state == States.ADDRESSSTATE)
            {
                if (message == "7")
                {
                    main.SetState(States.ADDRESSCITY);
                }
            }
            else if (state == States.ADDRESSCITY)
            {
                if (message == "1")
                {
                    register();
                    
                }
            }
           
           
        }

        private void register()
        {
            databaseHandler.AddUser(phoneNumber);
            string messageToSend = databaseHandler.SelectOne("content", "message", "idmessage", "1");
            sendMessage(messageToSend);
        }

        private void sendMessage(string message)
        {
            databaseHandler.AddMessage(message, "8410");
            
        }

        public void listMentors()
        {
           List<String> ids = databaseHandler.SelectAll("Volunteer_id", "volunteer");
            List<string> volunteers = new List<string>();
            for (int i = 0; i < ids.Count; i++)
            {
                volunteers.Add(databaseHandler.SelectOne("name", "volunteer", "Volunteer_id", ids[i].ToString()));
                Console.WriteLine("-------------\n" + ids[i] + " , " + volunteers[i]);
            }

            string msg = "";
            for (int i = 0; i < ids.Count; i++)
            {
                msg += "M" + ids[i] + " for " + volunteers[i] + "\n";
            }
            main.showMessage(msg);
        }

        private void getMentor(char id)
        {
            string name = databaseHandler.SelectOne("Name", "volunteer", "Volunteer_id", id.ToString());
            string age = databaseHandler.SelectOne("Age", "volunteer", "Volunteer_id", id.ToString());
            string profession = databaseHandler.SelectOne("Profession", "volunteer", "Volunteer_id", id.ToString());
            string phone = databaseHandler.SelectOne("PhoneNum", "volunteer", "Volunteer_id", id.ToString());

            main.showMessage("Name፡ " + name + "\n" + "Age፡ " +  age + "\n" + "Profession፡ " + profession + "\n" + "Phone Number፡ " + phone
                + "\n\nPress 1 to register under this mentor.\nPress 2 to go back. \nPress * to go back to main menu.");
            
        }

    }
}
