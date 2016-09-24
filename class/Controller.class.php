<?php


namespace Controll;
use conexions\mysql\Con\Conexion as DB;
use view\MyView as viewer;
use view\MyView;
use Req\GetRequest as Request;
use PDO;

class AplicationControll extends DB{

    public function add_prod(){

        $Request = Request::Post(["name_prod", "price_prod", "desc_prod", "count_prod"]);

        $save = $this->prepar("INSERT INTO produtos (`Name`, `Preco` ,`Description`, `Count_p`)  values (?,?,?,?) ");
        $save->opt($Request);
        $insert = $save->exec();

        if($insert){
          header("location: produtos?success=true");
        }
        else{
            return "Não Foi Possivel Adicionar O Produto !! ";
        }
    }

    public function remove_prod($id){

      $remove = $this->prepar("DELETE FROM produtos WHERE ID = ?");
      $remove->opt($id, PDO::PARAM_INT);
      if($remove->exec()){
          header("location: /stock_control/produtos");
      }
      else {
          echo "Falha Ao Tentar Remover Produto";
      }
    }

    public function edit_prod($id){

        $select = $this->prepar("SELECT * FROM produtos WHERE ID = ? ");
        $select->opt($id, PDO::PARAM_INT);
        $select->exec();

        return viewer::view("template", "produts.edit_prod", $select->AllObj(), "produto");

    }

    public function update_prod(){

      $Request = Request::Post(["name_prod", "price_prod", "desc_prod", "count_prod", "prod_ID"]);

      $update = $this->prepar("UPDATE produtos SET Name = ?, Preco = ?, Description = ?, Count_p = ? WHERE ID = ?");
      $update->opt($Request);
      $success = $update->exec();

      if($success){
        header("location: produtos");

      }
      else{
          return "Não Foi Possivel Modificar O Produto !! ";
      }

    }

    public function Produts(){

        $select = $this->prepar("SELECT * FROM produtos");
        $select->exec();

        return viewer::view("template", "produts.list", $select->AllObj(), 'produtos');

    }

    public function Add(){
        return viewer::view("template", "produts.add_produts");
    }

    public function json(){

        $select = $this->prepar("SELECT * FROM produtos");
        $select->exec();

        $all = $select->ResultJson();

        return $all;
    }

    public function details($id){


        $prep = $this->prepare("SELECT * FROM produtos where ID = :id ");
        $prep->bindParam(":id", $id, PDO::PARAM_INT);
        $prep->Execute();
        $select = $prep->fetchAll(PDO::FETCH_OBJ);

        return viewer::view("template", "produts.details", $select, "produto");

    }

}
