using System;
using System.Collections.Generic;
using System.IO.Ports;
using System.Linq;
using System.Speech.Recognition;
using System.Speech.Synthesis;
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
    /// Interaction logic for SpeechControl.xaml
    /// </summary>
    public partial class SpeechControl : UserControl 
    {
        public SpeechControl()
        {
            InitializeComponent();
            SpeechRecognizer speechRecognizer = new SpeechRecognizer();
        }
        SpeechSynthesizer speechSynthesizerObj;
        SpeechRecognitionEngine recognizer = new SpeechRecognitionEngine();
        private void Form1_Load(object sender, EventArgs e)
        {
            SpeechRecognitionEngine sRecognize = new SpeechRecognitionEngine();
            Choices sList = new Choices();
            sList.Add(new string[] {
                "light on",
                "light off"
            });
            Grammar gr = new Grammar(new GrammarBuilder(sList));
            try
            {
                sRecognize.RequestRecognizerUpdate();
                sRecognize.LoadGrammar(gr);
                sRecognize.SpeechRecognized += sRecognize_SpeechRecognized;
                sRecognize.SetInputToDefaultAudioDevice();
                sRecognize.RecognizeAsync(RecognizeMode.Multiple);
                sRecognize.Recognize();
            }
            catch
            {
                return;
            }

        }


        private void sRecognize_SpeechRecognized(object sender, SpeechRecognizedEventArgs e)
        {
            {
                if (e.Result.Text == "light on")
                {
                    //SerialPort1.Open();
                    //serialPort1.Write("a"); //send a to Arduino  
                    //serialPort1.Close();
                }
                else if (e.Result.Text == "light off")
                {
                    //serialPort1.Open();
                    //serialPort1.Write("b"); //send b to Arduino  
                    //serialPort1.Close();
                }
            }
        }
    }
}
