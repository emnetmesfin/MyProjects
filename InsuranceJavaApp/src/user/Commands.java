package user;

public class Commands {
    
    public static String addToTableCom(String table,String[] info){
        //this is the message sent to the server
        String command = "com#addToTable#"+table+"#";
        assert(info.length > 0);
        int i;
        for(i = 0;i < info.length-1;i++){
            command += info[i]+"%";
        }
        command += info[i];
        System.out.println(command);
        return command;
    }

    public static String Encode(String message){
        String command = "com#message#";
        command += message;
        return message;
    }
    
    public static String login(String Id,String pass,String type){
        String com = "login#";
        com += Id+"%"+pass+"%"+type;
        return com;
    }
    
    public static String getRow(String Id,String table){
        String com = "getRow#";
        com += table+"%"+Id;
        return com;
    }
    
}
