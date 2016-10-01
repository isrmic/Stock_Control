
<?php
if(!empty($produto)):
foreach($produto as $produto): ?>

<h3 class="page-header"> Editar Produto  <h1> <?php echo $produto->ID; ?> <small><?php echo $produto->Name; ?> </small></h1> </h3>

<form action="../updateprod" method = "post">

  <input type = "hidden" name = "prod_ID" value = "<?php echo $produto->ID; ?>">

   <div class="row">

       <div class="form-group col-md-4">
         <label for="campo1">Nome : </label>
         <input type="text" name = "name_prod" value = "<?php echo $produto->Name; ?>" required = "require" class="form-control" id="campo1">
       </div>

       <div class="form-group col-md-4">
         <label for="campo2">Preço : </label>
         <input type="number" step = "0.01" name = "price_prod" value = "<?php echo $produto->Price; ?>" required = "require" class="form-control" id="campo3">
       </div>

       <div class="form-group col-md-2">
         <label for="campo3">Quantidade : </label>
         <input type="number" name = "Count_Prod" value = "<?php echo $produto->Count_P; ?>" required = "require" class="form-control" id="campo3">
       </div>

     </div>

     <div class = "row">

       <div class="form-group col-md-10">
         <label for="campo3">Descrição : </label>
         <input type="text" name = "desc_prod" value = "<?php echo $produto->Description; ?>" required = "require" class="form-control" id="campo3">
       </div>



  </div>

 <hr />

 <div id="actions" class="row">
   <div class="col-md-12">
     <button type="submit" class="btn btn-success">Salvar</button>
     <a href="/stock_control/produtos" class="btn btn-default">Cancelar</a>
   </div>
 </div>
</form>

<?php

endforeach;

else:
    echo "Nenhum Produto Foi Encontrado";

endif;



?>
