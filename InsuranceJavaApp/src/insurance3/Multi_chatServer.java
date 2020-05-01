package insurance3;
import java.io.PrintStream;
import java.net.*;
import java.time.Clock;
import java.util.ArrayList;
import java.util.Scanner;
import javax.swing.JOptionPane;

public class Multi_chatServer {
    public static ArrayList<Socket> connArray = new ArrayList<Socket>();
//    public static ArrayList<String> connUsers = new ArrayList<String>();
    public static void main(String[] args){
        try{
            ServerSocket sst = new ServerSocket(3307);
            while(true){
                System.out.println("server is waiting......");
                Socket st = sst.accept();
                connArray.add(st);
                System.out.println("Client connected from: "
                        +st.getLocalAddress().getHostName());
//                AddUserName(st);
                Multi_chatServer_Return Chat = new Multi_chatServer_Return(st);
                Thread X = new Thread(Chat);
                X.start();
            }
        }
        catch(Exception ex){JOptionPane.showMessageDialog(null, "server is already running or malfunctioning");}
    }
    public static void AddUserName(Socket st){
        try{
        
        Scanner input = new Scanner(st.getInputStream());
        String username = input.nextLine();
//        connUsers.add(username);
//        for(int i = 0;i < connArray.size();i++){
//            Socket Temp_sock = (Socket) connArray.get(i);
//            PrintStream ps = new PrintStream(Temp_sock.getOutputStream());
//            ps.println("#?!"+connUsers);
//            ps.flush();
//            
//            }
        
        }
        catch(Exception ex){
        }
}
}
