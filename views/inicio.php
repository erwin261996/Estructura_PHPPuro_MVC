<?php 

	session_start();

	if(isset($_SESSION['id'])){
	    header('location: '.constant('URL').'main');
	 }

	include 'default/defaultHeader.php';

?>



	<div class="container">
		<div class="col-md-5" style="margin: 50px auto;">
			<div class="card">
			  <div class="card-header">Inicio de Sesión</div>
			  <div class="card-body">

			  	<!-- <form method="POST" id="formLogin" action=""> -->
				  <div class="form-group">
				    <label for="formUsuario">Usuario</label>
				    <input type="text" class="form-control" name="formUsuario" id="formUsuario" placeholder="Usuario">
				  </div>
				  <div class="form-group">
				    <label for="formPass">Contraseña</label>
				    <input type="password" class="form-control" name="formPass" id="formPass" placeholder="Contraseña">
				  </div>
				  <div class="col-md-12 text-right">
				  	<!-- id="accederLogin" -->
				  	<button type="button" id="submitLogin" class="btn btn-primary">Acceder</button>
				  </div>

				<!-- </form> -->

				<span>Usuario: erwin@gmail.com</span><br>
				<span>Contraseña: erwin1234</span>

				<div class="alert alert-danger mt-4" id="AlertSession" role="alert"></div>
			    
			  </div>
			</div>
		</div>
	</div>


<?php include 'default/defaultFooter.php'; ?>
<script>
	var url = '<?php echo constant('URL') ?>';
</script>

<script src="<?php echo constant('URL') . 'assets/js/login.js'; ?>"></script>