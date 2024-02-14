<?php 

class singleton{
    public function __construct(){

    }

    public function __clone(){

    }

    //this function return the single instance of the class 
    final public static function get_instance(){
        static $instance = []; //associative array for storing class name and it's instance
        $class_name = get_called_class(); // return the class name
        if(!isset($instance[$class_name])){
            $instance[$class_name] = new $class_name();
            //if any function want to hook into custom hook at this point
            do_action(sprintf('unisus_theme_singleton_init%s') , $class_name);
        }

        return $instance[$class_name];
    }
}