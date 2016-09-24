
     <h3 class="page-header"> Adicionar Produtos </h3>

       <form action="add_prod" method = "post">

          <div class="row">

              <div class="form-group col-md-9">
                <label for="campo1">Nome : </label>
                <input type="text" name = "name_prod" required = "require" class="form-control" id="campo1">
              </div>

              <div class="form-group col-md-9">
                <label for="campo2">Preço : </label>
                <input type="number" name = "price_prod" required = "require" class="form-control" id="campo3">
              </div>

              <div class="form-group col-md-9">
                <label for="campo3">Descrição : </label>
                <input type="text" name = "desc_prod" required = "require" class="form-control" id="campo3">
              </div>

              <div class="form-group col-md-9">
                <label for="campo3">Quantidade : </label>
                <input type="number" name = "count_prod" required = "require" class="form-control" id="campo3">
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
