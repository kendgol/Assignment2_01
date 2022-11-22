<?php

//Databasse Constants
const DB_USER = 'root';
const DB_NAME = 'mooc';
const DB_HOST = 'localhost';
const DB_PASSWORD = '';


//Directories
// const ROOT_DIR = 'C:\xampp\htdocs\assignment2_01';
// const TEMPLATE_DIR = ROOT_DIR . '/templates';
if(!defined('CLASS_DIR'))
{
    define("ROOT_DIR", 'C:\xampp\htdocs\assignment2_01');
    define("CLASS_DIR", ROOT_DIR . "\classes");
    define("CONTROLLER_DIR", ROOT_DIR . '\controllers');
    define('TEMPLATE_DIR', ROOT_DIR . '\templates');
    define('MODEL_DIR', ROOT_DIR . '\models');
} 
