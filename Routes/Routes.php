<?php



    use Req\GetRequest as Request;
    use view\MyView as viewer;
    use Controll\AplicationControll as Controll;

    Route::Get("/", function(){

      $controll = new Controll();
      $controll->home_page();


    });

    //IF Session Login Not Isset , Redirect To Page Login;
    Route::redirect(true, (!isset($_SESSION["login"])), "/");


    Route::Get("produtos", function(){

        $controll =  new Controll();
        $controll->Produts();

    });

    Route::Get("adicionar", function(){

        $controll =  new Controll();
        $controll->add();

    });

    Route::Post("add_prod", function(){

        $controll =  new Controll();
        $controll->add_prod();

    });

    Route::Get("remove/{id}", function($id){

        $controll = new Controll();
        $controll->remove_prod($id);

    });

    Route::Get("detail/{id}", function($id){

        $controll = new Controll();
        $controll->details($id);

    });

    Route::Get("edit/{id}", function($id){

        $controll = new Controll();
        $controll->edit_prod($id);

    });

    Route::Post("updateprod", function(){

        $controll = new Controll();
        $controll->update_prod();


    });

    Route::Get("json", function(){

        $controll = new Controll();
        $controll->json();
    });


	Route::Get("json/{id}", function($id){

		$controll = new Controll($id);
		$controll->json($id);


	});

	Route::Get("404", function($id){

		$controll = new Controll($id);
		$controll->NotFound_404();

	});


    Route::Get("/logout", function($normal){

        session_destroy();
        header("location: /stock_control");
    });

    Route::verify_uri(true);
