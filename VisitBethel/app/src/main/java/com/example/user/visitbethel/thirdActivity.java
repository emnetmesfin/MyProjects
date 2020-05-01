package com.example.user.visitbethel;

import android.app.FragmentManager;
import android.app.FragmentTransaction;
import android.content.Intent;
import android.media.Image;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import org.w3c.dom.Text;

import static com.example.user.visitbethel.R.id.bethel_home_image_view;
//import static com.example.user.visitbethel.R.id.department_image_view;
import static com.example.user.visitbethel.R.id.department_image_view;
import static com.example.user.visitbethel.R.id.spritual_image_view;

public class thirdActivity extends AppCompatActivity {

    private ImageView departmentImageView;
    private ImageView bethelHomeImageView;
    private ImageView spritualImageView;
    BlankFragment blankFragment;



    private String ref;
    private int requestCode = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_third);

        Intent intent = getIntent();
        intent.getStringExtra(utility.REQUEST2);

        departmentImageView = findViewById(department_image_view);
        bethelHomeImageView = findViewById(R.id.bethel_home_image_view);
        spritualImageView = findViewById(R.id.spritual_image_view);

    }

    public void on_department_click(View view) {
        Intent intent = new Intent(getApplicationContext() , forthActivity.class);
        intent.putExtra(utility.REQUEST3 , ref);
        startActivity(intent);
    }

    public void on_bethel_home_click(View view) {
        Intent intent = new Intent(getApplicationContext() , fifthActivity.class);
        intent.putExtra(utility.REQUEST3 , ref);
        startActivity(intent);
    }

    public void on_spritual_programs_click(View view) {
        Intent intent = new Intent(getApplicationContext() , sixActivity.class);
        intent.putExtra(utility.REQUEST3 , ref);
        startActivity(intent);
    }
}



