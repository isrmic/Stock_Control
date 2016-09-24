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
        $controll->Produts();

        return true;

    });

    Route::Get("adicionar", function(){

        $controll =  new Controll();
        $controll->add();

        return true;

    });

    Route::Post("add_prod", function(){

        $controll =  new Controll();
        $controll->add_prod();

        return true;

    });

    Route::Get("remove/{id}", function($id){

        $controll = new Controll();
        $controll->remove_prod($id);

        return true;
    });

    Route::Get("detail/{id}", function($id){

        $controll = new Controll();
        $controll->details($id);

        return true;

    });

    Route::Get("edit/{id}", function($id){

        $controll = new Controll();
        $controll->edit_prod($id);

        return true;

    });

    Route::Post("updateprod", function(){

        $controll = new Controll();
        $controll->update_prod();

        return true;
    });


    Route::Get("json", function(){

        $controll =  new Controll();
        echo $controll->json();
    });
