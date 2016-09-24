<div class = "container">
    <div id="main" class="container-fluid">

      <nav class="navbar navbar-default">
        <div class="row demo-row">
          <div class="col-xs-12">
            <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                  <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" href="/stock_control/produtos">Controle De Estoque</a>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse-01">

                <ul class="nav navbar-nav navbar-right">

                  <li><a href="/stock_control/produtos">Lista Produtos</a></li>
                  <li><a href="/stock_control/adicionar">Novo</a></li>
                  <li><a href="/stock_control/json">Json</a></li>

                 </ul>

                 <form class="navbar-form navbar-right" action="" role="search">
                  <div class="form-group">
                    <div class="input-group">
                      <input class="form-control" name = "prod" id="navbarInput-01" type="search" placeholder="Search">
                      <span class="input-group-btn">
                        <button type="submit" class="btn"><span class="fui-search"></span></button>
                      </span>
                    </div>
                  </div>
                </form>
              </div><!-- /.navbar-collapse -->
            </nav><!-- /navbar -->
          </div>
        </div> <!-- /row -->

     </nav>

        <?php
            include_once "{$file_include}.php";
        ?>



    </div>

    


  </div>
