
     <h3 class="page-header"> Adicionar Produtos </h3>

       <form action="add_prod" method = "post">

        <input type = "hidden" name = "key" value = "55FAF772A5E8ED8E5CC729CD37606403">

          <div class="row">

              <div class="form-group col-md-3">
                <label for="campo1">Nome : </label>
                <input type="text" name = "name_prod" maxlength="16" required = "require" class="form-control" id="campo1">
              </div>


              <div class="form-group col-md-3">
                <label for="campo2">Preço : </label>
                <input type="number" step="0.01" name = "price_prod" required = "require" class="form-control" id="campo3">
              </div>


            <div class="form-group col-md-2">
              <label for="campo3">Quantidade : </label>
              <input type="number" name = "count_prod" required = "require" class="form-control" id="campo3">
            </div>

            <div class="form-group col-md-2">
              <label for="campo3">Fornecedor : </label>
              <select name = "provider" class="form-control">
                  <option value="NULL"> SELECT </option>
                  <?php foreach($providers as $provider):?>
                    <option value = "<?php echo $provider->ID; ?>"> <?php echo $provider->Company; ?> </option>
                  <?php endforeach;?>
              </select>
            </div>


            </div>

            <div class="row">

              <div class="form-group col-md-10">
                <label for="campo3">Descrição : </label>
                <input type="text" name = "desc_prod" required = "require" class="form-control" id="campo3">
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
