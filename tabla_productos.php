<?php
	require 'logica/conexion.php';
	//ver datos productos
	$consulta_prodoductos = "SELECT * FROM producto1";
	$ejecutarpro = mysqli_query($conectar, $consulta_prodoductos);
    //ver datos tipos
	$consulta_tipos = "SELECT * FROM tipoproducto";
	$ejecutartip = mysqli_query($conectar, $consulta_tipos);
	//ver datos tipos para editar
	$consulta_tipos = "SELECT * FROM tipoproducto";
	$ejecutartip2 = mysqli_query($conectar, $consulta_tipos);
	mysqli_close($conectar);


?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
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
        <a class="navbar-brand" href="index.html">KITCHEN</a>
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
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>
</nav>   

<br> <br>

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Tabla de <b>Productos</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Poducto</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar Producto</span></a>
						<a href="#editEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Codigo</th>
						<th>Codigo tipo</th>
						<th>Nombre</th>
						<th>U/Medida</th>
						<th>Cantidad</th>
						<th>Peso</th>
						<th>P/Compra</th>
						<th>F/compra</th>
						<th>Caducidad</th>						
					</tr>
				</thead>
				<tbody>					
						<?php
							foreach ($ejecutarpro as $dato) {
						?>
						<tr>	
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>	
						<?php
							echo '<td>' . $dato['id_producto'].'</td>';
							echo '<td>' . $dato['id_tipo'].'</td>';								
							echo '<td>' . $dato['nombre_producto'].'</td>';
							echo '<td>' . $dato['unidad_medida'].'</td>';
							echo '<td>' . $dato['cantidad'].'</td>';
							echo '<td>' . $dato['peso'].'</td>';
							echo '<td>' . $dato['precio_compra'].'</td>';
							echo '<td>' . $dato['fecha_compra'].'</td>';
							echo '<td>' . $dato['fecha_vencimiento'].'</td>';
						?>							
						</tr>	
						<?php	
						}
						?>											
				</tbody>
			</table>		
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="logica/grd_producto.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Agregar Producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
				<div class="form-group">
						<label>Nombre del tipo de producto de la compra</label>
						<select name="tipo" required>
						<option selected></option>
						<?php while($row1 = mysqli_fetch_array($ejecutartip)):;?>

							<option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

						<?php endwhile;?>
						</select>
					</div>					
					<div class="form-group">
						<label>Nombre Producto</label>
						<input type="text" name="nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Unidad de medida</label>
						<select name="medida"><br>   
							<option selected></option>     
							<option value="gramos">Gramos</option>
							<option value="libras">Libras</option>
							<option value="kilos">Kilos</option>
							<option value="toneladas">Toneladas</option>
							<option value="unidades">Unidades</option>
							<option value="litros">Litros</option>
						</select>
					</div>
					<div class="form-group">
						<label>Cantidad</label>
						<input type="number" name="cantidad" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Peso</label>
						<input type="text" name="peso" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Precio de compra</label>
						<input type="text" name="precio" class="form-control" placeholder="sin puntos ni comas" required>
					</div>
					<div class="form-group">
						<label>Fecha de compra</label>
						<input type="date" name="fecha_compra" class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Fecha de vencimiento</label>
						<input type="date" name="fecha_vencimiento" class="form-control" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Agregar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="logica/edit_producto.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Editar Producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
				<div class="form-group">
						<label>Ingrese el codigo del producto a editar</label>
						<input type="number" name="producto" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Categoria a la que pertenece el producto</label>
						<select name="tipo" required>
						<option selected></option>
						<?php while($row1 = mysqli_fetch_array($ejecutartip2)):;?>

							<option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

						<?php endwhile;?>
						</select>
					</div>
					<div class="form-group">
						<label>Nombre producto</label>
						<input type="text" name="nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Unidad de medida</label>
						<select name="medida"><br>   
							<option selected></option>     
							<option value="gramos">Gramos</option>
							<option value="libras">Libras</option>
							<option value="kilos">Kilos</option>
							<option value="toneladas">Toneladas</option>
							<option value="unidades">Unidades</option>
							<option value="litros">Litros</option>
						</select>
					</div>				
					<div class="form-group">
						<label>Cantidad</label>
						<input type="number" name="cantidad" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Peso</label>
						<input type="text" name="peso" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Precio de compra</label>
						<input type="text" name="precio" class="form-control" placeholder="Sin puntos ni comas" required>
					</div>	
					<div class="form-group">
						<label>Fecha de compra</label>
						<input type="date" name="fecha_compra" class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Fecha de vencimiento</label>
						<input type="date" name="fecha_vencimiento" class="form-control" required>
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
			<form action="logica/delete_producto.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="form-group">
						<label>Ingrese el codigo del producto a eliminar</label>
						<input type="number" name="producto" class="form-control" required>
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