<?php

    use Req\GetRequest as Request;

    Route::GET("viewer/{id}", function($id){
        $myview = new MyView();
        //return $myview->view("new");
        echo "hello to my page " . $id;
    });

   Route::GET("viewer2/{id}/json/{name}", function($id, $name){

        $myview = new MyView();
        //return $myview->view("new");
        echo "CEP =  " . $id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "viacep.com.br/ws/{$id}/json/");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $exec = curl_exec($curl);
        curl_close($curl);
        echo "<pre>" . $exec . "</pre>";
        echo "Acessado Por {$name}";

    });


    Route::Get("/", function(){



      $request = Request::Get("name");

      echo "<h2> Hello World {$request['name']} <h2>";

    });


    Route::Get("search/aplication/{id}/user/{name}", function($id, $name){
        echo "Testando Esta Pagina , busca na aplicação de id {$id} no usuário de nome {$name}";
    });




    Route::Get("link/otherlink/{id}/{option}/{name}", function($id, $option, $name){
        echo "Acessou Esta Página A Procura Do id {$id}, nome {$name}, para fazer {$option}";
    });
