<?php


namespace view;
use Req\GetRequest as Request;
Class MyView extends Request{

   protected $vars = array();

    public static function view($param, $param2 = "default", $param3 = null, $param4 = null){

        $file_include = str_replace(".", "/", $param);

        func_num_args() >3 ? eval(' $' .$param4. ' = $param3;') : null;

        $road = "view/{$param2}.php";

        if(file_exists($road)){

            include_once $road;

            return true;
        }

        return false;
    }

}
