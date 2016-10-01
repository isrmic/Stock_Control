
  function redirect_buttons(){

      var elements = $("#edit, #remove");
      var redirects = ["../edit", "../remove"];

      $(elements).each(function(index, elm){
        $elm = $(elm);
          $elm.click(function(){
            location.href = redirects[index] + "/" + this.dataset.id;
          });
      });
  }

function check_login(){

    var btn_login = $("#btn_log_in");
    var form  = $("#login-name, #login-pass");

    var usern = $(form[0]);
    var passn =  $(form[1]);

    btn_login.click(function(){

        if(usern.val().length < 6 ){
            usern.css("border-color", "red");
        }
        else if(passn.val().length < 6 ){
            passn.css("border-color", "red");

        }
        else{

          $.ajax({
            url:"http://localhost/stock_control/authenticate.php",
            method: "POST",
            data: {user:usern.val(), pass:passn.val()},
            statusCode: {
              404: function() {
                alert( "Pagina Não Encontrada ! " );
              }
            }

          }).done(function(ret, result){
              var msg;
              ret = parseInt(ret);
              switch(ret){
                  case 1:
                      msg = "Logado Com Sucesso !";
                      location.href = "produtos?page=1";
                  break;

                  case 2:
                      msg = "Dados Incorretos";
                      usern.css("border-color", "red");
                      passn.css("border-color", "red");

                  break;

                  default:
                      msg = "Falha Ao Tentar Verificar Login ! " + ret;
              }
              alert(msg);
          });
        }

    });
}
