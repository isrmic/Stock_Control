<?php



namespace Auth\Authenticate;
use Req\GetRequest as Request;
use conexions\mysql\Con\Conexion as DB;

class AuthUser extends DB{

    public function check_login($user, $pass){

      $formrequest = Request::Post($user, $pass);
      $formrequest["pass"] = strtoupper(md5($formrequest["pass"]));

      $queryselect = "SELECT UserName, PassWord FROM user_admin WHERE UserName = ? AND PassWord = ? ";

      $select = parent::prepar($queryselect);
      $select->opt($formrequest);
      if($select->exec()){

          if($select->rowsafeted()){

              $result = 1;
              $_SESSION["login"] = $user;
              $_SESSION["pass"] = $pass;
              $_SESSION["passm"] = $formrequest["pass"];

          }
          else

          {
              $result = 2;
          }
      }
      else
      {
          $result = -1;
      }

      return $result;

    }
}
