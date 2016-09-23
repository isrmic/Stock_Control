<?php
  if(count($produtos) > 0 ){
?>
<div class="page-header">

    <?php foreach($produtos as $produto): ?>

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

<?php }

else {
    echo "Nenhum Produto Foi Encontrado";
}

?>
