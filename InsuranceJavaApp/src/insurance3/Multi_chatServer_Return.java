package insurance3;

import java.io.*;
import java.net.*;
import java.util.Scanner;

public class Multi_chatServer_Return implements Runnable{
    Socket st;
    private Scanner input;
    private PrintStream output;
    private db_handler db;
    String Message = "";
    
    public Multi_chatServer_Return(Socket sock){
        this.st = sock;
        String url = "jdbc:mysql://localhost:3306/"
                + "insurance?zeroDateTimeBehavior=convertToNull";
        String uname = "root";
        String upass = "";
        this.db = new db_handler(url, uname, upass);
    }

    public void checkConnection() throws IOException{
        if(!st.isConnected()){
        for(int i = 0;i < Multi_chatServer.connArray.size();i++){
            if(Multi_chatServer.connArray.get(i) == st){
                Multi_chatServer.connArray.remove(i);
            }
        }
//        for(int i = 0;i < Multi_chatServer.connArray.size();i++){
//            Socket Temp_sock = Multi_chatServer.connArray.get(i);
//            PrintStream temp_out = new PrintStream(Temp_sock.getOutputStream());
//            temp_out.println(Temp_sock.getLocalAddress().getHostName()+" disconnected");
//            temp_out.flush();
//            System.out.println(Temp_sock.getLocalAddress().getHostName()+" disconnected");
//        }
    }
}

    public void run(){
        
    try{
        try{
            System.out.println("here");
            input = new Scanner(st.getInputStream());
            output = new PrintStream(st.getOutputStream());
            while(true){
                checkConnection();
                if(!input.hasNext()){
                    break;
                }
                
                Message = input.nextLine();
                System.out.println(Message);
                if (Message.contains("com#"))
                {
                    commandProcessor(Message);
                }
                else if(Message.contains("login#")){
                    commandProcessor(Message);
                }
                else if(Message.contains("getRow#")){
                    commandProcessor(Message);
                }
                else if(Message.contains("getPendingCarList#")){
                    commandProcessor(Message);
                }
                else if(Message.contains("remPendCar#")){
                    commandProcessor(Message);
                }
//                for(int i = 0;i < Multi_chatServer.connArray.size();i++){
//                Socket Temp_SOCK = Multi_chatServer.connArray.get(i);
//                PrintStream temp_out = new PrintStream(Temp_SOCK.getOutputStream());
//                temp_out.println(Message);
//                temp_out.flush();
//                System.out.println("Sent to: "+Temp_SOCK.getLocalAddress().getHostName());
//                }
            }
        }
        finally{
            st.close();
            }
        }
    catch(Exception ex){            
        }
    }
    
    public void commandProcessor(String message){
        String[] com = message.split("#");
        System.out.println("in command processor");
        try{
            if(com[0].equals("getPendingCarList")){
                System.out.println("in get Pending Car List");
                PrintStream OUT = new PrintStream(this.st.getOutputStream());
                String reply = db.getRows("pending_car").toString();
                System.out.println(reply);
                OUT.println("pendingCarRep#"+reply);
            }
            else if(com[1].equals("addToTable")){
                String table = com[2];
                int leng = com[3].split("%").length + 1;
                String[] info = new String[leng];
                if(table.equals("client")){
                    info[0] = new ID("client").getId();
                }
                else if(table.equals("car")){
                    info[0] = new ID("car").getId();
                }
                else if(table.equals("pending_car")){
                    info[0] = new ID("car").getId();
                }
                else if(table.equals("car_payment")){
                    info[0] = new ID("payment").getId();
                }
                else if(table.equals("employee")){
                    info[0] = new ID("employee").getId();
                }
                System.out.println("INFO[0]: "+info[0]);
                String[] info2 = com[3].split("%");
                for(int i = 0;i < info2.length;i++){
                    info[i+1] = info2[i];
                }
                addToTable(table,info);
            }
            else if(com[0].equals("login")){
                System.out.println("in login processor");
                PrintStream OUT = new PrintStream(this.st.getOutputStream());
                String[] info = com[1].split("%");
                String table = null;
                if(info[2].equals("client")){
                    table = "client";
                }
                else if(info[2].equals("Employee")){
                    table = "employee";
                    
                }
                else if(info[2].equals("Technician")){
                    table = "employee";
                }
                String trueJob = null;
                if(info[2].equals("Technician") || info[2].equals("Employee")){
                    trueJob = db.getData(table, "Job_Type", "ID", info[0]);
                    if(trueJob.equals(info[2])){
                        
                    }
                    else{
                        OUT.println(Commands.Encode("login_rep","invalid"));
                    }
                }
                
                String pass = db.getData(table, "Password", "Id",info[0]);
                
                System.out.println("password: "+pass);
                if(pass.equals(info[1])){
                    OUT.println(Commands.Encode("login_rep","valid"));
                }
                else{
                    OUT.println(Commands.Encode("login_rep","invalid"));
                }
                
            }
            else if(com[0].equals("getRow")){
                String[] info = com[1].split("%");
                System.out.println("");
                String[] row = db.getRow(info[0], "ID", info[1]);
                for(String i:row){
                    System.out.println(i);
                }
                PrintStream OUT = new PrintStream(this.st.getOutputStream());
                OUT.println(Commands.sendRow(row));
                System.out.println("Done sending a single Row");
            }
            else if(com[0].equals("remPendCar")){
                String row = com[1];
                System.out.println("inremoving pending car");
                this.db.remove("pending_car", row, "ID");
            }
            
        }
        catch(Exception ex){
            System.out.println(ex);
        }
        System.out.println("done in command processor");
    }
    
    public void addToTable(String table,String[] info){
        System.out.println("in addTable");
        db.insert(table, info);
        System.out.println("Entry successfull");
    }
    
}