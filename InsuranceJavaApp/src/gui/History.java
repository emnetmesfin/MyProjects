package gui;

import java.util.ArrayList;


public class History {
    static HistoryStack history = new HistoryStack();
}

class HistoryStack{
    ArrayList<javax.swing.JFrame> history = new ArrayList<>();
    public HistoryStack(){
        
    }
    public javax.swing.JFrame pop(){
        int ind = this.history.size() - 1;
        return this.history.remove(ind);
    }
    public void push(javax.swing.JFrame item){
        history.add(item);
    }
}
