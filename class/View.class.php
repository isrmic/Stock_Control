<?php


namespace view;

Class MyView{

    public static function view($param, $param2){

        $file_include = str_replace(".", "/", $param2);

        $produtos =  func_num_args() > 2  ? func_get_arg(2) : null;

        $road = "view/{$param}.php";

        if(file_exists($road)){

            include_once $road;

            return true;
        }
        return false;
    }
}
