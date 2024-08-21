<?php

$con=mysqli_connect("localhost","root","","dbw");
if(!$con){
die("Connection not Successfull!");
}
print "Connection Created Succesfully! <br>";

$s="create table student(
    user_id varchar(30) primary key , 
    name varchar(30),
    pass varchar(30),
    phone_no integer,
    dob date,
    gender varchar(15),
    city varchar(30)
    )";
    
    if(mysqli_query($con,$s)){
    print "Table student Created";}
    else{
    print "Error in creating student table.";}


$t="create table teacher(
    tuser_id varchar(30) primary key , 
    tname varchar(30),
    tpass varchar(30),
    tphone_no integer,
    tdob date,
    tgender varchar(15),
    tcity varchar(30),
    qual varchar(50),
    pay varchar(30),
    pay_no varchar(30)
    )";


    if(mysqli_query($con,$t)){
        print "<br>Table teacher Created<br>";}
        else{
        print "<br>Error in creating teacher table.<br>";}
    

 $c="create table courses(
     s_no integer primary key auto_increment, 
     c_id integer ,
     c_name varchar(30), 
     s_name varchar(30), 
     t_name varchar(30), 
     foreign key (s_name ) references student (user_id), 
     foreign key (t_name) references teacher (tuser_id)
    )";   
    
    
    if(mysqli_query($con,$c)){
        print "<br>Table courses Created<br>";}
        else{
        print "<br>Error in creating courses table.<br>";}

$cat="create table catalogue(
    c_id integer primary key,
    c_name varchar(30)
   )";   
   
   if(mysqli_query($con,$cat)){
       print "<br>Table catalogue Created<br>";}
       else{
       print "<br>Error in creating catalogue table.<br>";}

        mysqli_close($con);
?>