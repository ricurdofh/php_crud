<?php
session_start();
include_once('../../variables.php'); //Include Environment variables
include_once('dbFunctions.php'); //Include Db functions
if ($_SESSION['sessi_tipo'] == 1) {
?>
<!doctype html>
  <!--[if lt IE 8 ]><html lang="en" class="no-js ie ie7"><![endif]-->
  <!--[if IE 8 ]><html lang="en" class="no-js ie"><![endif]-->
  <!--[if (gt IE 8)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
    <title>Clientes</title>
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Combined stylesheets load -->
    <link href="../../css/aporte.css" rel="stylesheet" type="text/css">
    <!-- Load either 960.gs.fluid or 960.gs to toggle between fixed and fluid layout -->
    <link href="../../css/mini3537.css" rel="stylesheet" type="text/css">
	
    <!-- Fechas UI -->
    <link href="../../fechajqueryui/css/redmond/jquery-ui.css" rel="stylesheet">
	<script src="../../fechajqueryui/js/jquery-1.9.1.js"></script>
	<script src="../../fechajqueryui/js/jquery-ui-1.10.3.custom.js"></script>
	<script>
		var j = jQuery.noConflict();
		j(function() {
		  j( ".fecha_prueba" ).datepicker({
		    changeMonth: true,
		    changeYear: true,
		    monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
		    dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
		    dateFormat: "yy-mm-dd"
		  });
		});	
		/*function mostrar_valor() {
			alert(document.getElementById('fecha_input').value);	
		}	*/
  	</script>
	
    <!-- Fin Fechas UI -->
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="icon" type="image/png" href="../favicon-large.png">
	
    <!-- Modernizr for support detection, all javascript libs are moved right above </body> for better performance -->
    <script src="../../js/libs/modernizr.custom.min.js"></script>
    <script type="text/javascript">
      var server = "<?php echo $SERVER; ?>";
    </script>
    <script src="administradorFunciones.js"></script>
	
  </head>

  <body onload="listarCargandoUsuarios2();">
    <!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
    <!--[if lt IE 9]><div class="ie"><![endif]-->
    <!--[if lt IE 8]><div class="ie7"><![endif]-->

    <!-- Header -->
	
    <!-- Server status -->
    <header>
      <div class="container_12">
        <div class="grid_4">
        	<p style=" float: left; font-size: 2em; color: #FFFFFF; margin-top: 30px; text-transform: none;"> FitnessXtreme </p>
        </div>
        <div class="grid_8">
          <div class="posicion_sup">
		    <p id="skin-name" style=" float: right; color: #FFFFFF; margin-top: 23px !important;">Aplicación de Salud<br> para un buena nutrición</p>
		    <!--<img class="logo_admin" src="../../images/FITNESS-logo.png" height="50px" width="50px" />-->
		  </div>
		</div>
	</div>
    </header>
    <!-- End server status -->

    <!-- Main nav -->
    <nav id="main-nav">		
      <ul class="container_12">
        <li class="current">
          <ul>
	  	    <li class="current"><a href="usuarios.php" title="Clientes">Clientes</a>
	  	    <li><a href="cuerpos.php" title="Cuerpos">Cuerpos</a>
	  	    <li><a href="dietas.php" title="Dietas">Dietas</a>
	  	    <li><a href="suplementos.php" title="Suplementos">Suplementos</a>
	  	    <li><a href="ejercicios.php" title="Ejercicios">Ejercicios</a>
	  	    <li><a href="administrador.php" title="Administración">Administración</a>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End main nav -->
	
    <!-- Sub nav -->
    <div id="sub-nav"><div class="container_12">
      <a href="#" title="Help" class="nav-button"><b>Ayuda</b></a>
      <form id="search-form" name="search-form" method="post" action="#">
        <input type="text" name="s" id="s" value="" title="Busqueda" autocomplete="off">
      </form>
    </div></div>
    <!-- End sub nav -->
	
    <!-- Status bar -->
    <div id="status-bar"><div class="container_12">
      <ul id="status-infos">
        <li class="spaced">Usuario: <strong><?php echo $_SESSION['sessv_nombre'];?></strong></li></li>
        <li><a href="<?php echo $SERVER; ?>admin/salir.php" class="button red" title="Salir"><span class="smaller">SALIR</span></a></li>
      </ul>

      <ul id="breadcrumb">
        <li id="agregar_usuarios"><a href="javascript:void(0)" title="Agregar Usuario" onclick="addFormUsuario2();">Agregar Cliente</a></li>
      </ul>
	
    </div></div>
    <!-- End status bar -->
	
    <div id="header-shadow"></div>

    <!-- Content -->
    <article class="container_12">
      <section class="grid_12">
        
        <div id="editPerfilUsuario">
          <div id="perfilFormUsuario"></div>
        </div>
        <div id="cerrar_administrar_contenido1"></div>
        <div id="cerrar_administrar_contenido2">
          <div id="listarContenido"></div>
          <div id="listarCargandoContenido"></div>
        </div>
        <div id="addUsuario">
	        <div id="addFormUsuario"></div>
	    </div>
	    <div id="addUsuario2">
		    <div id="refrescaDieta2">
			    <div id="verASignacionesUsuarios">
                      	    	<div id="addCampoBody72">
                                  <div id="addCampoBody32">
				    <div id="refrescaWorkout2">
					    <div id="refrescaSuplemento2">
					    	<div id="asignaFormSelectWorkout2">
						    	<div id="asignaFormSelectSupplement2">
			                                    <div id="addFormSelectBody2">
							    	<div id="asignaFormSelectDiet2">
									    <div id="addFormUsuario2">
										   	<div id="editFormUsuario2"> 	   	
									        <div id="activarUsuario2">
										        <div id="desactivarUsuario2">  	
										        	<!--<div><input id="fecha_input" class="fecha_prueba" type="text" />
										        		<input onclick="mostrar_valor();" id="fecha_input2" type="text" value="Mostrar valor" />
										        	</div>   -->     
											     	<div id="listarCargandoUsuarios2"></div>
											     </div>
											</div>
										    </div>
										</div>
									    </div>
									</div>
									</div>
								     </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	  
      </section>
      <div class="clear"></div>
    </article>
	
    <!-- End content -->
	
    <footer>
		
      <div class="float-right">
        <a href="#top" class="button"><img src="../../images/icons/fugue/navigation-090.png" width="16" height="16"> Ir Arriba</a>
      </div>
		
    </footer>
	
    <!-- Combined JS load -->
    <!--[if lte IE 8]><script src="../js/standard.ie.js"></script><![endif]-->
	
    <!-- Charts library -->
    <!--Load the AJAX API-->
    	<script src="../../js/minie721.php?files=libs/jquery-1.6.3.min,old-browsers,jquery.accessibleList,searchField,common,standard,jquery.tip,libs/jquery.hashchange,jquery.contextMenu,jquery.modal,list"></script>

    <script src="http://www.google.com/jsapi"></script>
	
    <!-- Combined JS load -->
    <script src="../../js/minie721.php"></script>
    <script src="../../js/mini5c1b.php"></script>
    <!-- Plugins -->
    <script  src="../../js/libs/jquery.dataTables.min.js"></script>
    <!-- Other setups -->
    <script>
    	// Example context menu
		$(document).ready(function()
		{
			// Context menu for all favorites
			$('.favorites li').bind('contextMenu', function(event, list)
			{
				var li = $(this);
				
				// Add links to the menu
				if (li.prev().length > 0)
				{
					list.push({ text: 'Move up', link:'#', icon:'up' });
				}
				if (li.next().length > 0)
				{
					list.push({ text: 'Move down', link:'#', icon:'down' });
				}
				list.push(false);	// Separator
				list.push({ text: 'Delete', link:'#', icon:'delete' });
				list.push({ text: 'Edit', link:'#', icon:'edit' });
			});
			
			// Extra options for the first one
			$('.favorites li:first').bind('contextMenu', function(event, list)
			{
				list.push(false);	// Separator
				list.push({ text: 'Settings', icon:'terminal', link:'#', subs:[
					{ text: 'General settings', link: '#', icon: 'blog' },
					{ text: 'System settings', link: '#', icon: 'server' },
					{ text: 'Website settings', link: '#', icon: 'network' }
				] });
			});
		});
	function refrescar () 
		{
			$('#s').tip({
				content: '',
				onHover: false
			});
			
			/*
			 * Table sorting
			 */
			
			// A small classes setup...
			$.fn.dataTableExt.oStdClasses.sWrapper = 'no-margin last-child';
			$.fn.dataTableExt.oStdClasses.sInfo = 'message no-margin';
			$.fn.dataTableExt.oStdClasses.sLength = 'float-left';
			$.fn.dataTableExt.oStdClasses.sFilter = 'float-right';
			$.fn.dataTableExt.oStdClasses.sPaging = 'sub-hover paging_';
			$.fn.dataTableExt.oStdClasses.sPagePrevEnabled = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPagePrevDisabled = 'control-prev disabled';
			$.fn.dataTableExt.oStdClasses.sPageNextEnabled = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageNextDisabled = 'control-next disabled';
			$.fn.dataTableExt.oStdClasses.sPageFirst = 'control-first';
			$.fn.dataTableExt.oStdClasses.sPagePrevious = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPageNext = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageLast = 'control-last';
		// Apply to table
			$('.sortable').each(function(i)
			{
				// DataTable config
				var table = $(this),
					oTable = table.dataTable({
						/*
						 * We set specific options for each columns here. Some columns contain raw data to enable correct sorting, so we convert it for display
						 * @url http://www.datatables.net/usage/columns
						 */
						aoColumns: [
							{ sType: 'string' },
							{ sType: 'string' },
							{ sType: 'string' },
							{ sType: 'string' },
							{ sType: 'numeric' },
							{ sType: 'string' },
							{ sType: 'string' },
							{ bSortable: false }
						],
						
						/*
						 * Set DOM structure for table controls
						 * @url http://www.datatables.net/examples/basic_init/dom.html
						 */
						sDom: '<"block-controls"<"controls-buttons"p>>rti<"block-footer clearfix"lf>',
						
						/*
						 * Callback to apply template setup
						 */
						fnDrawCallback: function()
						{
							this.parent().applyTemplateSetup();
						},
						fnInitComplete: function()
						{
							this.parent().applyTemplateSetup();
						}
					});
				
				// Sorting arrows behaviour
				table.find('thead .sort-up').click(function(event)
				{
					// Stop link behaviour
					event.preventDefault();
					
					// Find column index
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					// Send command
					oTable.fnSort([[columnIndex, 'asc']]);
					
					// Prevent bubbling
					return false;
				});
				table.find('thead .sort-down').click(function(event)
				{
					// Stop link behaviour
					event.preventDefault();
					
					// Find column index
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					// Send command
					oTable.fnSort([[columnIndex, 'desc']]);
					
					// Prevent bubbling
					return false;
				});
			});
		}
	function refrescar2 () 
		{
			$('#s').tip({
				content: '',
				onHover: false
			});
			
			/*
			 * Table sorting
			 */
			
			// A small classes setup...
			$.fn.dataTableExt.oStdClasses.sWrapper = 'no-margin last-child';
			$.fn.dataTableExt.oStdClasses.sInfo = 'message no-margin';
			$.fn.dataTableExt.oStdClasses.sLength = 'float-left';
			$.fn.dataTableExt.oStdClasses.sFilter = 'float-right';
			$.fn.dataTableExt.oStdClasses.sPaging = 'sub-hover paging_';
			$.fn.dataTableExt.oStdClasses.sPagePrevEnabled = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPagePrevDisabled = 'control-prev disabled';
			$.fn.dataTableExt.oStdClasses.sPageNextEnabled = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageNextDisabled = 'control-next disabled';
			$.fn.dataTableExt.oStdClasses.sPageFirst = 'control-first';
			$.fn.dataTableExt.oStdClasses.sPagePrevious = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPageNext = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageLast = 'control-last';
		// Apply to table
			$('.sortable').each(function(i)
			{
				// DataTable config
				var table = $(this),
					oTable = table.dataTable({
						/*
						 * We set specific options for each columns here. Some columns contain raw data to enable correct sorting, so we convert it for display
						 * @url http://www.datatables.net/usage/columns
						 */
						aoColumns: [
							{ sType: 'string' },
							{ sType: 'string' },
							{ sType: 'string' },
							{ sType: 'numeric' },
							{ sType: 'string' },
							{ sType: 'string' },
							{ bSortable: false }
						],
						
						/*
						 * Set DOM structure for table controls
						 * @url http://www.datatables.net/examples/basic_init/dom.html
						 */
						sDom: '<"block-controls"<"controls-buttons"p>>rti<"block-footer clearfix"lf>',
						
						/*
						 * Callback to apply template setup
						 */
						fnDrawCallback: function()
						{
							this.parent().applyTemplateSetup();
						},
						fnInitComplete: function()
						{
							this.parent().applyTemplateSetup();
						}
					});
				
				// Sorting arrows behaviour
				table.find('thead .sort-up').click(function(event)
				{
					// Stop link behaviour
					event.preventDefault();
					
					// Find column index
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					// Send command
					oTable.fnSort([[columnIndex, 'asc']]);
					
					// Prevent bubbling
					return false;
				});
				table.find('thead .sort-down').click(function(event)
				{
					// Stop link behaviour
					event.preventDefault();
					
					// Find column index
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					// Send command
					oTable.fnSort([[columnIndex, 'desc']]);
					
					// Prevent bubbling
					return false;
				});
			});
		}
		
    </script>	
  </body>
  <!--<script type="text/javascript" src="../../datepickr/datepickr.js"></script>
	<script type="text/javascript">
		//new datepickr('datepick');
		
		new datepickr('fecha_input', {
			'dateFormat': 'Y-m-d'
		});
		
		
	</script>-->
</html>
<?php	
}
else {
  header('Location: ' . $SERVER . 'login.php');
}
?>
