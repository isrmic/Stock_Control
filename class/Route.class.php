<?php

use Controll\AplicationControll as Controll;
class Route extends Controll{


    public static function acess_methods($param, $param2 = null){


       $url = substr(self::getCurrentUri(), 1);
       $route = explode("/", $url);
       $values = explode("/", $param);

       preg_match_all("/{(.*?)}/" , $param, $matches);

       if(count($matches) >0 && count($values) == count($route)){

           for($i = 0; $i<count($matches[0]); $i++){

               $str[$i] = isset($matches[0][$i]) ? $matches[0][$i] : "??";
               $str2[$i] = isset($matches[1][$i]) ? $matches[1][$i] : "??";

               $index = array_search($matches[0][$i], $values);
               $param = str_replace($str[$i], $route[$index], $param);


               $declarevar = "varsparam[]=" . $route[$index];

               $declarevar = str_replace(" ", "", $declarevar);

               parse_str($declarevar);

           }

       }

       if($url == $param){
          isset($varsparam) ? call_user_func_array($param2, $varsparam) : $param2("");
       }else if("/" . $url == $param){
            isset($varsparam) ? call_user_func_array($param2, $varsparam) : $param2("");
       }


       return true;

   }


    public static function Get($param, $param2 = null){


       if($_SERVER["REQUEST_METHOD"] == "GET"){

          self::acess_methods($param, $param2);
       }


        return true;
}


    public static function Post($param , $param2 = null){

      if($_SERVER["REQUEST_METHOD"] == "POST"){

          self::acess_methods($param, $param2);
      }

       return true;

    }

    public static function GP($param, $param2){

        $server = $_SERVER["REQUEST_METHOD"];

        if($server == "GET" || $server == "POST"){

            self::acess_methods($param, $param2);
        }

        return true;
    }

    public static function redirect($param, $param2, $param3, $param4 = null){

    $url = self::getCurrentUri();
    if($param && $param2 && $url != $param3){
        $param4 == null ? header("location: /stock_control") : header("location: {$param4} ");
    }

    }


    static function getCurrentUri()
    	{
    		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    		$uri = '/' . trim($uri, '/');
    		return $uri;
    	}

}
