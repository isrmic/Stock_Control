
     <h3 class="page-header"> Registrar Fornecedor </h3>

       <form action="add_prov" method = "post">

        <input type = "hidden" name = "key" value = "55FAF772A5E8ED8E5CC729CD37606403">

          <div class="row">

                  <div class="form-group col-md-3">
                      <label for="campo1">Nome : </label>
                      <input type="text" name = "name_prov" required = "require" class="form-control" id="campo1">
                  </div>


                  <div class="form-group col-md-2">
                      <label for="campo2">Empresa : </label>
                      <input type="text"  name = "company_prov" required = "require" class="form-control" id="campo2">
                  </div>


                <div class="form-group col-md-2">
                    <label for="campo3">Cargo : </label>
                    <input type="text" name = "office_prov" required = "require" class="form-control" id="campo3">
                </div>

                <div class="form-group col-md-5">
                    <label for="campo4">Endereço : </label>
                    <input type="text" name = "location_prov" required = "require" class="form-control" id="campo4">
                </div>

                <div class="form-group col-md-2">
                    <label for="campo5">Cidade : </label>
                    <input type="text" name = "city_prov" required = "require" class="form-control" id="campo5">
                </div>

                <div class="form-group col-md-2">
                    <label for="campo6">Região : </label>
                    <input type="text" name = "region_prov" required = "require" class="form-control" id="campo6">
                </div>

                <div class="form-group col-md-2">
                    <label for="campo7">CEP : </label>
                    <input type="number" name = "cep_prov" required = "require" class="form-control" id="campo7">
                </div>

                <div class="form-group col-md-2">
                    <label for="campo8">País : </label>
                    <input type="text" name = "country_prov" required = "require" class="form-control" id="campo8">
                </div>

                <div class="form-group col-md-2">
                    <label for="campo9">Telefone : </label>
                    <input type="text" name = "phone_prov" required = "require" class="form-control" id="campo9">
                </div>


          </div>


        <hr />

        <div id="actions" class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-success">Adicionar</button>
            <a href="produtos" class="btn btn-default">Cancelar</a>
          </div>
        </div>
      </form>
