
package gussinggame;

import java.util.Scanner;

public class GussingGame {
    
   static boolean KeepPlaying = true;
   static Scanner sc = new Scanner(System.in);
   
    public static void playRound(){
        
        int number ,guess;
        boolean validInput = false;
        number = (int) (Math.random() * 10) + 1;
        
        System.out.println("I am thinking of a number between 1 and 10!\n what do u think it is?");
        
        do{
          guess = sc.nextInt();
          if (guess < 1 || guess > 10){
            System.out.println("I said between 1 and 10 Try again:");
            validInput = false;
          }
        } 
       while (validInput);
         
        
        if (guess == number){
            System.out.println("Congratulaton!!! you gat the number.");
        }
        else{
            System.out.println("You are wrong! \n The Number was\t...." + number );
        }
        
        // play again
        
        do{
         System.out.println("Do you want to paly again?\n Y or N");
          String answer = sc.next();
         validInput = true;
         if (answer.equalsIgnoreCase("Y"))
             ;
         else if (answer.equalsIgnoreCase("N"))
             KeepPlaying = false;
         else
             validInput = false;
        } while(!validInput);
        
        
    }  
     
    public static void main(String[] args) {
        
        System.out.println("Lets play a gussing game!");
        while (KeepPlaying)
        {
         playRound();
        }
        System.out.println("Thank you for playing.");
       
    }
    
}
