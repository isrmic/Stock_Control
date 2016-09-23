
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
          <a href="detail/<?php echo $produto->ID; ?>">
              <span class="glyphicon glyphicon-search"></span>
          </a>
      </td>

      <td>

              <a href = "">
                <span  class="glyphicon glyphicon-remove"></span>
              </a>
          </div>
      </td>

    </tr>

  <?php endforeach; ?>



  </table>
