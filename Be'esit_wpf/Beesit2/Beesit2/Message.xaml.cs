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
using System.Windows.Shapes;

namespace Beesit2
{
    /// <summary>
    /// Interaction logic for Message.xaml
    /// </summary>
    public partial class Message : Window
    {
        private DatabaseHandler databaseHandler = new DatabaseHandler();
        public Message()
        {
            List<string> ids = databaseHandler.SelectAll("idclient_message", "client_message");
            InitializeComponent();
            for (int i = 0; i < ids.Count; i++)
            {
                string title = databaseHandler.SelectOne("title", "client_message", "idclient_message", ids[i]);
                string content = databaseHandler.SelectOne("content", "client_message", "idclient_message", ids[i]);
                Console.WriteLine("eeeeeeeeeee\n" + title + ", " + content);
                Expander expander = new Expander();
                expander.Header = title;
                expander.HorizontalAlignment = HorizontalAlignment.Stretch;
                expander.FontSize = 20;
                StackPanel st = new StackPanel();
                st.Orientation = Orientation.Vertical;
                Thickness t = new Thickness(24, 8, 24, 16);
                st.Margin = t;
                TextBlock textBlock1 = new TextBlock();
                textBlock1.Text = "9:00 pm";
                TextBlock textBlock2 = new TextBlock();
                textBlock2.Text = content;
                textBlock2.Opacity = 0.68;
                textBlock2.TextWrapping = TextWrapping.Wrap;
                st.Children.Add(textBlock1);
                st.Children.Add(textBlock2);
                expander.Content = st;
                panel.Children.Add(expander);

            }
            
        }

        private void messages_click(object sender, RoutedEventArgs e)
        {
           
        }

        private void compose_click(object sender, RoutedEventArgs e)
        {
            Compose c = new Compose();
            this.Close();
            c.Show();
        }

        private void phone_click(object sender, RoutedEventArgs e)
        {
            MainWindow m = new MainWindow();
            this.Close();
            m.Show();
        }
    }
}
