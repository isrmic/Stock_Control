<?php

    use Req\GetRequest as Request;
    use view\MyView as viewer;
    use Controll\AplicationControll as Controll;





    Route::Get("/", function(){

      $request = Request::Get("name");

      echo "<h2> Hello World {$request['name']} <h2>";

    });


    Route::Get("produtos", function(){

        $controll =  new Controll();
        return $controll->Produts();

    });

    Route::Get("adicionar", function(){

        $controll =  new Controll();
        return $controll->add();

    });

    Route::Post("add_prod", function(){

        $controll =  new Controll();
        return $controll->add_prod();

    });

    Route::Get("detail/{id}", function($id){

        $controll = new Controll();
        $controll->details($id);
        
    });


    Route::Get("json", function(){

        $controll =  new Controll();
        echo $controll->json();
    });
