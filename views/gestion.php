<?php
  session_start();

  if(!isset($_SESSION['verificado']) || $_SESSION['verificado'] != 1){
      session_start();
      session_destroy();

      header('location: '.constant('URL'));
  }

  include 'default/defaultHeader.php';


?>

<div class="modal fade" id="modal-tickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Cuenta: <?php echo $_SESSION['nombre']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul>

    <ul class="nav nav-pills mr-5" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-atenclien-tab" data-toggle="pill" href="#pills-atenclien" role="tab" aria-controls="pills-atenclien" aria-selected="true">Atencion al Cliente (Gestiones)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-tickets-tab" data-toggle="pill" href="#pills-tickets" role="tab" aria-controls="pills-tickets" aria-selected="false">Tickets</a>
      </li>
    </ul>

    <a href="<?php echo constant('URL') . 'cerrarSesion'; ?>">
      <button type="button" class="btn btn-danger" name="button">Cerrar sesion</button>
    </a>
  </div>
</nav>


<div class="mt-4">

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-atenclien" role="tabpanel" aria-labelledby="pills-atenclien-tab">
      <!-- Inicio de la atencion al cliente :: Gestion -->
      <div class="container">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista de Gestiones</h5>
            <!-- Lista de Gestions -->
            <div id="agrupacion-btn-list"></div>
          </div>
        </div>
      </div>
      <!-- Fin de la atencion al cliente:: Gestion -->
    </div>
    <div class="tab-pane fade" id="pills-tickets" role="tabpanel" aria-labelledby="pills-tickets-tab">
      <!-- Inicio de tickets -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7">
            <form method="POST" id="formtickets" action="<?php echo constant('URL') . 'main/addtickets'; ?>">
              <div class="row">
                <input type="hidden" class="form-control" id="codid" name="codid">
                <div class="col-md-12 mb-4">
                  <div class="row">
                    <div class="col-md-3"><h4>Ticket #</h4></div>
                    <div class="col-md-3"><h4 id="notickethtml"></h4></div>
                    <div class="col-md-6"><h4 id="nombretickethtml"></h4></div>
                  </div>
                </div>
                
                <!-- Inicio del row -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="strnombre" name="strnombre" placeholder="Nombre">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputtext1">Apellido</label>
                    <input type="text" class="form-control" id="strapellido" name="strapellido" placeholder="Apellido">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputtext1">Dirección</label>
                    <input type="text" class="form-control" id="atrdireccion" name="atrdireccion" max="255" placeholder="Dirección">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teléfono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="cb_gestion">Gestion Real Realizada</label>
                    <select class="form-control" id="cb_gestion" name="cb_gestion"></select>
                  </div>
                </div>
                <!-- Fin del row -->
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Problema expuesto por el cliente</label>
                <input type="text" class="form-control" id="problemaexpusto" name="problemaexpusto" placeholder="Problema expuesto">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Solución brindada</label>
                <input type="text" class="form-control" id="solucionbrindada" name="solucionbrindada">
              </div>

              <div class="col-md-12 text-right">
                 <button type="submit" class="btn btn-primary">Guardar Gestión</button>
              </div>
              
          
             
            </form>
          </div>
          <div class="col-md-5">
            <table class="table table-striped table-sm table-hover">
              <thead>
                <tr>
                  <th scope="col">No. Ticket</th>
                  <th scope="col">Gestión Solicitada</th>
                </tr>
              </thead>
              <tbody id="tbody-gestion"></tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Fin de tickets -->
    </div>
  </div>

	
</div>

<?php include 'default/defaultFooter.php'; ?>

<script src="<?php echo constant('URL') . 'assets/js/main.js'; ?>"></script>