package com.example.user.visitbethel;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    private TextView welcomeTextView;
    private TextView welcome2TextView;
    private TextView visitButton;
    String value = "visit";

    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        welcomeTextView = findViewById(R.id.welcome_text_view);
        welcome2TextView = findViewById(R.id.welcome2_text_view);
        visitButton = findViewById(R.id.visit_button);
        };


    public void visitButtonClick(View view) {

        Intent intent = new Intent(getApplicationContext(),secondActivity.class);
        intent.putExtra(utility.REQUEST,value);
        startActivity(intent);

    }
}
