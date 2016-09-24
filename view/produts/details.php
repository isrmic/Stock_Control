<?php
  if(count($produto) > 0 ):
?>
<div class="page-header">

    <?php foreach($produto as $produto): ?>

    <h1> <?php echo $produto->ID; ?> <small><?php echo $produto->Name; ?> </small></h1>

    <?php endforeach; ?>

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

    <a href = "../edit/<?php echo $produto->ID; ?>" class = "btn btn-warning" > Editar </a>
    <a href = "../remove/<?php echo $produto->ID; ?>" class = "btn btn-danger" > Remover </a>
    <a href = "../produtos" class = "btn btn-default" > Voltar </a>
    
</div>

<?php

else:
    echo "Nenhum Produto Foi Encontrado";

endif;

?>
