package insurance3;

import java.util.Date;

public class ID {
    private String id;
    
    public String getId(){
      return id;
    }
    
    public void setId(String id){
        this.id = id;  
    }
    
    public ID(String type){
         
             
        String temp = part1(type) +"/"+ part2() +"/"+ part3();
        
        String url = "jdbc:mysql://localhost:3306/"+
        "insurance?zeroDateTimeBehavior=convertToNull";
        String uname = "root";
        String upass = "";
        db_handler db = new db_handler(url, uname, upass);
        boolean x;
        if(type.equals("client")){
            x = db.inDB("client", "ID","ID",temp);
        }
        else if(type.equals("car")){
            x = db.inDB("pending_car", "ID", "ID", temp);
            x = db.inDB("car", "ID", "ID", temp);
        }
        else if(type.equals("pending")){
            x = db.inDB("pending_car", "ID","ID", temp);
        }
        else if(type.equals("payment")){
            x = db.inDB("car_payment", "ID", "ID", temp);
        }
        else{
            x = db.inDB("employee", "ID", "ID", temp);
        }
//        sout
        if(!x){
            this.setId(temp);
        }
        else{
            new ID(type);
        }
        
    }
    public String part1(String type){
        String p1 = "";
        if(type.equals("client")){
           p1 += "CLI";
        }
        //return p1;
        if(type.equals("car")){
            p1 += "CAR";
        }
        if(type.equals("employee")){
            p1 += "EMP";
        }
        if(type.equals("payment")){
            p1 += "PAY";
        }
       return p1;
    }
    
    public String part2(){
        String p2 = "";
        int number1 = (int)(Math.random() * 10000);
        if (number1 < 1000 && number1 >= 100) {
            p2 += "0" + number1;
        }
        if (number1 < 100 && number1 >= 10) {
            p2 += "00" + number1;
        }
        if(number1 < 10){
            p2 += "000" + number1;
        }
        if(number1 >= 1000 && number1 < 10000){
            p2 += number1;
        }
        return p2;
                
        }
    
     public String part3(){
        String p3 = "";
        Date d = new Date();
        int year = d.getYear()-100;
        p3 = ""+year;
        return p3;
     }   
}