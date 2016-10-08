
     <h3 class="page-header"> Registrar Fornecedor </h3>

       <form id = "formprov" action="add_prov" method = "post" >

        <input type = "hidden" name = "key" value = "55FAF772A5E8ED8E5CC729CD37606403">

          <div class="row">

                  <div class="form-group col-md-3">
                      <label for="name">Nome : </label>
                      <input type="text" name = "name_prov" required = "require" class="form-field form-control" id="name">
                  </div>


                  <div class="form-group col-md-2">
                      <label for="company">Empresa : </label>
                      <input type="text"  name = "company_prov" required = "require" class="form-field form-control" id="company">
                  </div>


                <div class="form-group col-md-2">
                    <label for="office">Cargo : </label>
                    <input type="text" name = "office_prov" required = "require" class="form-field form-control" id="office">
                </div>

                <div class="form-group col-md-2">
                    <label for="CEP">CEP : </label>
                    <input type="number" name = "cep_prov" required = "require" class="form-field form-control" id="CEP">
                </div>

                <div class="form-group col-md-2">
                    <label for="region">Região : </label>
                    <input type="text" name = "region_prov" required = "require" class="form-field form-control" id="region">
                </div>



                <div class="form-group col-md-5">
                    <label for="address">Endereço : </label>
                    <input type="text" name = "location_prov" required = "require" class="form-field form-control" id="address">
                </div>

                <div class="form-group col-md-2">
                    <label for="campo8">País : </label>
                    <input type="text" name = "country_prov" required = "require" class="form-field form-control" id="campo8">
                </div>

                <div class="form-group col-md-2">
                    <label for="campo9">Telefone : </label>
                    <div class="input-group">
                      <span class="input-group-addon" id ="iconphone"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input type="text" name = "phone_prov" aria-describedby = "iconphone" required = "require" class="form-field form-control" id="campo9">
                  </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="email">Email : </label>
                    <div class="input-group">
                      <span class="input-group-addon" id = "iconmail"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" name = "email_prov" aria-describedby="icomail" required = "require" class="form-field form-control" id="email">
                  </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="city">Cidade - Estado : </label>
                    <input type="text" name = "city_prov" required = "require" class="form-field form-control" id="city">
                </div>


          </div>


        <hr />

        <div id="actions" class="row">
          <div class="col-md-12">
            <input id ="btnaddprov" type="button" class = "btn btn-success" value="Adicionar">
            <a href="produtos" class="btn btn-default">Cancelar</a>
          </div>
        </div>
      </form>

      <script>
          $(function(){
             register_provs();
          });
      </script>
