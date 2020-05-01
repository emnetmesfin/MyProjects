
public class guess {
  
        static int num;
    
     public static int getRandomNumber() {
     
        int num; 
        while (true) {
            num = (int)(Math.random() * 20) + 1; 
             System.out.println("The number is:" + num);
            if (num != 12){ 
                return num;
               
            }
        }   

}  
public static void main(String[] args) {
    getRandomNumber();
    
}
}

