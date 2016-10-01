<div class = "screen">
  <div class = "container" >

    <div class = "container-fluid">

          <section id = "login">



                <form>

                    <div class="log_in">


                    <div class="login-form">

                      <div class="form-group">
                        <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="login-name" />
                        <label class="login-field-icon fui-user" for="login-name"></label>
                      </div>

                      <div class="form-group">
                        <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                      </div>

                      <input id = "btn_log_in" type = "button" class="btn btn-primary btn-lg btn-block" value = "log in">
                      <a class="login-link" href="#">Lost your password?</a>

                      <div id = "result" style = "display:none;"></div>

                    </div>



                  </div>


                </form>





          </section>

        </div>
    </div>
</div>


<script>


  $(document).ready(function(){
      check_login();
  });

</script>
