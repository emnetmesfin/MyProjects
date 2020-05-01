package user;
import java.io.IOException;
import java.io.PrintStream;
import java.net.Socket;
import java.util.Scanner;
import javax.swing.JOptionPane;

public class Client implements Runnable {
     Socket SOCK;
     Scanner INPUT;
     Scanner SEND = new Scanner(System.in);
     PrintStream OUT;
     String Id;
     public Client(String Id,Socket x){
         
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
//            System.out.println(MESSAGE);
//            //if(MESSAGE.contains("CLI_REP#")){
//                String[] mess = MESSAGE.split("#");
//                String report = mess[1];
                JOptionPane.showMessageDialog(null,MESSAGE);
            //}
            
            
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
 
    public void addCar(String[] info){
        String table = "pending_car";
        String com = Commands.addToTableCom(table, info);
        this.SEND(com);
    }
    
    public void removeCar(String id,String car_id){
    }
    
    public void deposit(String acct_num,String password){
    
    }
    
    public String getId(){
        return this.Id;
    }
    
}