# Ama Tech Database Setup
# Blueprint for axnet System
# CBT Question App
# Copyright protected 2017

# Database name
create database axnet_db;

# create cbt test 
create table questions(
id int(11) auto_increment key,
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