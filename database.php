<?php
/*
 * Database name: webtech
 * Table users:
 *    Attributes
 *  USERNAME VARCHAR(100) NOT NULL; PRIMARY KEY
 *  FIRSTNAME VARCHAR(100) NOT NULL
 *  LASTNAME VARCHAR(100) NOTNULL
 *  PHONE VARCHAR(10) NOT NULL
 *  PASSWORD CHAR(40) NOT NULL
 *  
 */
$db = mysql_connect('localhost','root','root') or die(mysql_error());
mysql_query("CREATE DATABASE IF NOT EXISTS webtech") or die(mysql_error());
mysql_select_db("webtech", $db) or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS users (USERNAME VARCHAR(100) NOT NULL,FIRSTNAME VARCHAR(100) NOT NULL,LASTNAME VARCHAR(100) NOT NULL,PHONE VARCHAR(10) NOT NULL, PASSWORD CHAR(40) NOT NULL,  primary key(USERNAME))") or die(mysql_error());
mysql_query("create table IF NOT EXISTS userstatus (status varchar(500), username varchar(100),udate datetime,msgid int NOT NULL AUTO_INCREMENT,primary key(msgid));");
mysql_query("create table IF NOT EXISTS comments(messageid int,username varchar(100), comment varchar(100),time datetime);");

?>
