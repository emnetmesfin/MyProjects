package com.example.user.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    private String val = "I am first";
    private Button insertButton;
    private int REQUESTCODE = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


    }

    public void insertButtonClick(View view) {

        Intent intent = new Intent(getApplicationContext(),secondActivity.class);
        intent.putExtra(utility.REQUEST1 , val);
        startActivityForResult(intent,REQUESTCODE);
    }

    public void onActivityResult(int requestcode,int result , Intent data){
        super.onActivityResult(requestcode,result,data);
        if(utility.REPLY1 != null){
            if (result == RESULT_OK){
                String fromSecond = data.getStringExtra(utility.REPLY1);
            }
        }

    }
    public void totalButtonClick(View view) {

//        Intent intent = new Intent();
//        intent.putExtra(utility.REQUEST1 , val);
//        startActivity(intent);
    }
}
