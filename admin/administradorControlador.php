<?php
	session_start();
	include_once('../variables.php'); //Include Environment variables
	include_once('dbFunctions.php'); //Include Db functions
	$tarea = $_GET['tarea'];

	if ($_SESSION['sessi_tipo'] == 1) {

		 /*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
		  :::::::::::::::::::::::::::::::::::::::::::::SECCION DE ADMINISTRAR CLIENTES::::::::::::::::::::::::::::
		  :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

		  if ($tarea == 'listarClientes') {
		  	?>
		  	<div id="listarClientes">
		  		<?php $listarClientes = listarClientesBD(); ?>
		  		<div class="block-border">
		  			<form class="block-content form" id="table_form" method="post" action="#">
		  				<h1>Lista de Clientes</h1>
		  				<table class="table sortable no-margin" cellspacing="0" width="100%">
		  					<thead>
		  						<tr>
		  							<th class="alineando_td" scope="col">Nombre</th>
		  							<th class="alineando_td" scope="col">Apellido</th>
		  							<th class="alineando_td" scope="col">Email</th>
		  							<th class="alineando_td" scope="col">Teléfono</th>
		  							<th class="alineando_td" scope="col">Cédula</th>
		  							<th class="alineando_td" scope="col">Dirección</th>
		  							<th class="alineando_td" scope="col">Ciudad</th>
		  							<th class="alineando_td" scope="col">Cant. Vendedores</th>
		  							<th class="table-actions alineando_td" scope="col" >Editar Cliente</th>
		  						</tr> 
		  					</thead>
		  					<tbody>
		  						<?php
		  						for ($i=0; $i < sizeof($listarClientes); $i++) { 
		  							$vendedores = count(vendedoresClienteBD($listarClientes[$i]['i_idcliente']));
		  							?>						
		  							<tr>
		  								<td class="alineando_td"><?php echo $listarClientes[$i]['v_nombre'];?></td>
		  								<td class="alineando_td"><?php echo $listarClientes[$i]['v_apellido'];?></td>
		  								<td class="alineando_td"><?php echo $listarClientes[$i]['v_email'];?></td>
		  								<td class="alineando_td"><?php echo $listarClientes[$i]['v_telefono'];?></td>
		  								<td class="alineando_td"><?php echo $listarClientes[$i]['v_cedula'];?></td> 
		  								<td class="alineando_td"><?php echo $listarClientes[$i]['v_direccion'];?></td>
		  								<td class="alineando_td"><?php echo $listarClientes[$i]['v_ciudad'];?></td>
		  								<td class="alineando_td"><?php echo $vendedores;?></td>
		  								<td class="table-actions alineando_td">
		  									<a href="#" title="Editar" class="with-tip" onclick="editCliente(<?php echo $listarClientes[$i]['i_idcliente'] ?>);">
		  										<img src="../images/icons/fugue/pencil.png" width="16" height="16">
		  									</a>
		  									<a href="#" title="Eliminar" class="with-tip" onclick="eliminarCliente(<?php echo $listarClientes[$i]['i_idcliente']; ?>);">
		  										<img src="../images/icons/fugue/cross-small.png" width="16" height="16">
		  									</a>				 
		  								</td>
		  							</tr>
		  							<?php  }  ?>
		  						</tbody>
		  					</table>
		  				</div>
		  			</form>
		  		</div>
		  	</div>	
		  </div>
		  <?php

		}
		else if ($tarea == 'eliminarCliente') {
			$i_idcliente = $_POST['i_idcliente'];
			eliminarClienteBD($i_idcliente);
			eliminarRelacionClienteBD($i_idcliente);
			?>
			<div class="block-border">
				<form class="block-content form" id="table_form" method="post" action="#">
					<h1>Cliente eliminado</h1>
					<p style="text-align:center; font-size: 20px; margin-top:10px;">Se ha eliminado con éxito el cliente seleccionado</p>
					<br>
					<div style="text-align:center;">
						<button type="button" onclick="window.location='<?php echo $SERVER; ?>admin/index.php'">
							Volver
						</button>
					</div>
				</form>
			</div>
			<?php
		}
		else if ($tarea=="addCliente") {
			?>
			  <div class="container_12">
					<div class="block-border">
						<form class="block-content form" name="formClientes" action="#">
							<h1>Agregar Cliente</h1>
							<div class="columns">
								<p class="colx3-left">
									<label for="complex-en-subtitle">Nombre:</label>
									<input type="text" name="form_hk" id="v_nombre" maxlength="100" value="" class="full-width">
								</p>
								<p class="colx3-center">
									<label for="complex-en-subtitle">Apellido:</label>
									<input type="text" name="form_hk" id="v_apellido" maxlength="100" value="" class="full-width">
								</p>
								<p class="colx3-right">
									<label for="complex-en-subtitle">Email:</label>
									<input type="text" name="form_hk" id="v_email" maxlength="100" value="" class="full-width">                	
								</p>
							</div>
							<div class="columns">
								<p class="colx3-left">
									<label for="complex-en-subtitle">Teléfono:</label>
									<input type="text" name="form_hk" id="v_telefono" maxlength="10" value="" class="full-width">    
								</p>
								<p class="colx3-center">
									<label for="complex-en-subtitle">Cédula:</label>
									<input type="text" name="form_hk" id="v_cedula" maxlength="50" value="" class="full-width">
								</p>
								<p class="colx3-right">
									<label for="complex-en-subtitle">Ciudad:</label>
									<input type="text" name="form_hk" id="v_ciudad" maxlength="50" value="" class="full-width">
								</p>
							</div>         
							<div class="columns">                    
								<p class="colx2-left">
									<label for="complex-en-style">Vendedor(es) asociado(s):</label>
									<?php
									$vendedores = listarVendedoresBD();
									?>
									<select multiple id="r_vendedor" class="full-width">
										<?php
										for ($i=0; $i < sizeof($vendedores); $i++) { 
										?>
										<option value="<?php echo $vendedores[$i]['i_idvendedor']; ?>">
											<?php echo $vendedores[$i]['v_nombre'] . ' ' . $vendedores[$i]['v_apellido']; ?>
										</option>
										<?php
									       }
										?>
									</select>
								</p>								
								<p class="colx2-right">
									<label for="complex-en-subtitle">Dirección:</label>
									<textarea name="form_hk" id="v_direccion" maxlength="100" class="full-width"></textarea>
								</p>
							</div>        
							<div class="columns">
								<p class="colx2-left">
									<button type="button" onclick="saveCliente();">Crear</button>
									<input class="boton_css" type="button" onclick="location.href='<?php echo $SERVER . 'admin/index.php'; ?>'" value="Cancelar">
								</p>
							</div>
						</form>
					</div>	
			</div> 
			<?php
		}
		else if ($tarea == 'saveCliente') {
			$v_nombre = $_POST['v_nombre'];
			$v_apellido = $_POST['v_apellido'];
			$v_email = $_POST['v_email'];
			$v_telefono = $_POST['v_telefono'];
			$v_ciudad = $_POST['v_ciudad'];
			$v_cedula = $_POST['v_cedula'];
			$v_direccion = $_POST['v_direccion'];
			$r_vendedor = $_POST['r_vendedor'];

			$i_idcliente = saveClienteBD($v_nombre,$v_apellido,$v_email,$v_telefono,$v_ciudad,$v_cedula,$v_direccion);

			if ($r_vendedor != '') {
				$r_vendedor = explode(',', $r_vendedor);

				for ($i=0; $i < sizeof($r_vendedor); $i++)
					r_cliente_vendedorBD($i_idcliente, $r_vendedor[$i]);
			}
			?>
			<div class="block-border">
				<form class="block-content form" id="table_form" method="post" action="#">
					<h1>Cliente agregado</h1>
					<p style="text-align:center; font-size: 20px; margin-top:10px;">Se ha agregado con éxito el cliente</p>
					<br>
					<div style="text-align:center;">
						<button type="button" onclick="window.location='<?php echo $SERVER; ?>admin/index.php'">
							Volver
						</button>
					</div>
				</form>
			</div>
			<?php
		}
		else if ($tarea=="editCliente") {
			$datosCliente = datosClienteBD($_POST['i_idcliente']);
			?>
			  <div class="container_12">
					<div class="block-border">
						<form class="block-content form" name="formClientes" action="#">
							<h1>Agregar Cliente</h1>
							<div class="columns">
								<p class="colx3-left">
									<label for="complex-en-subtitle">Nombre:</label>
									<input type="text" name="form_hk" id="v_nombre" maxlength="100" value="<?php echo $datosCliente['v_nombre']; ?>" class="full-width">
								</p>
								<p class="colx3-center">
									<label for="complex-en-subtitle">Apellido:</label>
									<input type="text" name="form_hk" id="v_apellido" maxlength="100" value="<?php echo $datosCliente['v_apellido']; ?>" class="full-width">
								</p>
								<p class="colx3-right">
									<label for="complex-en-subtitle">Email:</label>
									<input type="text" name="form_hk" id="v_email" maxlength="100" value="<?php echo $datosCliente['v_email']; ?>" class="full-width">                	
								</p>
							</div>
							<div class="columns">
								<p class="colx3-left">
									<label for="complex-en-subtitle">Teléfono:</label>
									<input type="text" name="form_hk" id="v_telefono" maxlength="10" value="<?php echo $datosCliente['v_telefono']; ?>" class="full-width">    
								</p>
								<p class="colx3-center">
									<label for="complex-en-subtitle">Cédula:</label>
									<input type="text" name="form_hk" id="v_cedula" maxlength="50" value="<?php echo $datosCliente['v_cedula']; ?>" class="full-width">
								</p>
								<p class="colx3-right">
									<label for="complex-en-subtitle">Ciudad:</label>
									<input type="text" name="form_hk" id="v_ciudad" maxlength="50" value="<?php echo $datosCliente['v_ciudad']; ?>" class="full-width">
								</p>
							</div>         
							<div class="columns">                    
								<p class="colx2-left">
									<label for="complex-en-style">Vendedor(es) asociado(s):</label>
									<?php
									$vendedores = listarVendedoresBD();
									$cliente_vendedor = cliente_vendedorBD($_POST['i_idcliente']);
									?>
									<select multiple id="r_vendedor" class="full-width">
										<?php
										for ($i=0; $i < sizeof($vendedores); $i++) { 
											$activo = FALSE;
											for($j = 0; $j< sizeof($cliente_vendedor); $j++){
												if ($vendedores[$i]['i_idvendedor'] == $cliente_vendedor[$j]['i_idvendedor']) {
													$activo = TRUE;
													break;
												}
											}
										?>
										<option <?php if($activo) echo 'SELECTED'; ?> value="<?php echo $vendedores[$i]['i_idvendedor']; ?>">
											<?php echo $vendedores[$i]['v_nombre'] . ' ' . $vendedores[$i]['v_apellido']; ?>
										</option>
										<?php
									       }
										?>
									</select>
								</p>								
								<p class="colx2-right">
									<label for="complex-en-subtitle">Dirección:</label>
									<textarea name="form_hk" id="v_direccion" maxlength="100" class="full-width"><?php echo $datosCliente['v_direccion']; ?></textarea>
								</p>
							</div>        
							<div class="columns">
								<p class="colx2-left">
									<button type="button" onclick="actualizaCliente(<?php echo $_POST['i_idcliente']; ?>);">Actualizar</button>
									<input class="boton_css" type="button" onclick="location.href='<?php echo $SERVER . 'admin/index.php'; ?>'" value="Cancelar">
								</p>
							</div>
						</form>
					</div>	
			</div> 
			<?php
		}
		else if ($tarea == 'actualizaCliente') {
			$i_idcliente = $_POST['i_idcliente'];
			$v_nombre = $_POST['v_nombre'];
			$v_apellido = $_POST['v_apellido'];
			$v_email = $_POST['v_email'];
			$v_telefono = $_POST['v_telefono'];
			$v_ciudad = $_POST['v_ciudad'];
			$v_cedula = $_POST['v_cedula'];
			$v_direccion = $_POST['v_direccion'];
			$r_vendedor = $_POST['r_vendedor'];

			actualizaClienteBD($i_idcliente,$v_nombre,$v_apellido,$v_email,$v_telefono,$v_ciudad,$v_cedula,$v_direccion);

			if ($r_vendedor != '') {
				$r_vendedor = explode(',', $r_vendedor);
				eliminarRelacionClienteBD($i_idcliente);

				for ($i=0; $i < sizeof($r_vendedor); $i++)
					r_cliente_vendedorBD($i_idcliente, $r_vendedor[$i]);
			}
			else				
				eliminarRelacionClienteBD($i_idcliente);
			?>
			<div class="block-border">
				<form class="block-content form" id="table_form" method="post" action="#">
					<h1>Cliente actualizado</h1>
					<p style="text-align:center; font-size: 20px; margin-top:10px;">Se ha modificado con éxito el cliente</p>
					<br>
					<div style="text-align:center;">
						<button type="button" onclick="window.location='<?php echo $SERVER; ?>admin/index.php'">
							Volver
						</button>
					</div>
				</form>
			</div>
			<?php
		}
		else if ($tarea == 'listarVendedores') {
			?>
		  	<div id="listarVendedores">
		  		<?php $listarVendedores = listarVendedoresBD(); ?>
		  		<div class="block-border">
		  			<form class="block-content form" id="table_form" method="post" action="#">
		  				<h1>Lista de Vendedores</h1>
		  				<table class="table sortable no-margin" cellspacing="0" width="100%">
		  					<thead>
		  						<tr>
		  							<th class="alineando_td" scope="col">Nombre</th>
		  							<th class="alineando_td" scope="col">Apellido</th>
		  							<th class="alineando_td" scope="col">Cédula</th>
		  							<th class="alineando_td" scope="col">Teléfono</th>
		  						</tr> 
		  					</thead>
		  					<tbody>
		  						<?php
		  						for ($i=0; $i < sizeof($listarVendedores); $i++) { 
		  							?>						
		  							<tr>
		  								<td class="alineando_td"><?php echo $listarVendedores[$i]['v_nombre'];?></td>
		  								<td class="alineando_td"><?php echo $listarVendedores[$i]['v_apellido'];?></td>
		  								<td class="alineando_td"><?php echo $listarVendedores[$i]['v_cedula'];?></td> 
		  								<td class="alineando_td"><?php echo $listarVendedores[$i]['v_telefono'];?></td>
		  							</tr>
		  							<?php  }  ?>
		  						</tbody>
		  					</table>
		  				</div>
		  			</form>
		  		</div>
		  	</div>	
		  </div>
		  <?php
		}
		else if ($tarea=="addVendedor") {
			?>
			  <div class="container_12">
					<div class="block-border">
						<form class="block-content form" name="formVendedor" action="#">
							<h1>Agregar Vendedor</h1>
							<div class="columns">
								<p class="colx2-left">
									<label for="complex-en-subtitle">Nombre:</label>
									<input type="text" name="form_hk" id="v_nombre" maxlength="100" value="" class="full-width">
								</p>
								<p class="colx2-right">
									<label for="complex-en-subtitle">Apellido:</label>
									<input type="text" name="form_hk" id="v_apellido" maxlength="100" value="" class="full-width">
								</p>
							</div>
							<div class="columns">
								<p class="colx2-left">
									<label for="complex-en-subtitle">Cédula:</label>
									<input type="text" name="form_hk" id="v_cedula" maxlength="50" value="" class="full-width">
								</p>
								<p class="colx2-right">
									<label for="complex-en-subtitle">Teléfono:</label>
									<input type="text" name="form_hk" id="v_telefono" maxlength="10" value="" class="full-width">    
								</p>
							</div>         
							<div class="columns">
								<p class="colx2-left">
									<button type="button" onclick="saveVendedor();">Crear</button>
									<input class="boton_css" type="button" onclick="location.href='<?php echo $SERVER . 'admin/vendedores.php'; ?>'" value="Cancelar">
								</p>
							</div>
						</form>
					</div>	
			</div> 
			<?php
		}
		else if ($tarea == 'saveVendedor') {
			$v_nombre = $_POST['v_nombre'];
			$v_apellido = $_POST['v_apellido'];
			$v_telefono = $_POST['v_telefono'];
			$v_cedula = $_POST['v_cedula'];

			$i_idcliente = saveVendedorBD($v_nombre,$v_apellido,$v_telefono,$v_cedula);
			?>
			<div class="block-border">
				<form class="block-content form" id="table_form" method="post" action="#">
					<h1>Vendedor agregado</h1>
					<p style="text-align:center; font-size: 20px; margin-top:10px;">Se ha agregado con éxito el vendedor</p>
					<br>
					<div style="text-align:center;">
						<button type="button" onclick="window.location='<?php echo $SERVER; ?>admin/vendedores.php'">
							Volver
						</button>
					</div>
				</form>
			</div>
			<?php
		}
	}
	?>