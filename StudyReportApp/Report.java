package com.example.user.myapplication;

/**
 * Created by user on 5/27/2018.
 */


public class Report {

    private int _id;
    private String _courseName;
    private int _count;

    public Report(){
    }

    public Report(String courseName){
        this._courseName = courseName;

    }

    public Report(int count){
        this._count = count;
    }

    public String getCourseName(){

        return _courseName;
    }

    public int getCount(){
        return _count;
    }

    public int getId(){
        return _id;
    }

    public void setCourseName(){
        this._courseName = _courseName;
    }

    public void setCount(){
        this._count = _count;
    }
    public void setId(){
        this._id = _id;
    }




}
