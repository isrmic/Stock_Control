<?php


namespace Controll;
#use conexions\mysql\Con\Conexion as DB;
use view\MyView as viewer;
use Req\GetRequest as Request;
#use PDO;
use Model\Produts\ModelProduts as ModelP;

class AplicationControll extends ModelP{


    public function home_page(){

        if(!isset($_SESSION["login"])){

            return viewer::view("auth.auth", "default");
        }
        else {
            header("location: produtos?page=1");
        }
    }

    public function add_prod(){

        $Request = Request::Post(["name_prod", "price_prod", "desc_prod", "count_prod", "provider"]);
        var_dump($Request);
        $key = Request::Post("key");
        if($key["key"] == "55FAF772A5E8ED8E5CC729CD37606403"){
            $insert = parent::addnewProd($Request);

            if($insert){
              header("location: produtos?page=1");
            }

            else{
                return "Não Foi Possivel Adicionar O Produto !! ";
            }

        }else{
            header("location: /stock_control/");

        }
    }

    public function remove_prod($id){

      $remove = parent::removeProd($id);

      if($remove){
          header("location: /stock_control/produtos");
      }
      else {
          echo "Falha Ao Tentar Remover Produto";
      }

    }

    public function edit_prod($id){

        $select = parent::editProd($id);
        return viewer::view("produts.edit_prod", "template", $select, "produto");

    }

    public function update_prod(){


      $Request = Request::Post(["name_prod", "price_prod", "desc_prod", "Count_Prod", "prod_ID"]);

      $key = Request::Post("key");
      if($key["key"] == "55FAF772A5E8ED8E5CC729CD37606403"){

      $update = parent::updateProd($Request);

      if($update){
        header("location: produtos?page=1");

      }

      else{
          return "Não Foi Possivel Modificar O Produto !! ";
      }
    }

    else{
      header("location: /stock_control/");
    }

    }

    public function Produts(){

        $opt = Request::Get("prod", "page");
        $prod_per_page = 5;
        $page = !empty($opt["page"]) ? $opt["page"] : 1;
        $limit[0] = $prod_per_page * $page;
        $limit[1] = $limit[0] - $prod_per_page;
        $limit = [$limit[1], $limit[0]];

        $obj = parent::viewProd($opt, $limit, $prod_per_page);

        return viewer::view("produts.list", "template", $obj, 'produtos');

    }

    public function Add(){

        $providers = parent::providers();
        return viewer::view("produts.add_produts", "template", $providers, "providers");
    }

    public function Add_prov(){

      $Request = Request::Post(["name_prov", "company_prov", "office_prov", "location_prov", "city_prov", "region_prov", "cep_prov", "country_prov", "phone_prov"]);
      $key = Request::Post("key");
      if($key["key"] == "55FAF772A5E8ED8E5CC729CD37606403"){
          $insert = parent::addnewProv($Request);

          if($insert){
            header("location: produtos?page=1");
          }

          else{
              return "Não Foi Possivel Adicionar O Fornecedor !! ";
          }

      }else{
          header("location: /stock_control/");

      }

    }

    public function json($id = null, $key = null){

		$query = $id == null ? "SELECT * FROM produtos" : "SELECT * FROM produtos WHERE ID = ?";
		$select = parent::prepar($query);
		$id != null ? $select->opt($id) : null;
        $select->exec();

        $json = $select->ResultJson();
        echo $json;

    }


    public function details($id){

        $select = parent::detailsProd($id);
        return viewer::view("produts.details", "template", $select, "produto");

    }


	public function NotFound_404(){
        return viewer::view("error.404");

    }

}
