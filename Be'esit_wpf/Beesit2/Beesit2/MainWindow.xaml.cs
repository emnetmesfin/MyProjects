using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace Beesit2
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public enum States { LANG, SERVICE, EXPERIENCE, MENTOR, MENTORLIST, ADDRESSSTATE, ADDRESSCITY, LOCATION, AMHARIC}
    public partial class MainWindow : Window
    {
        string phoneNumber = "0911223365";
        MessageHandler messageHandler;        
        States state;
        string chooseLanguage = "ቋንቋ ምረጪ\n1. አማርኛ\n2. ትግርኛ\n3. Oromifa\n4. English";
        string chooseService = "Welcome\nPlease Choose a Service\n 1. Receive Inspirational Messages\n" +
            " 2. Find Locations and Contacts\n 3. Find Mentors\n 4. Share your Experience";
        string experience = "Please send your story via SMS to 8410 preceded by the code 'EXP'";
        string addressState = "1.Tigray\n2. Afar\n3. Amhara\n4. Oromia\n5. Somalia\n6.Benishangul Gumuz\n7. SNNP\n8. Harrari\n9. Gambela";
        string addressCity = "1. Hawassa\n2. Sodo\n3. Arba Minch\n4. Bonga\n 5.Chencha\n6. Dila\n7. Irgalem\n8. Mizan Teferi\n" +
            "9. Wendo\n10. Welkite\n 11. Durame\n 12. Hossaena\n 13. Worabe";
        string address = "Gender Office\n Address: Arada kk left of wemezekr\n Phone : +0111 88 73 63\n manager : Miss firehiwot asmamaw" +
            "\nNearest Medical Center\n Hospital: Tena Tabia\n Address: Lorem Ipsum\n Phone2: +251 64 36 29";
        string amharic = "እንኳን ወደ ብእሲት መተግበሪያ በሰላም መጣሽ\n 1. አበረታች መልክቶች\n 2. አድራሻ እና ስልኮችን ፈልጊ\n 3. አማካሪዎች\n 4. ልምድሽን አካፍዪ\n";



        public MainWindow()
        {
            InitializeComponent();
            messageHandler = new MessageHandler();
            label.Text = chooseLanguage;
            state = States.LANG;
        }


        private void Button_Click(object sender, RoutedEventArgs e)
        {
          
            messageHandler.SetMessage(box.Text, phoneNumber, this, state);
        }

        public void showMessage(string message)
        {
            label.Text = message;
        }

        public void SetState(States state)
        {
            this.state = state;
            switch (state)
            {
                case States.LANG:
                    ResetLabel(chooseLanguage);
                    break;
                case States.SERVICE:
                    ResetLabel(chooseService);
                    break;
                case States.EXPERIENCE:
                    ResetLabel(experience);
                    break;
                case States.MENTORLIST:
                    messageHandler.listMentors();
                    break;
                case States.ADDRESSSTATE:
                    ResetLabel(addressState);
                    break;
                case States.ADDRESSCITY:
                    ResetLabel(addressCity);
                    break;
                case States.LOCATION:
                    ResetLabel(address);
                    break;
                case States.AMHARIC:
                    ResetLabel(amharic);
                    break;
            }
            
        }

        public void ResetLabel(string msg)
        {
            label.Text = msg;
            box.Text = "";
        }

        private void messages_click(object sender, RoutedEventArgs e)
        {
            Message m = new Message();
            this.Close();
            m.Show();
        }

        private void phone_click(object sender, RoutedEventArgs e)
        {
            MainWindow m = new MainWindow();
            m.Show();
            this.Close();
        }
    }
}
