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

namespace HomeAutomation
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            
        }

       /* private void GoToLightClick(object sender, RoutedEventArgs e)
        {
            //Main.content = new LightControl();
            LightControl temps = new LightControl();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(temps);
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {

            Temperature temp = new Temperature();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(temp);
        }

        private void DisplayClicked(object sender, RoutedEventArgs e)
        {
            DisplayControl temp = new DisplayControl();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(temp);
        } */

        private void ButtonOpenMenu_Click(object sender, RoutedEventArgs e)
        {

        }

        private void ButtonCloseMenu_Click(object sender, RoutedEventArgs e)
        {

        }

        private void ButtonPopUpLogout_Click(object sender, RoutedEventArgs e)
        {

        }

        private void ListViewItem_SelectedTemp(object sender, RoutedEventArgs e)
        {
            Temperature temp = new Temperature();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(temp);
        }

        private void ListViewItem_SelectedSpeech(object sender, RoutedEventArgs e)
        {
            SpeechControl speech = new SpeechControl();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(speech);
        }

        private void ListViewItem_SelectedLight(object sender, RoutedEventArgs e)
        {
            LightControl light = new LightControl();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(light);
        }

        private void ListViewItem_SelectedDisplay(object sender, RoutedEventArgs e)
        {
            DisplayControl temp = new DisplayControl();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(temp);
        }

        private void ListViewItem_SelectedDescription(object sender, RoutedEventArgs e)
        {
            Description disc = new Description();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(disc);
        }

        private void ListViewItem_selectedTempSensor(object sender, RoutedEventArgs e)
        {
            Temperature_sensor sensor = new Temperature_sensor();
            this.workingSpace.Children.Clear();
            this.workingSpace.Children.Add(sensor);
        }
    }
}
