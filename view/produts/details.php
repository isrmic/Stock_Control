<?php

  if(count($produto) > 0 ):

?>
<div class="page-header">

    <?php foreach($produto as $produto): ?>

    <h1> <?php echo $produto->ID; ?> <small><?php echo $produto->Name; ?> </small></h1>



</div>

<ul>
    <div class = "row">
   <li>
      <b>Valor: </b> R$ <?php echo $produto->Price; ?>
   </li>
   <li>
      <b>Descrição :</b> <?php echo $produto->Description; ?>
   </li>
   <li>
      <b>Quantidade em estoque: </b> <?php echo $produto->Count_P; ?>
   </li>
    </div>
  </ul>
  <ul>
    <div class="row">
   <li>
      <b>Código Produto: </b> <?php echo $produto->Code_Produt; ?>
   </li>
   <li>
      <?php $insertData = new DateTime($produto->insertData); ?>
      <b>Inserido Em: </b> <?php echo $insertData->format('d/m/Y - H:i:s'); ?>
   </li>
   <li>
      <?php $dataModified = new DateTime($produto->dataModified); ?>
      <b>Última Modificação: </b> <?php echo $dataModified->format('d/m/Y - H:i:s'); ?>
   </li>
 </div>
</ul>

<hr />


<div class = "row">

    <form action="/stock_control/removeprod" method="post">
        <input type = "button" id = "edit" class = "btn btn-warning" data-id = "<?php echo $produto->ID; ?>" value  = "Editar">


          <input type="hidden" name = "prodID_del" value = "<?php echo $produto->ID; ?>">
          <input type="hidden" name = "key" value = "55FAF772A5E8ED8E5CC729CD37606403">
          <button class = "btn btn-danger" >
            <span> Remove </span>
          </button>


        <a class = "btn btn-info" href = "../produtos/json/<?php echo $produto->ID; ?>" > json </a>
        <a href = "../produtos" class = "btn btn-default"> Voltar </a>

    </form>

</div>


<script>
$(function(){
    redirect_buttons();
});
</script>

<?php
endforeach;

else:
    echo "Nenhum Produto Foi Encontrado";
endif;



?>
