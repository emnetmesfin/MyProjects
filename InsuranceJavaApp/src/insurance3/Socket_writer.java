package insurance3;

import java.io.IOException;
import java.io.PrintStream;
import java.net.Socket;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Manny
 */
public class Socket_writer{
    Socket st;
    public Socket_writer(Socket st_in){
        this.st = st_in;
         
    }
    
    public void send(String message){
     
    try {
        if(message != null){
            PrintStream ps=new PrintStream(this.st.getOutputStream());
            ps.println(message);
        }
        
    } 
    catch (Exception ex) {
        System.out.println(ex);
    }
    }
}
