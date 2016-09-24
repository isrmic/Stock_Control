

     <h3 class="page-header"> Lista De Produtos </h3>

     <?php

     $page = self::Get("page");
     $page = $page["page"];

     if(!empty($produtos)): ?>
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
      <td style = "width:110px;"> R$ <?php echo number_format($produto->Preco, 2, ',', ' '); ?> </td>
      <td> <?php echo $produto->Description; ?>  </td>
      <td> <?php echo $produto->Count_p; ?> </td>

      <td>
          <a class = "btn btn-inverse btn-xs" href="detail/<?php echo $produto->ID; ?>">
              <span> View </span>
          </a>
      </td>

      <td>
          <a class = "btn btn-inverse btn-xs" href = "edit/<?php echo $produto->ID; ?>">
            <span> Edit </span>
          </a>
      </td>

      <td>
          <a class = "btn btn-inverse btn-xs" href = "remove/<?php echo $produto->ID; ?>">
            <span> Remove </span>
          </a>
      </td>


    </tr>

  <?php endforeach; ?>

  </table>

  <div class = "centralize">
    <ul class="pagination">
      <li class="previous"><a href="?page=<?php echo $page > 1 ? $page-1 : 1; ?>" class="fui-arrow-left"></a></li>
      <?php for($i = 1; $i <= $produtos[0]->rows; $i++): ?>
        <li class = "<?php echo $page == $i ? 'active' : null; ?>"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php endfor; ?>
      <li class="next"><a href="?page=<?php echo $page+1; ?>" class="fui-arrow-right"></a></li>
    </ul>
  </div>

<?php
    else:
        echo "Nenhum Produto Encontrado ! ";


    endif;
