package user;

import gui.add_car;
import insurance3.*;
import java.io.PrintStream;
import java.net.Socket;
import java.util.ArrayList;
import javax.swing.JOptionPane;
import insurance3.db_handler;
public class Insurance3 {

    public static void main(String[] args) {
        // TODO code application logic here
        String url = "jdbc:mysql://localhost:3306/"
                + "insurance?zeroDateTimeBehavior=convertToNull";
        String uname = "root";
        String upass = "";
        db_handler db = new db_handler(url, uname, upass);
//        ArrayList<ArrayList<String>> ans =
//        db.getRows("pending_car");
        db.remove("pending_car","CAR/0001/00", "ID");
//        Car car = new generalCar();
//        car = new age(car, 26);
//        String[] abc = {"CAR/0001/00","CLI/0000/00","general","2018"};
//        Client cl = new Client("Cli/0000/00");
//        cl.connect("localhost", 5556);
//        cl.addCar(abc);
//        try{
//            //String[] data = {"CAR/0002/00","CLI/0000/00","General","2018"};
//            //Commands.addToTableCom("pending_car",data);
//            final int PORT=5556;
//            final String HOST="localhost";
//            Socket SOCK= new Socket (HOST,PORT);
//            System.out.println("you connected to: "+ HOST);
//            Client Client=new Client(SOCK);    
//            Thread x=new Thread(Client);
//            x.start();
//            String[] data = {"CAR/0004/00","CLI/0000/00","General","2018"};
//            Client.SEND(Commands.addToTableCom("pending_car",data));
//        
//        }
//        catch(Exception ex){JOptionPane.showMessageDialog(null,"An error occcured tryA"
//                + "gain in a few seconds\n\n\nError:"+ex);
//                ex.printStackTrace();
//        }
//    String[] a = {"abc","def"};
//    Commands.addToTableCom("abcd",a);
//        Car x = new generalCar(3000);
//        x = new age(x,15);
//        System.out.println("cost : "+ x.cost());
//        db_handler db = new db_handler(url, uname, upass);
//        String[] abcd = {"Name","FName","GFName"};
//        Object[] ans = db.search("client", abcd,"Da","Name");
//        System.out.println(ans.length);
//        for(Object i:ans){
//            System.out.println(i);
//        }
//        try{
//            Client cl = new Client("CLI/1234/00",(new Socket("localhost",5556)));
//            new add_car(cl).setVisible(true);
//        }
//        catch(Exception ex){
//            ex.printStackTrace();
//        }
        
    }
}
