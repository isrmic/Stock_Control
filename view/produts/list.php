

    <?php
    use Req\GetRequest as Request;
    $success = Request::Get("success");
    if(!empty($success["success"])){
        echo "<span class = 'alert alert-success'> <strong> Sucesso !</strong>  Produto Adicionado Com Sucesso !</span>";
    }

    ?>
     <h3 class="page-header"> Lista De Produtos </h3>

     <table class = "table table-striped table-bordered table-hover">



    <tr class = "">

      <tr>
        <td> Nome </td>
        <td> Preço </td>
        <td> Descrição </td>
        <td> Quantidade </td>

      </tr>


      <?php foreach($produtos as $produto): ?>

      <td> <?php echo $produto->Name; ?> </td>
      <td> <?php echo $produto->Preco; ?> </td>
      <td> <?php echo $produto->Description; ?>  </td>
      <td> <?php echo $produto->Count_p; ?> </td>

      <td>
          <a class = "btn btn-success btn-xs" href="detail/<?php echo $produto->ID; ?>">
              <span> View </span>
          </a>
      </td>

      <td>
          <a class = "btn btn-danger btn-xs" href = "remove/<?php echo $produto->ID; ?>">
            <span> Remove </span>
          </a>
      </td>
      <td>
          <a class = "btn btn-warning btn-xs" href = "edit/<?php echo $produto->ID; ?>">
            <span> Edit </span>
          </a>
      </td>

    </tr>

  <?php endforeach; ?>



  </table>
