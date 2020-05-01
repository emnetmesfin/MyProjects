package com.example.user.myapplication;

import android.content.Intent;
import android.database.Cursor;
import android.os.Build;
import android.support.annotation.RequiresApi;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

public class listActivity extends AppCompatActivity {

    TextView listText;
    MyDBHandler myDb;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);
        setTitle("Reports");

        myDb = new MyDBHandler(getApplicationContext(),null,null,1);
        listText = (TextView) findViewById(R.id.list_view);
        viewAll();

    }

    public void viewAll(){
        Cursor res=myDb.getAllData();
        if(res.getCount()==0){
            showMessage("Error","No flight registered");
            return;
        }

        Log.d("asdlkfj",res.getString(0));
        StringBuffer buffer=new StringBuffer();
        while(res.moveToNext()){

            buffer.append("Course Name:" +res.getString(0) +"\n");
            buffer.append("Count:" +res.getString(5) + "\n");

            buffer.append("Course Name:" +res.getString(1) +"\n");
            buffer.append("Count:" +res.getString(6) + "\n");

            buffer.append("Course Name:" +res.getString(2) +"\n");
            buffer.append("Count:" +res.getString(7) + "\n");

            buffer.append("Course Name:" +res.getString(3) +"\n");
            buffer.append("Count:" +res.getString(8) + "\n");

            buffer.append("Course Name:" +res.getString(4) +"\n");
            buffer.append("Count:" +res.getString(9) + "\n\n\n    ");

        }
        showMessage("Report" , buffer.toString());
    }
    public void showMessage(String title,String Message){
        listText.setText(title);
        listText.setText(Message);


    }}

