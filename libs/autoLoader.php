<?php

session_start();
require_once "Session.php";
require_once "DataBase.php";
require_once "PasswordHash.php";
require_once "FileUploader.php";

//define default root for website.
define("ROOT","theschool/");


    //run autoloader
    register();

    //register all autoloaders.
    /**
     * function registered spl autoload register.
     */
    function register()
    {
        spl_autoload_register('autoloadClasses');
        spl_autoload_register('autoloadControllers');
        spl_autoload_register('autoloadModels');
    }
    //autoloader for models.
    /**
     * function load classes of model.
     * @param $class
     */
    function autoloadModels($class){
        $file = 'models/' . $class . '.php';
        if (file_exists($file)){
            require_once $file;
        }
    }
    //autoloader for controllers.
    /**
     * function load classes of controller.
     * @param $class
     */
    function autoloadControllers($class){
        $file = 'controllers/' . $class . '.php';
        if (file_exists($file)){
            require_once $file;
        }
    }
    //autoloader for classes.
    /**
     * function load classes of classes.
     * @param $class
     */
    function autoloadClasses($class){
        $file = 'classes/' . $class . '.php';
        if (file_exists($file)){
            require_once $file;
        }
    }


