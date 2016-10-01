create database Stock_control;

use stock_control;

create table produtos(

ID int(11) not null auto_increment primary key,
Name varchar(32) not null ,
Price decimal(9,2) not null,
Description varchar(120),
Count_P int(11),
insertData not null datetime,
dataModified not null datetime

);

create table user_control(

ID int(11) not null auto_increment primary key,

UserName varchar(16) not null,
Password char(32) not null,
UserType int(3)
);
