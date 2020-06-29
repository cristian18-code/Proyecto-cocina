<?php
	require 'logica/conexion.php';
	//ver datos tipo de producto
	$consulta_tipos = "SELECT * FROM tipoproducto";
	$ejecutar = mysqli_query($conectar, $consulta_tipos);
	mysqli_close($conectar);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Distribuidor</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylsheet/css" href="css/estilo_tabla1.css">
 <!-- Bootstrap core CSS -->
 <link href="css/bootstrap.min.css" rel="stylesheet">

 <!-- Custom styles for this template -->
 <link href="css/estilo_index.css" rel="stylesheet">
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.html">COCINA</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabla_despensa.php">Despensas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabla_Productos.php">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabla_distribuidor.php">Distribuidores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabla_administrador.php">Administradores</a>
          </li>
        </ul>        
      </div>
</nav>  

<br> <br><br> <br><br> 

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Tabla de <b>Tipos de productos</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Categoria</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar Categoria</span></a>
						<a href="#editEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
					</div>
				</div>
			</div>
<!-- MDBootstrap Datatables  -->
<link href="css/addons/datatables.min.css" rel="stylesheet">
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>

<br> <br><br> 


<table id="tabla_tipos" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					<thead>
						<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>¿Es refrigerable?</th>
						<th>¿Tiene vencimiento?</th>					
					</tr>
                </thead>
  <tbody>
  						<?php
							foreach ($ejecutar as $dato) {
						?>
						<tr>	
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>	
						<?php
							echo '<td>' . $dato['id_tipo'].'</td>';
							echo '<td>' . $dato['nombre'].'</td>';								
							echo '<td>' . $dato['es_refrigerable'].'</td>';
							echo '<td>' . $dato['tiene_vencimiento'].'</td>';
						?>							
						</tr>	
						<?php	
						}
						?>
</tbody>
</table>



<script type="application/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#tabla_productos1").prop("checked", false);
		}
	});
});

// Basic example
$(document).ready(function () {
  $('#tabla_tipos').DataTable({
    "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});

// Añade Clase 
$(document).ready(function () {
  $('#tabla_tipos').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="logica/grd_tipo.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Agregar Categoria de productos</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nombre de la categoria de productos</label>
						<input type="text" name="nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>¿Es refrigerable?</label>
						<input type="text" name="refrigerable" class="form-control" required>
					</div>
					<div class="form-group">
						<label>¿Tiene vencimiento?</label>
						<input type="text" name="vencimiento" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Agregar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="logica/edit_tipo.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Editar Categoria</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
				<div class="form-group">
						<label>Ingrese el codigo de la categoria a editar</label>
						<input type="number" name="tipo" class="form-control" required>
					</div>					
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>¿Es refrigerable?</label>
						<input type="text" name="refrigerable" class="form-control" required>
					</div>
					<div class="form-group">
						<label>¿Tiene vencimiento?</label>
						<input type="text" name="vencimiento" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="logica/delete_tipo.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar Categoria</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="form-group">
						<label>Ingrese el codigo de la categoria a eliminar</label>
						<input type="number" name="tipo" class="form-control" required>
					</div>
				<div class="modal-body">					
					<p>¿Esta seguro que desea eliminar este elemento?</p>
					<p class="text-warning"><small>Esta accion no se puede deshacer.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Eliminar">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>