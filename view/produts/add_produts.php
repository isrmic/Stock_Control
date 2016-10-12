
     <h3 class="page-header"> Adicionar Produtos </h3>

       <form action="add_prod" method = "post">

        <input type = "hidden" name = "key" value = "55FAF772A5E8ED8E5CC729CD37606403">

          <div class="row">

              <div class="form-group col-md-3">
                <label for="name">Nome : </label>
                <input type="text" name = "name_prod" maxlength="16" required = "require" class="form-control" id="name">
              </div>


              <div class="form-group col-md-2">
                <label for="price">Preço : </label>
                <input type="number" step="0.01" name = "price_prod" required = "require" class="form-control" id="price">
              </div>


            <div class="form-group col-md-2">
              <label for="count">Quantidade : </label>
              <input type="number" name = "count_prod" required = "require" class="form-control" id="count">
            </div>


            <div class="form-group col-md-2">
              <label for="min_c">Minimo : </label>
              <input type="number" name = "min_count" required = "require" class="form-control" id="min_c">
            </div>

            <div class="form-group col-md-3">
              <label for="code_p">Código Produto : </label>
              <div class="input-group">
                <span class="input-group-addon" id = "code_baricon"><i class="glyphicon glyphicon-barcode"></i></span>
                <input type="text" name = "code_prod" maxlength = "16" ariadescribedby = "code_baricon" required = "require" class="form-control" id="code_p">
            </div>
            </div>

            <div class="form-group col-md-2">
              <label for="campo5">Fornecedor : </label>
              <select id = "campo5" name = "provider" class="form-control">
                  <option value="0"> SELECT </option>
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
