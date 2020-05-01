using System;
using System.Collections.Generic;
using System.IO.Ports;
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
    /// Interaction logic for LightControl.xaml
    /// </summary>
    public partial class LightControl : UserControl
    {
        bool isConnected = false;
        String[] ports;
        SerialPort port;

        SerialPort port1 = new SerialPort();
        

        public LightControl()
        {

            InitializeComponent();
            //DisableControls();
            GetAvailableComPorts();
            ConnectButton.Content = "Connect";
            

            foreach (string port in ports)
            {
                PortComboBox.Items.Add(port);
                Console.WriteLine(port);
                if (ports[0] != null)
                {
                    PortComboBox.SelectedItem = ports[0];
                }
            }

        }

        private void ConnectButton_Click(object sender, RoutedEventArgs e)
        {
            if (!isConnected)
            {
                ConnectToArduino();
            }
            else
            {
                DisconnectFromArduino();
            }
        }  
    

        void GetAvailableComPorts()
        {
            ports = SerialPort.GetPortNames();
        }


        private void ConnectToArduino()
        {
            try
            {
                isConnected = true;
                //string selectedPort = PortComboBox.SelectedValue.ToString();
                string selectedPort = PortComboBox.SelectedItem.ToString(); // string selectedPort = PortComboBox.SelectedValue.ToString()
                port = new SerialPort(selectedPort, 9600, Parity.None, 8, StopBits.One);
                port.Open();
                port.Write("#STAR\n");
                ConnectButton.Content = "Disconnect";
                EnableControls();
            }
            catch
            {
                MessageBox.Show("Fill in the right serial port (COM)");
            }
        }


        private void Light1Button_Checked(object sender, RoutedEventArgs e)
        {
            if (isConnected)
            {
                if (Light1Button.IsChecked == true)
                {
                    port.Write("#LED1ON\n");
                }
                else
                {
                    port.Write("#LED1OF\n");
                    
                } 
            }
        }

        private void Light2Button_Checked(object sender, RoutedEventArgs e)
        {
            if (isConnected)
            {
                if (Light2Button.IsChecked == true)
                {
                    port.Write("#LED2ON\n");
                }
                else
                {
                    port.Write("#LED2OF\n");
                }
            }
        }

        private void Light3Button_Checked(object sender, RoutedEventArgs e)
        {
            if (isConnected)
            {
                if (Light3Button.IsChecked == true)
                {
                    port.Write("#LED3ON\n");
                }
                else
                {
                    port.Write("#LED3OF\n");
                }
            }
        }

        private void DisconnectFromArduino()
        {
            try
            {
                if (port1.IsOpen)
                    port1.Close();
                isConnected = false;
                port.Write("#STOP\n");
                port.Close();
                ConnectButton.Content = "Connect";
                // DisableControls();
                ResetDefaults();
            }
            catch
            {
                MessageBox.Show("Fill in the right serial port (COM)");
            }
        }

        private void EnableControls()
        {
            Light1Button.IsEnabled = true;
            Light2Button.IsEnabled = true;
            Light3Button.IsEnabled = true;
            ConnectButton.IsEnabled = true;
            //textBox1.Enabled = true;
            //groupBox1.Enabled = true;
            groupBox.IsEnabled = true;

        }

        private void DisableControls()
        {
            Light1Button.IsEnabled = false;
            Light2Button.IsEnabled = false;
            Light3Button.IsEnabled = false;
            ConnectButton.IsEnabled = false;
            //textBox1.Enabled = false;
            //groupBox1.Enabled = false;
            groupBox.IsEnabled = false;
        }

        private void ResetDefaults()
        {
            Light1Button.IsChecked = false;
            Light2Button.IsChecked = false;
            Light3Button.IsChecked = false;
            //textBox1.Text = "";

        }

    }
}
