<?php
  if(count($produto) > 0 ):
?>
<div class="page-header">

    <?php foreach($produto as $produto): ?>

    <h1> <?php echo $produto->ID; ?> <small><?php echo $produto->Name; ?> </small></h1>



</div>

<ul>
   <li>
   <b>Valor:</b> R$ <?php echo $produto->Preco; ?>
   </li>
   <li>
   <b>Descrição:</b> <?php echo $produto->Description; ?>
   </li>
   <li>
   <b>Quantidade em estoque:</b> <?php echo $produto->Count_p; ?>
   </li>
</ul>

<hr />

<form>

<div class = "row">

    <input type = "button" id = "edit" class = "btn btn-warning" data-lochref = "../edit/<?php echo $produto->ID; ?>" value  = "Editar">
    <input type = "button" id = "remove" class = "btn btn-danger" data-lochref = "../remove/<?php echo $produto->ID; ?>" value  = "Remove">
    <input type = "button" id = "back" class = "btn btn-default" data-lochref = "../produtos" value  = "Voltar">

</div>

<?php
endforeach;

else:
    echo "Nenhum Produto Foi Encontrado";



endif;



?>
