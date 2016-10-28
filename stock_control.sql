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

INSERT INTO user_control (`UserName`, `Password`, `UserType`) values ("admincontrol", "E10ADC3949BA59ABBE56E057F20F883E", 1)

/*UPDATE #1*/
use stock_control;

create table Providers(
ID int(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
Name NVARCHAR(50) NOT NULL,
company NVARCHAR(50) NOT NULL,
Office NVARCHAR(50) NOT NULL,
Location NVARCHAR(50) NOT NULL,
City NVARCHAR(50) NOT NULL,
Region NVARCHAR(50) NOT NULL,
CEP nvarchar(9) NOT NULL,
Country NVARCHAR(50) NOT NULL,
Phone NVARCHAR(18) NOT NULL,
Email NVARCHAR(50) NOT NULL

);

/*UPDATE #2*/

use stock_control;

alter table produtos

add ProviderID int(8),
add Code_produt nvarchar(16),
add Min_Count int(11)
