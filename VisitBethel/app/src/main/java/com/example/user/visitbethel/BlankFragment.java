package com.example.user.visitbethel;


import android.media.Image;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;


/**
 * A simple {@link Fragment} subclass.
 */
public class BlankFragment extends Fragment {
    public ImageView department1ImageView;
    public ImageView department2ImageView;
    public TextView department1TextView;
    public View view;


    public BlankFragment() {
        // Required empty public constructor

    }

    public static BlankFragment newInstance() {
        return new BlankFragment();
    }


//    public void onResume(){
//        super.onResume();
//        ImageView i = ((forthActivity)getActivity()).department1ImageView;
//    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        // Inflate the layout for this fragment
        view = inflater.inflate(R.layout.fragment_blank,container,false);
        department1ImageView = view.getRootView().findViewById(R.id.department1_image_view);
        department1TextView = view.getRootView().findViewById(R.id.department1_text_view);
//        return view;

       return inflater.inflate(R.layout.fragment_blank, container, false);
    }

public void changeTextOfFragment(String text1){
        department1TextView.setText(text1);
        view.setBackgroundResource(R.color.color1);

}

}
