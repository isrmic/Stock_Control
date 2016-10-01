<?php

namespace Req;

class GetRequest{


     public function __construct(){


     }


      public static function Get(){

            $Request = array();

            if(func_num_args() >= 1){

                $params = count(func_num_args()) > 1 ? func_get_args(): is_array(func_get_arg(0)) ? func_get_arg(0) : func_get_args();
                if(isset($params['not']) && count($params['not']) > 0){
                    foreach($_GET as $key => $value){
                        if(!in_array($key, $params["not"])){
                            $Request[$key] = $_GET[$key];
                        }
                    }
                }
                else {
                    for($i = 0; $i<count($params); $i++){
                        $Request[$params[$i]] = $_GET[$params[$i]]??null;
                    }
                }

            }

            else {
                foreach($_GET as $key => $value){

                    $Request[$key] = $_GET[$key];
                }
            }

            return $Request;
      }

      public static function Post(){


            $Request = array();
            if(func_num_args() >= 1){

                $params = count(func_num_args())  > 1 ? func_get_args(): is_array(func_get_arg(0)) ? func_get_arg(0) : func_get_args();

                if(isset($params['not']) && count($params['not']) > 0){
                    foreach($_POST as $key => $value){
                        if(!in_array($key, $params['not'])){
                            $Request[$key] = $_POST[$key];
                        }
                    }
                }

                else {
                    for($i = 0; $i<count($params); $i++){
                        $Request[$params[$i]] = $_POST[$params[$i]] ?? null;
                    }
                }

            }
            else {
                foreach($_POST as $key => $value){

                    $Request[$key] = $_POST[$key];
                }
            }

            return $Request;
      }

      public static function Donot(){

          $Request = array();
          if(func_num_args()  >= 1){
              $params = func_get_args();

              foreach($_REQUEST as $key => $value){
                  if(!in_array($key, $params)){
                      $Request[$key] = $_REQUEST[$key];
                  }
              }
          }

          return $Request;
      }
}
