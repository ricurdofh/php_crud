<?php
	session_start();
	include_once('../variables.php'); 
	include_once('dbFunctions.php'); 
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
			<link href="../css/aporte.css" rel="stylesheet" type="text/css">
			<!-- Load either 960.gs.fluid or 960.gs to toggle between fixed and fluid layout -->
			<link href="../css/mini3537.css" rel="stylesheet" type="text/css">

			<!-- Modernizr for support detection, all javascript libs are moved right above </body> for better performance -->
			<script src="../js/libs/modernizr.custom.min.js"></script>
			<script type="text/javascript">
			var server = "<?php echo $SERVER; ?>";
			</script>
			<script src="administradorFunciones.js"></script>

		</head>

		<body onload="listarClientes();">
			<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
			<!--[if lt IE 9]><div class="ie"><![endif]-->
			<!--[if lt IE 8]><div class="ie7"><![endif]-->

			<!-- Header -->

			<!-- Server status -->
			<header>
				<div class="container_12">
					<div class="grid_4">
				</div>
				<div class="grid_8">
				</div>
			</div>
		</header>
		<!-- End server status -->

		<!-- Main nav -->
		<nav id="main-nav">		
			<ul class="container_12">
				<li class="current">
					<ul>
						<li class="current"><a href="index.php">Clientes</a></li>
						<li><a href="vendedores.php" title="Vendedores">Vendedores</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- End main nav -->

		<!-- Sub nav -->
		<div id="sub-nav"><div class="container_12">
		</div></div>
		<!-- End sub nav -->

		<!-- Status bar -->
		<div id="status-bar"><div class="container_12">
			<ul id="status-infos">
				<li><a href="<?php echo $SERVER; ?>admin/salir.php" class="button red" title="Salir"><span class="smaller">SALIR</span></a></li>
			</ul>

			<ul id="breadcrumb">
				<li id="agregar_clientes"><a href="javascript:void(0)" title="Agregar Usuario" onclick="addCliente();">Agregar Cliente</a></li>
			</ul>

		</div></div>
		<!-- End status bar -->

		<div id="header-shadow"></div>

		<!-- Content -->
		<article class="container_12">
			<section class="grid_12">
				<div id="saveCliente">
					<div id="addCliente">
						<div id="actualizaCliente">
							<div id="editCliente">
								<div id="eliminarCliente">
									<div id="listarClientes"></div>
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
				<a href="#top" class="button"><img src="../images/icons/fugue/navigation-090.png" width="16" height="16"> Ir Arriba</a>
			</div>

		</footer>

		<!-- Combined JS load -->
		<!--[if lte IE 8]><script src="../js/standard.ie.js"></script><![endif]-->

		<!-- Charts library -->
		<!--Load the AJAX API-->
		<script src="../js/minie721.php?files=libs/jquery-1.6.3.min,old-browsers,jquery.accessibleList,searchField,common,standard,jquery.tip,libs/jquery.hashchange,jquery.contextMenu,jquery.modal,list"></script>

		<script src="http://www.google.com/jsapi"></script>

		<!-- Combined JS load -->
		<script src="../js/minie721.php"></script>
		<script src="../js/mini5c1b.php"></script>
		<!-- Plugins -->
		<script  src="../js/libs/jquery.dataTables.min.js"></script>
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
					* We set specific options for each columns here. 
					* Some columns contain raw data to enable correct sorting, 
					* so we convert it for display
					* @url http://www.datatables.net/usage/columns
					*/
					aoColumns: [
					{ sType: 'string' },
					{ sType: 'string' },
					{ sType: 'string' },
					{ sType: 'string' },
					{ sType: 'string' },
					{ sType: 'string' },
					{ sType: 'string' },
					{ sType: 'numeric' },
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

	</html>
	<?php
	}
	else {
		header('Location: ' . $SERVER . 'login.php');
	}
	?>
