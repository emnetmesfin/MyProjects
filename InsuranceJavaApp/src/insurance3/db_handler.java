package insurance3;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.Statement;
import java.util.ArrayList;


public class db_handler {
    
    Connection con;
    Statement st;

    public db_handler(String url,String uname,String upass){
        try {
            Class.forName("com.mysql.jdbc.Driver");
            con = 
                    DriverManager.getConnection(url,uname,upass);
            if (con != null){
                System.out.println("connection established");
            }
            else{
                throw new Exception("Connection not established");
            }
            st = con.createStatement();
        } 
        catch (Exception ex) {
            System.out.println("error: "+ex);
        }
    }

    public String getData(String table,String col_name,String col,String row){
        String data = null;
        
        try{
            String query = "SELECT * FROM "+ table +" WHERE "+col+" = '"+row+"';";
            
            ResultSet rs = st.executeQuery(query);
            rs.next();
            data = rs.getString(col_name);
        }
        catch(Exception ex){
            System.out.println("Error: "+ ex);
        }
        return data;
    }
    
    public ArrayList<ArrayList<String>> getRows(String table,String row,String col){
        /**
         Query = "Select * From table Where col = row and then
         * it returns the rows that match the above query"
         **/
        ArrayList<ArrayList<String>> ans = new ArrayList<>();
        try{
            String query = "SELECT * FROM "+ table +" WHERE `"+col+"` = '"+row+"';";
            ResultSet rs = st.executeQuery(query);
            ResultSetMetaData rsmd = rs.getMetaData();
            int numOfCols = rsmd.getColumnCount();
            while(rs.next()){
                ArrayList<String> row_data = new ArrayList<>();
                for(int i = 1;i <= numOfCols;i++){
                    row_data.add(rs.getString(i));
                }
                ans.add(row_data);
            }
            
            
        }
        catch(Exception ex){}
        return ans;
    }
    
    public ArrayList<ArrayList<String>> getRows(String table){
        /**
         Query = "Select * From table Where col = row and then
         * it returns the rows that match the above query"
         **/
        ArrayList<ArrayList<String>> ans = new ArrayList<>();
        try{
            String query = "SELECT * FROM "+ table;
            ResultSet rs = st.executeQuery(query);
            ResultSetMetaData rsmd = rs.getMetaData();
            int numOfCols = rsmd.getColumnCount();
            while(rs.next()){
                ArrayList<String> row_data = new ArrayList<>();
                for(int i = 1;i <= numOfCols;i++){
                    row_data.add(rs.getString(i));
                }
                ans.add(row_data);
            }
            
            
        }
        catch(Exception ex){}
        return ans;
    }

    public void insert(String table,String[] values){
        try{
        String value= "";
        for(String i : values){
            value += "'"+i + "',";
        }
        value = value.substring(0, value.length()-1);
            
        String query = "Insert into "+table+" values("+value+");";
            System.out.println(query);
        st.executeUpdate(query);
        }
        catch(Exception ex){
            System.out.println("error1: "+ ex);
        }
    }

    public Object[] search(String table,String[] cols,String row,String col){
        /**
         Query = "Select * From table Where col = row and then
         * it returns the rows that match the above query"
         **/
        Object[] ans2 = null;
        ArrayList<Object[]> ans = new ArrayList<>();
        try{
            String query = "SELECT * FROM "+ table +" WHERE "+table+".`"+col+"` LIKE '%"+row+"%';"; 
            System.out.println(query);
            ResultSet rs = st.executeQuery(query);
            while(rs.next()){
                ArrayList<String> row_data = new ArrayList<>();
                for(String i:cols){
                    row_data.add(rs.getString(i));
                }
                ans.add(row_data.toArray());
                ans.toArray();
            }
            ans2 = ans.toArray();
            
        }
        catch(Exception ex){}
        return ans2;
    }

    public boolean inDB(String table,String col_name,String col,String row){
        try{
            String query = "SELECT * FROM "+ table +" WHERE "+col+" = '"+row+"';";
            System.out.println(query);
            ResultSet rs = st.executeQuery(query);
            int x = 0;
            while(rs.next()){
                x+=1;
            }
            if(x == 0){
                return false;
            }
            else{return true;}
        }
        catch(Exception ex){}
        return false;
    }

    public String[] getRow(String table,String col,String row){
        String[] data = null;
        try{
            String query = "SELECT * FROM "+ table +" WHERE "+col+" = '"+row+"';";
            
            ResultSet rs = st.executeQuery(query);
            ResultSetMetaData rsmd = rs.getMetaData();
            
            int numOfCols = rsmd.getColumnCount();
            data = new String[numOfCols];
            while(rs.next()){
                for(int i = 1;i <= numOfCols;i++){
                    data[i-1] = rs.getString(i);
                }
            }
        }
        catch(Exception ex){
            System.out.println("Error: "+ ex);
        }
        return data;
    }
    
    
    public void remove(String table,String row,String col){
    try{
            String query = "Delete FROM "+ table +" WHERE "+col+" = '"+row+"';";
            System.out.println(query);
            st.executeUpdate(query);
            
        }
        catch(Exception ex){
            System.out.println("Error: "+ ex);
        }
    }
}
