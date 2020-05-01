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
    /// Interaction logic for Temperature.xaml
    /// </summary>
    public partial class Temperature : UserControl
    {
        public Temperature()
        {
            InitializeComponent();
        }

        private async void Addis_Click(object sender, RoutedEventArgs e)
        {
            var result = await WeatherService.GetData();
            // System.Diagnostics.Trace.Write(result["coord"]);
            
            var condition = result["weather"];
            condition = condition[0]; 
            condition = condition["description"];
            weathercondition.Text = condition.ToString();

            var subcountry = result["name"];
            subcountrynameupper.Text = subcountry.ToString();


            var sunrise = double.Parse((string)result["sys"]["sunrise"]);                     
            sunrise = (int)sunrise / 220955830;
            sunriseinput.Text = sunrise.ToString() + " hr";

            var sunset = double.Parse((string)result["sys"]["sunset"]);
            sunset = (int)sunset / 128893713;
            sunsetinput.Text = sunset.ToString() + " hr" ;

            var latitude = (string)result["coord"]["lat"];           
            latitudeinput.Text = latitude.ToString();

            var longtiud = double.Parse((string)result["coord"]["lon"]);
            longtudeInput.Text = longtiud.ToString();

            var humid = double.Parse((string)result["main"]["humidity"]);
            humidityinput.Text = humid.ToString();

            var temp = double.Parse((String)result["main"]["temp"]);
            temp = temp - 273;
            temperatureinput.Text = temp.ToString();
            tempupper.Text = temp.ToString() + " *C";


        }  
            

        private async void Newyork_Click(object sender, RoutedEventArgs e)
        {
            var result = await WeatherNewYork.GetData();

            var condition = result["weather"];
            condition = condition[0];
            condition = condition["description"];
            weathercondition.Text = condition.ToString();

            var subcountry = result["name"];
            subcountrynameupper.Text = subcountry.ToString();

            //var countryy = result["sys"]["country"];
            //countrynameupper.Text = countrynameupper.ToString();


            var sunrise = double.Parse((string)result["sys"]["sunrise"]);
            sunrise = (int)sunrise / 220955830;
            sunriseinput.Text = sunrise.ToString() + " hr";

            var sunset = double.Parse((string)result["sys"]["sunset"]);
            sunset = (int)sunset / 128893713;
            sunsetinput.Text = sunset.ToString() + " hr";

            var latitude = (string)result["coord"]["lat"];
            latitudeinput.Text = latitude.ToString();

            var longtiud = double.Parse((string)result["coord"]["lon"]);
            longtudeInput.Text = longtiud.ToString();

            var humid = double.Parse((string)result["main"]["humidity"]);
            humidityinput.Text = humid.ToString();

            var temp = double.Parse((String)result["main"]["temp"]);
            temp = temp - 273;
            temperatureinput.Text = temp.ToString();
            tempupper.Text = temp.ToString() + " *C";
        }

        private async void Italy_Click(object sender, RoutedEventArgs e)
        {
            var result = await Italy.GetData();

            var condition = result["weather"];
            condition = condition[0];
            condition = condition["description"];
            weathercondition.Text = condition.ToString();

            var subcountry = result["name"];
            subcountrynameupper.Text = subcountry.ToString();

            //var countryy = result["sys"]["country"];
            //countrynameupper.Text = countrynameupper.ToString();

            var sunrise = double.Parse((string)result["sys"]["sunrise"]);
            sunrise = (int)sunrise / 220955830;
            sunriseinput.Text = sunrise.ToString() + " hr";

            var sunset = double.Parse((string)result["sys"]["sunset"]);
            sunset = (int)sunset / 128893713;
            sunsetinput.Text = sunset.ToString() + " hr";

            var latitude = double.Parse((string)result["coord"]["lat"]);
            latitudeinput.Text = latitude.ToString();

            var longtiud = double.Parse((string)result["coord"]["lon"]);
            longtudeInput.Text = longtiud.ToString();

            var humid = double.Parse((string)result["main"]["humidity"]);
            humidityinput.Text = humid.ToString();

            var temp = double.Parse((String)result["main"]["temp"]);
            temp = temp - 273;
            temperatureinput.Text = temp.ToString();
            tempupper.Text = temp.ToString();
        }

      

        private async void AddisForcast_Click_1(object sender, RoutedEventArgs e)
        {
            var result = await WeatherForcastAddisAbaba.GetData();
            // System.Diagnostics.Trace.Write(result["coord"]);

            //var condition = result["weather"];
            //condition = condition[0];
            //condition = condition["description"];
            //weathercondition.Text = condition.ToString();

            //var subcountry = result["name"];
            //subcountrynameupper.Text = subcountry.ToString();

           // var countryy = result["sys"]["country"];
            //countrynameupper.Text = countrynameupper.ToString();

            var sunrise = double.Parse((string)result["sys"]["sunrise"]);
            sunrise = (int)sunrise / 220955830;
            sunriseinput.Text = sunrise.ToString() + " hr";

            var sunset = double.Parse((string)result["sys"]["sunset"]);
            sunset = (int)sunset / 128893713;
            sunsetinput.Text = sunset.ToString() + " hr";

            var latitude = (string)result["coord"]["lat"];
            latitudeinput.Text = latitude.ToString();

            var longtiud = double.Parse((string)result["coord"]["lon"]);
            longtudeInput.Text = longtiud.ToString();

            var humid = double.Parse((string)result["main"]["humidity"]);
            humidityinput.Text = humid.ToString();

            var temp = double.Parse((String)result["main"]["temp"]);
            temp = temp - 273;
            temperatureinput.Text = temp.ToString();
            tempupper.Text = temp.ToString() + " *C";
        }

        private async void London_Click(object sender, RoutedEventArgs e)
        {
            var result = await WeatherLondon.GetData();
            // System.Diagnostics.Trace.Write(result["coord"]);

            var condition = result["weather"];
            condition = condition[0];
            condition = condition["description"];
            weathercondition.Text = condition.ToString();

            var subcountry = result["name"];
            subcountrynameupper.Text = subcountry.ToString();

            //var countryy = result["sys"]["country"];
            //countrynameupper.Text = countrynameupper.ToString();

            var sunrise = double.Parse((string)result["sys"]["sunrise"]);
            sunrise = (int)sunrise / 220955830;
            sunriseinput.Text = sunrise.ToString() + " hr";

            var sunset = double.Parse((string)result["sys"]["sunset"]);
            sunset = (int)sunset / 128893713;
            sunsetinput.Text = sunset.ToString() + " hr";

            var latitude = double.Parse((string)result["coord"]["lat"]);
            latitudeinput.Text = latitude.ToString();

            var longtiud = double.Parse((string)result["coord"]["lon"]);
            longtudeInput.Text = longtiud.ToString();

            var humid = double.Parse((string)result["main"]["humidity"]);
            humidityinput.Text = humid.ToString();

            var temp = double.Parse((String)result["main"]["temp"]);
            temp = temp - 273;
            temperatureinput.Text = temp.ToString();
            tempupper.Text = temp.ToString();
        }
    }
}
