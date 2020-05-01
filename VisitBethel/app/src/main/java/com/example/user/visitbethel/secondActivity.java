package com.example.user.visitbethel;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;

public class secondActivity extends AppCompatActivity {

    String val = "message to third activity";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);

        Intent intent = getIntent();
        intent.getStringExtra(utility.REQUEST);

    }


    public void continue_visiting_click(View view) {
        Intent intent = new Intent(getApplicationContext(),thirdActivity.class);
        intent.putExtra(utility.REQUEST2,val);
        startActivity(intent);

    }
}

