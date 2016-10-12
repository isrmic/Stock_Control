<?php


namespace Model\Produts;
use conexions\mysql\Con\Conexion as DB;
use PDO;
use stdCLass;

class ModelProduts extends DB{

    public function addnewProd($values){

        $query = $this->ReturnQueryString("Insert", "produto", $values);
        $add = parent::prepar($query);

        $this->TypeBD == "mysql" ? $add->opt($values) : null;
        return $add->exec();
    }

    public function viewProd($opt, $limit, $ppp){

        if(!empty($opt["prod"]))
        {
            $value = "%{$opt["prod"]}%";
            $query = $this->ReturnQueryString("Select", "WhereName", $value);
        }
        else
        {
            $query = $this->ReturnQueryString("Select", "pagination", $limit);

        }

        $select = parent::prepar($query);

        //query to select all data in table produtos
        $rowquery = "SELECT COUNT(*) FROM produtos";
        $rows = parent::prepare($rowquery);
        $rows->Execute();

        //select rows to pagination
        $rows = $rows->fetchColumn();


        if($this->TypeBD == "mysql"){
            !empty($opt["prod"])? $select->opt($value) : $select->opt($limit, PDO::PARAM_INT);
        }
        //Execution of query
        $select->exec();

        //Return All results of execution query in form object
        $obj = $select->AllObj();

        //add rows pagination in results query
        if(!empty($obj))
            $obj[0]->rows = (int)($rows / $ppp + ($rows % $ppp > 0 ? 1 : 0) );

        //return obj with rows with data querys
        return $obj;

    }


    public function removeProd($id){

        $remove = parent::prepar("DELETE FROM produtos WHERE ID = ?");
        $remove->opt($id, PDO::PARAM_INT);
        return $remove->exec();
    }

    public function editProd($id){

        $obj = $this->get_prod_prov($id);
        return $obj;
    }

    public function updateProd($values){

        $queryupdate = $this->ReturnQueryString("Update", $values);
        $update = parent::prepar($queryupdate);
        $this->TypeBD == "mysql" ? $update->opt($values) : $update->opt($values["prod_ID"]);
        return $update->exec();

    }

    public function detailsProd($id){


      $obj = $this->get_prod_prov($id);
      #return $prep->fetchAll(PDO::FETCH_OBJ);
      return $obj;
    }

    public function providers(){

        $query = "SELECT ID, Company FROM providers";
        $select = parent::prepar($query);
        $select->exec();
        $result = $select->AllObj();

        return $result;
    }

    public function addnewProv($values){

        $query = $this->ReturnQueryString("Insert", "fornecedor", $values);
        $addnewprov = parent::prepar($query);
        $this->TypeBD == "mysql" ? $addnewprov->opt($values) : null;

        return $addnewprov->exec();
    }

    public function get_prod_prov($id){

        $resultobj = [];
        $resultobj[0] = new stdClass();
        $resultobj[0]->prov = [];

        $DB = new DB();
        $queryprod  = "SELECT * FROM produtos WHERE ID = ?";
        $queryprov  = "SELECT ID, Name, Company FROM Providers";

        $selectprod =  parent::prepar($queryprod);
        $selectprov =  $DB->prepar($queryprov);

        $selectprod->opt($id, PDO::PARAM_INT);
        $selectprod->exec();
        $selectprov->exec();

        $count = 0;

        foreach($selectprov->AllObj() as $sprov):
            $resultobj[0]->prov[$count]["ID"] = $sprov->ID;
            $resultobj[0]->prov[$count]["Name"] = $sprov->Name;
            $resultobj[0]->prov[$count]["Company"] = $sprov->Company;
            $count++;
        endforeach;

        $count = 0;
        foreach($selectprod->AllObj() as $sprod):
          $resultobj[$count]->ID = $sprod->ID;
          $resultobj[$count]->Name = $sprod->Name;
          $resultobj[$count]->Price = $sprod->Price;
          $resultobj[$count]->Description = $sprod->Description;
          $resultobj[$count]->Count_P = $sprod->Count_P;
          $resultobj[$count]->insertData = $sprod->insertData;
          $resultobj[$count]->dataModified = $sprod->dataModified;
          $resultobj[$count]->ProviderID = $sprod->ProviderID;
          $resultobj[$count]->Code_Produt = $sprod->Code_Produt;
          $count++;
        endforeach;


        return $resultobj;
    }

    private function ReturnQueryString($param, $param2 = null, $param3 = null){

        $query = null;
        $TypeBD = $this->TypeBD;


        switch($TypeBD){

            case "mysql":

                switch($param){

                  case "Select":

                      if($param2 == "pagination")
                          $query = "SELECT * FROM produtos LIMIT ? , ? ";
                      else if($param2 == "WhereName")
                          $query = "SELECT * FROM produtos WHERE Name LIKE ?";

                  break;

                  case "Insert":

                      if($param2 == "produto"){
                          $query = "INSERT INTO produtos (`Name`, `Price` ,`Description`, `Count_P`, `insertData`, `dataModified`, `ProviderID`, `Code_Produt`)  values (?,?,?,?, NOW(), NOW(), ?, ?) ";
                      }

                      else if($param2 == "fornecedor"){
                          $query = "INSERT INTO Providers (Name, Company ,Office, Location, City, Region, CEP, Country, Phone, Email)  values (?,?,?,?,?,?,?,?,?,?)";
                      }

                  break;

                  case "Rows":
                      $query = "SELECT COUNT(*) FROM produtos";
                  break;

                  case "Update":
                      $query = "UPDATE produtos SET Name = ?, Price = ?, Description = ?, Count_P = ?, dataModified = NOW(), ProviderID = ?, Code_Produt = ? WHERE ID = ?";
                  break;

                }

            break;


            case "odbc":

                switch($param){

                    case "Select":

                      if($param2 == "pagination"){

                          $query = "SELECT * FROM produtos ORDER BY ID OFFSET {$param3[0]} ROWS FETCH NEXT {$param3[1]} ROWS ONLY";
                      }
                      else if($param2 == "WhereName"){

                          $query = "SELECT * FROM produtos WHERE NAME LIKE '%{$param3}%' ";
                      }

                    break;

                    case "Insert":

                        if($param2 == "produto"){

                            $query = "INSERT INTO produtos (Name, Price ,Description, Count_P, insertData, dataModified, ProviderID, Code_Produt)  values ('{$param3["name_prod"]}', {$param3["price_prod"]},'{$param3["desc_prod"]}', {$param3["count_prod"]}, getdate(), getdate(), {$param3["provider"]}, '{$param3["code_prod"]}')";
                        }
                        else if($param2 == "fornecedor"){
                            $query = "INSERT INTO Providers (Name, Company ,Office, Location, City, Region, CEP, Country, Phone, Email)  values ('{$param3["name_prov"]}', '{$param3["company_prov"]}','{$param3["office_prov"]}', '{$param3["location_prov"]}', '{$param3["city_prov"]}', '{$param3["region_prov"]}', '{$param3["cep_prov"]}', '{$param3["country_prov"]}', '{$param3["phone_prov"]}', '{$param3["email_prov"]}')";
                        }

                    break;

                    case "Rows":
                        $query = "SELECT COUNT(*) FROM produtos";
                    break;

                    case "Update":
                        $query = "UPDATE produtos SET Name = '{$param2['name_prod']}', Price = {$param2['price_prod']}, Description = '{$param2['desc_prod']}', Count_P = {$param2['Count_Prod']}, dataModified = getdate(), ProviderID = {$param2['provider']}, Code_Produt = '{$param2['code_prod']}' WHERE ID = ?";
                    break;

                  }



            break;

        }

        return $query;
    }

}
