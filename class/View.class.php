<?php


namespace view;

Class MyView{

   protected $vars = array();

    public static function view($param, $param2, $param3 = null, $param4 = null){

        $file_include = str_replace(".", "/", $param2);

        func_num_args() >3 ? eval(' $' .$param4. ' = $param3;') : null;

        $road = "view/{$param}.php";

        if(file_exists($road)){

            include_once $road;

            return true;
        }
        return false;
    }

}
