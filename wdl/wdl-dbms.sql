CREATE DATABASE dbms;

USE  dbms;

CREATE TABLE user_details (
  user_id int(11)  auto_increment primary key,
  name varchar(20) NOT NULL,
  email varchar(40) NOT NULL,
  password varchar(20) NOT NULL
);

select * from user_details  ;

CREATE TABLE newsletter (
  id int(11)  auto_increment primary key,
  email varchar(40) NOT NULL
);

select * from newsletter;


CREATE TABLE user_orders (
  user_id int(11)  NOT NULL,
  product_name varchar(100) NOT NULL,
  product_price int(10) NOT NULL,
  product_quantity int(10)
);

select * from user_orders;

CREATE TABLE contact (
  id int  auto_increment primary key,
  name varchar(100) NOT NULL,
  email varchar(40) NOT NULL,
  subject varchar(30) NOT NULL,
  message text NOT NULL
);

select * from contact;



CREATE TABLE  website_items (
id int(10), 
name varchar(20),
description varchar(30), 
price int(10),
img varchar(100)
 ) ;
 
select * from website_items;

INSERT INTO website_items (id, name, description , price, img) VALUES
(1, 'Folding keyboard', 'solid gamingperformance, ', 1000,'img\\folding keyboard.jpg' ),
(2, 'Dell mouse', 'speed response premium look', 466,'img\\dell mouse.jpeg'),
(3, 'Ultrasonic sensor', 'capacity of 500cm', 505,' img\\ultrasonic sensor.jpg' ),
(4, 'Arduino uno', 'best price fast spped', 605, 'img\\arduino uno.jpg '),
(5, 'Blutooth headphones', 'premium sound quality', 1400,'img\\blutooth headphone.jpg '),
(6, 'Lighting mouse', 'best for gamming experience', 1200, 'img\\lighting mouse.jpg' ),
(7, 'Airpods', 'premium sound quality', 999,'img\\air pods.jpg' ),
(8, 'Lighting keyboard', 'best for gamming experiences', 2000,'img\\lighting keyboard.jpg' ),
(9, 'HDMI connector', 'best quality 2 yrs warrenty', 520, 'img\\hdmi connector.jpg' );






