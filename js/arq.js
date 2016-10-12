
  function redirect_buttons(){

      var elements = $("#edit, #remove, #infojson");
      var redirects = ["../edit", "../remove", "../produtos/json"];

      $(elements).each(function(index, elm){
        $elm = $(elm);
          $elm.click(function(){
            window.location.href = redirects[index] + "/" + this.dataset.id;
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
                      msg = "<div class = 'alert alert-success'> Logado Com Sucesso ! </div>";
                      setTimeout(function(){
                          window.location.href = "produtos?page=1";
                      }, 1300);
                  break;

                  case 2:
                      msg = "<div class = 'alert alert-danger'> Dados Incorretos ! </div>";
                      usern.css("border-color", "red");
                      passn.css("border-color", "red");

                  break;

                  default:
                      msg = "<div class = 'alert alert-warning'> Falha Ao Tentar Verificar Login ! </div>";

              }
              $("#result").html(msg);
              $("#result").show();

          });
        }

    });
}

function register_provs(){

    $("#CEP").change(function(){

            $.ajax({

              url:"https://viacep.com.br/ws/"+this.value+"/json/",

            }).done(function(json){

                if(!json.erro){
                    $("#address").val(json.logradouro + " - " + json.bairro);
                    $("#city").val(json.localidade + " - " + json.uf);
                }

            });

    });

    $("#btnaddprov").on("click", function(){

        var verify = verify_fields();

        if(verify === true){

            var valid_email = isEmail($("#email").val());

            if(valid_email)
                $("#formprov").submit();
            else
                $("#email").css("border-color", "red").focus();
        }
        else
            alert("Preencha Todos Os Campos");

    });

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    function verify_fields(){

        var result;
        $(".form-field").each(function(index, elm){

            result = result !== false ? $(elm).val() != "" : false;
        });

        return result;
    }

}
