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
    /// Interaction logic for DisplayControl.xaml
    /// </summary>
    public partial class DisplayControl : UserControl
    {
        bool isConnected = false;
        String[] ports;
        SerialPort port;

        SerialPort port1 = new SerialPort();

        public DisplayControl()
        {
            InitializeComponent();
           // DisableControls();
            GetAvailableComPorts();
           ConnectButton1.Content = "CONNECT";

            foreach (string port in ports)
            {
                PortComboBox1.Items.Add(port);
                Console.WriteLine(port);
                if (ports[0] != null)
                {
                    PortComboBox1.SelectedItem = ports[0];
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
                string selectedPort = PortComboBox1.SelectedItem.ToString(); // string selectedPort = PortComboBox.SelectedValue.ToString()
                port = new SerialPort(selectedPort, 9600, Parity.None, 8, StopBits.One);
                port.Open();
                port.Write("#STAR\n");
                ConnectButton1.Content = "Disconnect";
                EnableControls();
            }
            catch
            {
                MessageBox.Show("Fill in the right serial port (COM) or Disconnect first");
            }
        }

        private void DisconnectFromArduino()
        {
            try
            {
                //if (port1.IsOpen)
                   // port1.Close();
                isConnected = false;
                port.Write("#STOP\n");
                port.Close();
                ConnectButton1.Content = "Connect";
                // DisableControls();
                ResetDefaults();
            }
            catch
            {
                MessageBox.Show("Fill in the right serial port (COM) or connect first");
            }
        }

        private void EnableControls()
        {
           
            ConnectButton1.IsEnabled = true;
            //textBox1.Enabled = true;
            //groupBox1.Enabled = true;
            groupBox.IsEnabled = true;

        }

        private void DisableControls()
        {
           
            ConnectButton1.IsEnabled = false;
            DisplayTextBox.IsEnabled = false;
            groupBox.IsEnabled = false;
        }

        private void ResetDefaults()
        {
            
            DisplayTextBox.Text = "";

        }

        private void WriteButton_Click(object sender, RoutedEventArgs e)
        {
            if (isConnected)
            {
                port.Write("#TEXT" + DisplayTextBox.Text + "#\n");
            }
        }

        private void PortComboBox1_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

        }
    }
}
