package user;

import insurance3.*;
import java.io.IOException;
import java.io.PrintStream;
import java.net.Socket;
import java.util.Scanner;
import javax.swing.JOptionPane;

/**
 *
 * @author Toshba
 */
public class Employee implements Runnable{

     public Socket SOCK;
     Scanner INPUT;
     Scanner SEND = new Scanner(System.in);
     PrintStream OUT;
     public String Id;
     
     public Employee(String Id,Socket x){
         this.SOCK=x;
         this.Id = Id;
     }

    @Override
    public void run() {
        try{
            try{
                INPUT=new Scanner(SOCK.getInputStream());
                OUT=new PrintStream(SOCK.getOutputStream());
                OUT.flush();
                CheckStream();
            }finally{SOCK.close();}
        }
        catch(Exception x){
            System.out.print(x);
        }
    }
    
    public void DISCONNECT() throws IOException{
        OUT.println(this.SOCK.getInetAddress().getHostName()+" has disconnected.");
        OUT.flush();
        SOCK.close();
        JOptionPane.showMessageDialog(null, "you disconnected!");
        System.exit(0);
    }
    
    public void CheckStream(){
        while(true){
            RECEIVE();
        }
    }
    
    public void RECEIVE(){
        if(INPUT.hasNext()){
            String MESSAGE = INPUT.nextLine();
            System.out.println(MESSAGE);
            if(MESSAGE.contains("cli_srch_rep")){
                
            }
            
        }
    }
    
    public void SEND(String X){
        try{
            OUT = new PrintStream(SOCK.getOutputStream());
            OUT.println(X);
            OUT.flush();
        }catch(Exception ex){System.out.println("ex");}
  //      A_Chat_Client_GUI.TF_Message.setText("");
    }
     
    public String[] search(String Cl_Id){
        String[] ans = null;
        try{
            String com = Commands.getRow(Cl_Id,"client");
            this.SEND(com);
            Scanner in = new Scanner(this.SOCK.getInputStream());
            System.out.println("3");
            String MESSAGE = in.nextLine();
            System.out.println("4");
            System.out.println("Message"+MESSAGE);
            String[] st1 = MESSAGE.split("#");
            String[] st2 = st1[1].split("%");
            return st2;
        }
        catch(Exception ex){}
        return ans;
    }
    
    public void AddCar(String CarId){}
        
}
