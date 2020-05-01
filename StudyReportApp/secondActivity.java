package com.example.user.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class secondActivity extends AppCompatActivity {
    MyDBHandler myDb;

    private EditText editText1;
    private EditText editText2;
    private EditText editText3;
    private EditText editText4;
    private EditText editText5;

    private int REQUESTCODE = 1;
    private String ref = "I am second";

    private TextView textView1;
    private TextView textView2;
    private TextView textView3;
    private TextView textView4;
    private TextView textView5;

    private Button additionButton1;
    private Button additionButton2;
    private Button additionButton3;
    private Button additionButton4;
    private Button additionButton5;

    private Button minusButton1;
    private Button minusButton2;
    private Button minusButton3;
    private Button minusButton4;
    private Button minusButton5;

    private Button saveButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);
        myDb = new MyDBHandler(getApplicationContext(),null,null,1);
//        Toast.makeText(secondActivity.this,"Database created" ,Toast.LENGTH_LONG ).show();
//        TextView textV = new TextView(this);
//        textV.setWidth(ActionBar.LayoutParams.MATCH_PARENT);
//        textV.setHeight(ActionBar.LayoutParams.WRAP_CONTENT);
//        textV.setMinLines(3);
//        textV.setText(R.string.text);

        editText1 = findViewById(R.id.edit_text1);
        editText2 = findViewById(R.id.edit_text2);
        editText3 = findViewById(R.id.edit_text3);
        editText4 = findViewById(R.id.edit_text4);
        editText5 = findViewById(R.id.edit_text5);


        textView1 = findViewById(R.id.text_view1);
        textView2 = findViewById(R.id.text_view2);
        textView3 = findViewById(R.id.text_view3);
        textView4 = findViewById(R.id.text_view4);
        textView5 = findViewById(R.id.text_view5);

        additionButton1 = findViewById(R.id.addition_button1);
        additionButton2 = findViewById(R.id.addition_button2);
        additionButton3 = findViewById(R.id.addition_button3);
        additionButton4 = findViewById(R.id.addition_button4);
        additionButton5 = findViewById(R.id.addition_button5);

        minusButton1 = findViewById(R.id.minus_button1);
        minusButton2 = findViewById(R.id.minus_button2);
        minusButton3 = findViewById(R.id.minus_button3);
        minusButton4 = findViewById(R.id.minus_button4);
        minusButton5 = findViewById(R.id.minus_button5);

        saveButton = findViewById(R.id.save_button);
        AddData();

    }

    int count = 0;
    int two= 0;
    int three= 0;
    int four = 0;
    int five= 0;

    public void ButtonClick(View view) {

//         count+=1;
//         textView1.setText(count +"");

        switch (view.getId()) {

            case R.id.addition_button1:
                count++;
                textView1.setText(count + "");
                break;
            case R.id.addition_button2:
                two+= 1;
                textView2.setText(two + "");
                break;
            case R.id.addition_button3:
                three += 1;
                textView3.setText(three+ "");
                break;
            case R.id.addition_button4:
                four += 1;
                textView4.setText(four + "");
                break;
            case R.id.addition_button5:
                five += 1;
                textView5.setText(five + "");
                break;

            case R.id.minus_button1:
                count -= 1;
                textView1.setText(count + "");
                break;
            case R.id.minus_button2:
                two -= 1;
                textView2.setText(two + "");
                break;
            case R.id.minus_button3:
                three -= 1;
                textView3.setText(three+ "");
                break;
            case R.id.minus_button4:
                four -= 1;
                textView4.setText(four + "");
                break;
            case R.id.minus_button5:
                five -= 1;
                textView5.setText(five + "");
                break;
        }

    }

    public void AddData(){

        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                boolean isInserted = myDb.insertData(
                        editText1.getText().toString(),
                        editText2.getText().toString(),
                        editText3.getText().toString(),
                        editText4.getText().toString(),
                        editText5.getText().toString(),
                        Integer.parseInt(textView1.getText().toString()),
                        Integer.parseInt(textView2.getText().toString()),
                        Integer.parseInt(textView3.getText().toString()),
                        Integer.parseInt(textView4.getText().toString()),
                        Integer.parseInt(textView5.getText().toString()));
                if(isInserted = true)
                    Toast.makeText(secondActivity.this,"Report is saved" ,Toast.LENGTH_LONG ).show();

                else
                    Toast.makeText(secondActivity.this,"Report not saved" ,Toast.LENGTH_LONG ).show();

                Intent intent = new Intent(getApplicationContext(), listActivity.class);
                intent.putExtra("com" , "hi");
                startActivity(intent);

            }
        });
    }}


