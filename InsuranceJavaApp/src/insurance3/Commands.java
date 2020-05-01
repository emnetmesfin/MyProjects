package insurance3;

public class Commands {
    public static String addToTableCom(String table,String[] info){
        //this is the message sent to the server
        String command = "com#addToTable#";
        command += table+"#"+info[0];
        for(int i = 1;i < info.length;i++){
            command += "%"+info[i];
        }
        
        System.out.println(command);
        return command;
    }
    
    public static String addtoCarfromPend(String info){
        String com = "";
        return "";
    }
    
    public static String sendRow(String[] info){
        String command = "sentRow#"+info[0];
        
        for(int i = 1;i < info.length;i++){
            command += "%"+info[i];
        }
        return command;
    }
//    public static String getTable(String[] info){
//        //this is an array recieved from server converted to string
//        //
//        String command = "/com/";
//        command += info[0];
//        for(int i = 1;i < info.length;i++){
//            command += "%"+info[1];
//        }
//        System.out.println(command);
//        return command;
//    }
    public static String Encode(String type,String message){
        String command = type+"#";
        command += message;
        return command;
    }
    
    public void getMultidimension(String[][] data){
        
    }
}
