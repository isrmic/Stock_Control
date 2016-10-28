

     <h3 class="page-header"> Lista De Produtos </h3>

     <?php

     $page = parent::Get("page");
     $page = $page["page"] ?? 1;
     #$minprod = [20, false];

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



          <td> <?php echo $produto->Name; ?></td>
          <td style = "width:120px;"> R$ <?php echo number_format($produto->Price, 2, ',', ' '); ?> </td>
          <td> <?php echo $produto->Description; ?>
          </td>

          <td class="<?php echo $produto->Count_P < $produto->Min_Count ? 'alert alert-danger' : ''; ?>"> <?php echo $produto->Count_P; ?> </td>

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
            <form action="/stock_control/removeprod" method="post">
              <input type="hidden" name = "prodID_del" value = "<?php echo $produto->ID; ?>">
              <input type="hidden" name = "key" value = "55FAF772A5E8ED8E5CC729CD37606403">
              
              <button class = "btn btn-inverse btn-xs" >
                <span> Remove </span>
              </button>
            </form>
          </td>

          <?php if($produto->Count_P < $produto->Min_Count): ?>

              <td><span class="label label-danger"> Em Falta </span></td>

          <?php endif; ?>


    </tr>

  <?php endforeach; ?>

  </table>

  <div class = "centralize">
    <ul class="pagination">
      <li class="previous"><a href="?page=<?php echo $page > 1 ? $page-1 : 1; ?>" class="fui-arrow-left"></a></li>
      <?php for($i = 1; $i <= $produtos[0]->rows; $i++): ?>
        <li class = "<?php echo $page == $i ? 'active' : null; ?>"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php endfor; ?>
      <li class="next"><a href="?page=<?php echo $page < $produtos[0]->rows ? $page+1 : $page; ?>" class="fui-arrow-right"></a></li>
    </ul>

  </div>



<?php
    else:
        echo "Nenhum Produto Encontrado ! ";
    endif;
