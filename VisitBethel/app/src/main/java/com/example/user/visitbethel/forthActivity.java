package com.example.user.visitbethel;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ImageView;
import android.widget.TextView;

public class forthActivity extends AppCompatActivity {

    public ImageView department1ImageView;
    public ImageView department2ImageView;
    public ImageView department3ImageView;

    public TextView department1TextView;
    public TextView department2TextView;
    public TextView department3TextView;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_forth);

        department1ImageView = findViewById(R.id.department1_image_view);
        department2ImageView = findViewById(R.id.department2_image_view);
        department3ImageView = findViewById(R.id.department3_image_view);

        department1TextView = findViewById(R.id.department1_text_view);
        department2TextView = findViewById(R.id.department2_text_view);
        department3TextView = findViewById(R.id.department3_text_view);

//        BlankFragment myFragment = new BlankFragment();
//        View view = myFragment.getView();
//        view.findViewById(R.id.department1_text_view).setText("Child acessed :4");
//        view.findViewById(R.id.department1_image_view).

//        Intent intent = getIntent();
//        String fromthird = intent.getStringExtra(utility.REQUEST3);

        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        TabLayout tabLayout = (TabLayout) findViewById(R.id.tab_layout);
        // Set the text for each tab.

        tabLayout.addTab(tabLayout.newTab().setText("Shipping Dep.t"));
        tabLayout.addTab(tabLayout.newTab().setText("Translation Dep.t"));
        tabLayout.addTab(tabLayout.newTab().setText("Service Dep.t"));
        // Set the tabs to fill the entire layout.
        tabLayout.setTabGravity(TabLayout.GRAVITY_FILL);
        setTitle("DEPARTMENTS");

        // Use PagerAdapter to manage page views in fragments.
        // Each page is represented by its own fragment.
        // This is another example of the adapter pattern.
        final ViewPager viewPager = (ViewPager) findViewById(R.id.pager);
        final PagerAdapter adapter = new PagerAdapter
                (getSupportFragmentManager(), tabLayout.getTabCount());
        viewPager.setAdapter(adapter);
        // Setting a listener for clicks.
        viewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
        tabLayout.addOnTabSelectedListener(new TabLayout.OnTabSelectedListener() {
            @Override
            public void onTabSelected(TabLayout.Tab tab) {
                viewPager.setCurrentItem(tab.getPosition());
            }

            @Override
            public void onTabUnselected(TabLayout.Tab tab) {

            }

            @Override
            public void onTabReselected(TabLayout.Tab tab) {

            }
        });


    }

//    public void onAttach(forthActivity activity) {
//        activity.onAttach(activity);
//        if (activity.getClass() == forthActivity.class) {
//            activity = (forthActivity) activity;
//        }
//    }


    /**
     * Inflates the options menu.
     *
     * @param menu_main Menu to inflate
     * @return Returns true if menu is inflated.
     */
//    Object menu_main;
    @Override
    public boolean onCreateOptionsMenu(Menu menu_main) {
        getMenuInflater().inflate(R.menu.menu_main, menu_main);
        return true;
    }

    /**
     * Handles a click on the Settings item in the options menu.
     *
     * @param item Item in options menu that was clicked.
     * @return Returns true if the item was Settings.
     */
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();
        if (id == R.id.action_settings) {
            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}

