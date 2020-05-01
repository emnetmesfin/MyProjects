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
    /// Interaction logic for Temperature_sensor.xaml
    /// </summary>
    public partial class Temperature_sensor : UserControl
    {

        SerialPort _serialPort;
        delegate void SetTextDelegate(string value);


        public Temperature_sensor()
        {
            InitializeComponent();
            _serialPort = new SerialPort();
            _serialPort.BaudRate = 9600;
            _serialPort.Parity = Parity.None;
            _serialPort.DataBits = 8;
            _serialPort.ReadTimeout = 500;
           _serialPort.WriteTimeout = 500;
            _serialPort.DataReceived += new SerialDataReceivedEventHandler(DataReceivedHandler);

            if (_serialPort.IsOpen)
                _serialPort.Close();
            connectionStatus.Text = "NOT CONNECTED";
            //connectionStatus.Foreground = System.Drawing.Color.Red;
            tempWrite.Text = "00.0";
        }

       /* private void Temperature_sensor_load(object sender, EventArgs e)
        {
            _serialPort = new SerialPort();
            _serialPort.BaudRate = 9600;
            _serialPort.Parity = Parity.None;
            _serialPort.DataBits = 8;
            _serialPort.ReadTimeout = 500;
            _serialPort.WriteTimeout = 500;
            _serialPort.DataReceived += new SerialDataReceivedEventHandler(DataReceivedHandler);
        }*/

        private void button1_Click(object sender, RoutedEventArgs e)
        {
            try
            {
                _serialPort.PortName = portWrite.Text;
                //connectionStatus.Text = "CONNECTION OK";
                //if (!_serialPort.IsOpen)           
                    _serialPort.Open();
                    connectionStatus.Text = "CONNECTION OK";
                //connectionStatus.Foreground = System.Drawing.Color.Lime;

                _serialPort.DataReceived += new SerialDataReceivedEventHandler(DataReceivedHandler);
                string indata1 = _serialPort.ReadLine();
                string indata2 = _serialPort.ReadLine();

                tempWrite.Text = indata2;
                humWrite2.Text = indata1;
                
            }
             
                catch
            {
                MessageBox.Show("Fill in the right serial port (COM) or Disconnect first");
            }

        }

        private void button2_Click(object sender, RoutedEventArgs e)
        {
            try
            {
                if (_serialPort.IsOpen)
                    _serialPort.Close();
                connectionStatus.Text = "NOT CONNECTED";
                //connectionStatus.Foreground = System.Drawing.Color.Red;
                tempWrite.Text = "00.0";
            }
            catch 
            {
                MessageBox.Show("Fill the correct serial port");
            }
        }



        public void SetText(string value)
        {

            //if (InvokeRequired)
            //  try
            // {
            // Invoke(new SetTextDelegate(SetText), value);
            // }
            // catch { }
            //else

           // tempWrite.Text = value;
        }

        private void DataReceivedHandler(object sender, SerialDataReceivedEventArgs e)
        {
            //string indata = _serialPort.ReadLine();
            // SetText(indata);
            // try
            // {
           // tempWrite.Text = indata;
                //SetText(indata);
           // }
           // catch
            //{
                //MessageBox.Show(indata);
           // } 
        }

    }
}
