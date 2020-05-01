package insurance3;

import java.io.BufferedReader;
import java.io.DataInputStream;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.Socket;
import java.util.Scanner;

/**
 *
 * @author Manny
 */
public class Socket_reader extends Thread{
    Socket st;
    public Socket_reader(Socket st_in){
        this.st = st_in;
    }
    public String get_message(){
    String message = null; 
    try{
        //System.out.println("in");
        InputStreamReader ir=new InputStreamReader(this.st.getInputStream());
        BufferedReader br=new BufferedReader(ir);
        String msg2=br.readLine();
        return msg2;
    }
    catch(Exception ex){}
    return message;
    }
    
}
