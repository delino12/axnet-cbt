# Ama Tech Database Setup
# Blueprint for axnet System
# CBT Question App
# Copyright protected 2017

# Database name
create database axnet_db;

# create admin login table 
create table admin(
id int(11) auto_increment key,
username varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null,
phone varchar(255) not null,
date varchar(255) not null
);

# basic information
create table profile(
id int(11) auto_increment key,
user_id varchar(255) not null,
fname varchar(255) not null,
lname varchar(255) not null,
sname varchar(255) not null,
school varchar(255) not null,
address varchar(255) not null,
location varchar(255) not null,
state varchar(255) not null,
date varchar(255) not null
);

# create cbt test 
create table questions(
id int(11) auto_increment key,
user_id varchar(255) not null,
subject varchar(255) not null,
question text not null,
question_image varchar(255) not null,
opt_a varchar(255) not null,
opt_b varchar(255) not null,
opt_c varchar(255) not null,
opt_d varchar(255) not null,
opt_e varchar(255) not null,
answers text not null,
point varchar(255) not null,
date varchar(255) not null
);

# create list questions 
create table lists(
id int(11) auto_increment key,
user_id varchar(255) not null,
subject varchar(255) not null,
question_id varchar(255) not null, 
date varchar(255) not null
);

# create account system
create table account(
id int(11) auto_increment key,
user_id varchar(255) not null,
owner_id varchar(255) not null,
credits varchar(255) not null,
date varchar(255) not null
);


# transactions 
create table transaction(
id int(11) auto_increment key,
user_id varchar(255) not null,
ref_id varchar(255) not null,
owner_id varchar(255) not null,
details varchar(255) not null,
date varchar(255) not null
);

# create exams question
create table exams(
id int(11) auto_increment key,
exam_by varchar(255) not null,
username varchar(255) not null,
password varchar(255) not null,
f_name varchar(255) not null,
l_name varchar(255) not null,
s_name varchar(255) not null,
email varchar(255) not null,
phone varchar(255) not null,
link varchar(255) not null,
score varchar(255) not null,
start_time varchar(255) not null,
stop_time varchar(255) not null,
date varchar(255) not null
);


# flush all 
delete from admin;
delete from account;
delete from transaction;
delete from lists;
delete from questions;
delete from exams;

select * from admin;
select * from account;
select * from transaction;
select * from lists;
select * from questions;
select * from exams;


# flush all 
drop table admin;
drop table account;
drop table transaction;
drop table lists;
drop table questions;

# flush all 
desc admin;
desc account;
desc transaction;
desc lists;
desc questions;