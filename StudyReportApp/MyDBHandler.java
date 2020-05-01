package com.example.user.myapplication;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;
import android.widget.Toast;

/**
 * Created by user on 5/27/2018.
 */

    public class MyDBHandler extends SQLiteOpenHelper {

        private static final int DATABASE_VERSION = 1;
        private static final String DATABASE_NAME = "products.db";
        public static final String TABLE_REPORT = "Reports";
//        public static final String COLUMN_ID = "_id";
        public static final String COLUMN_COURSE_NAME1 = "coursename1";
    public static final String COLUMN_COURSE_NAME2 = "coursename2";
    public static final String COLUMN_COURSE_NAME3 = "coursename3";
    public static final String COLUMN_COURSE_NAME4 = "coursename4";
    public static final String COLUMN_COURSE_NAME5 = "coursename5";

    public static final String COLUMN_COUNT1 = "count1";
    public static final String COLUMN_COUNT2 = "count2";
    public static final String COLUMN_COUNT3= "count3";
    public static final String COLUMN_COUNT4 = "count4";
    public static final String COLUMN_COUNT5 = "count5";


        public MyDBHandler(Context context, String name, SQLiteDatabase.CursorFactory factory, int version) {
            super(context, DATABASE_NAME, factory, DATABASE_VERSION);
        }

        @Override
        public void onCreate(SQLiteDatabase db) {
            String query = "CREATE TABLE "+TABLE_REPORT + "("+
//                    COLUMN_ID + " INTEGER PRIMARY KEY AUTOINCREMENT, "+
                    COLUMN_COURSE_NAME1 + " TEXT ," +
                    COLUMN_COURSE_NAME2 + " TEXT ," +
                    COLUMN_COURSE_NAME3 + " TEXT ," +
                    COLUMN_COURSE_NAME4 + " TEXT ," +
                    COLUMN_COURSE_NAME5 + " TEXT ," +
                    COLUMN_COUNT1 + " INTEGER," +
                    COLUMN_COUNT2 + " INTEGER," +
                    COLUMN_COUNT3 + " INTEGER," +
                    COLUMN_COUNT4 + " INTEGER," +
                    COLUMN_COUNT5 + " INTEGER" +
                    ");";
            db.execSQL(query);


        }

        @Override
        public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
            db.execSQL("DROP TABLE IF EXISTS " + TABLE_REPORT);
            onCreate(db);
        }

    public Boolean insertData(String courseName1 ,String courseName2,String courseName3,
                             String courseName4,String courseName5,int count1,int count2,
                             int count3,int count4,int count5){
        ContentValues values = new ContentValues();
        values.put(COLUMN_COURSE_NAME1, courseName1);
        values.put(COLUMN_COURSE_NAME2, courseName2);
        values.put(COLUMN_COURSE_NAME3, courseName3);
        values.put(COLUMN_COURSE_NAME4, courseName4);
        values.put(COLUMN_COURSE_NAME5, courseName5);
        values.put(COLUMN_COUNT1 , count1);
        values.put(COLUMN_COUNT2 , count2);
        values.put(COLUMN_COUNT3 , count3);
        values.put(COLUMN_COUNT4 , count4);
        values.put(COLUMN_COUNT5 , count5);
        SQLiteDatabase db = getWritableDatabase();
        long result = db.insert(TABLE_REPORT,null,values);

        if(result ==-1)
            return false;
        else
            return true;
//        db.close();
    }

//    public void deleteReport(String courseName){
//        SQLiteDatabase db = getWritableDatabase();
//        db.execSQL("DELETE FROM "+TABLE_REPORT+" WHERE "+COLUMN_COURSE_NAME+ " =\""+courseName+"\";");
//    }

    public boolean inDatabase(Report report){
        String query = "SELECT * FROM "+TABLE_REPORT+" WHERE recipename='"+report.getCourseName()+"'";
        String query2 = "SELECT * FROM "+TABLE_REPORT+" WHERE recipename='"+report.getCourseName()+"'";
        SQLiteDatabase db = getWritableDatabase();
        Cursor c = db.rawQuery(query, null);
        c.moveToFirst();
        while(!c.isAfterLast()){
            Log.d("db_to_str",c.toString());
            if(c.getString(c.getColumnIndex("coursename")) != null) {
                return true;
            }
            c.moveToNext();
        }
        db.close();
        return false;
    }

    public boolean inDatabaseCount(Report report){
        String query = "SELECT * FROM "+TABLE_REPORT+" WHERE count='"+report.getCount()+"'";
        SQLiteDatabase db = getWritableDatabase();
        Cursor c = db.rawQuery(query, null);
        c.moveToFirst();
        while(!c.isAfterLast()){
            Log.d("db_to_str",c.toString());
            if(c.getString(c.getColumnIndex("count")) != null) {
                return true;
            }
            c.moveToNext();
        }
        db.close();
        return false;
    }

    public String databaseToString(){
        String dbString = "";
        SQLiteDatabase db = getWritableDatabase();
        String query = "SELECT * FROM "+TABLE_REPORT+" WHERE 1";
        Log.d("query_str", query);
        Cursor c = db.rawQuery(query, null);
        c.moveToFirst();
        while(!c.isAfterLast()){
            Log.d("db_to_str",c.toString());
            if(c.getString(c.getColumnIndex("coursename")) != null) {
                dbString += c.getString(c.getColumnIndex("coursename"));
                dbString += "\n";
            }
            c.moveToNext();
        }
        db.close();
        return dbString;
    }

    public String[] getAllReports(){
        SQLiteDatabase db = getWritableDatabase();
        String query = "SELECT * FROM "+TABLE_REPORT+" WHERE 1";
        Log.d("query_str", query);
        Cursor c = db.rawQuery(query, null);
        String[] dbString = new String[c.getCount()];
        c.moveToFirst();
        int count = 0;
        while(!c.isAfterLast()){
            Log.d("db_to_str",c.toString());
            if(c.getString(c.getColumnIndex("coursename")) != null) {
                dbString[count] = c.getString(c.getColumnIndex("coursename"));
                count++;
            }
            c.moveToNext();
        }
        db.close();
        return dbString;
    }

    public Cursor getAllData(){
        SQLiteDatabase sqLiteDatabase=getWritableDatabase();
        Cursor res = sqLiteDatabase.rawQuery("select * from " + TABLE_REPORT +" where 1",null);
        res.moveToFirst();
        return res;
    }
}
