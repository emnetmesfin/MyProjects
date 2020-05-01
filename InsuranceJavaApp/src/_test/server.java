package _test;

import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;

public class server {
    public static void main(String args[]){
       try{ 
            ServerSocket sst = new ServerSocket(5555);
            Socket st = sst.accept();
            ArrayList<String> abcd = new ArrayList<>();
            abcd.add("abcdef");
            abcd.add("efghik");
            PrintStream ps = new PrintStream(st.getOutputStream());
            ps.println(abcd);
            System.out.println(st);
       }
       catch(Exception ex){}
       
    }
}
