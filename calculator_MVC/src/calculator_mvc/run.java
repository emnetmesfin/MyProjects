/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package calculator_mvc;

import javax.swing.SwingUtilities;

//import javax.swing.SwingUtilities;
//import calculator_mvc.Controller;
//import calculator_mvc.Model;
//import calculator_mvc.View;

public class run {

    
    public static void main(String[] args) {
        
                Model model = new Model();
                View view = new View(model);
                Controller controller = new Controller(model, view);

                //model.addObserver(view);
                view.setVisible(true);
            
        
    } 
}
