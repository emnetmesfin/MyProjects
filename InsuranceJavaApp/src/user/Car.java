package user;

import insurance3.*;
import javax.swing.JOptionPane;

public interface Car{
    public double cost();
}

class generalCar implements Car{
    double cost;
    public generalCar(double cost){
        this.cost = cost;
    }
    public double cost(){
        return this.cost;
    }
}
class age implements Car{
    int age;
    Car car;
    public age(Car car_in,int age_in){
        this.age = age_in;
        this.car = car_in;
    }
    public double cost(){
        double amt = 0;
        try{
            double orig = this.car.cost();
            double rate = 0;
            if(this.age < 0){
                throw new InformationError("age cannot be less than 0");
            }
            else if(this.age > 0 && this.age <= 5){
                rate = 0.05;
            }
            else if(this.age > 5 && this.age <= 10){
                rate = 0.05;
            }
            else if(this.age > 10 && this.age <= 15){
                rate = 0.05;
            }
            else if(this.age > 15 && this.age <= 20){
                rate = 0.05;
            }
            else if(this.age > 20 && this.age <= 25){
                rate = 0.05;
            }
            else{
                throw new InformationError("We dont accept insurance"
                        + " for ages greater than 25 please enter the form age");
            }
            amt = orig + (orig * rate);
            System.out.println("amt: "+rate);
            
        }
        catch(Exception ex){
            JOptionPane.showMessageDialog(null, ex);
        }
        
        return amt;
    }
}

class privateCar{

}
