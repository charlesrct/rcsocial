<?php
require_once("class/trabajo.php");
$tra=new Trabajo();

if(isset($_GET["id_articulo"])) 
{
	if(!is_numeric($_GET["id_articulo"])) 
	{
		header("Location: http://localhost/mi_web/index.php");
	}	
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" >
<title>Mi web</title>

<link href="<?php echo $path;?>css/estilos.css" type="text/css" rel="stylesheet">

<script type="text/javascript" language="javascript" src="<?php echo $path;?>js/funciones.js" ></script>

</head>
<body>

<div id="encabezado"></div>

<div id="cuerpo">
<div id="contenido"> 

<?php 
	$datos=$tra->get_id_articulo($_GET["id_articulo"]);
	for($i=0;$i<sizeof($datos);$i++) 
	{
		$usuario=$tra->get_nombre_usuario($datos[$i]["id_usuario"]);
		$categoria=$tra->get_categoria($datos[$i]["id_categoria"]);
		$video=$tra->get_video_articulo($_GET["id_articulo"]);
?>

	<div class="articulo">
		<h2><a href="#" > <?php echo $datos[$i]["titulo"]; ?>  </a> </h2>
		<p><span class="date"> <?php echo $datos[$i]["fecha_publicacion"]; ?> </span> <span class="posted"> <?php echo $usuario ?> </span> </p>
		<div style="clear: both;">&nbsp;</div>
		<div class="entry">
			<p> <?php echo $datos[$i]["descripcion"]?>	</p>
			
		<div id="video">
			<iframe src="http://blip.tv/play/<?php echo $video; ?>" width="550" height="442" frameborder="0" allowfullscreen></iframe><embed type="application/x-shockwave-flash" src="http://a.blip.tv/api.swf#<?php echo $video; ?>" style="display:none"></embed>		
		<hr />
		</div>			
			
			<p class="links"><a href="javascript:history.back(-1);" >Volver a la página anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
			Categoría <a href="#" > <?php echo $categoria ?> </a></p>		
		</div>
		
	</div>
<?php 
	}
?>


</div>

<div id="menu">
<?php include("menuv.php");?>
</div>
<div id="publicidad">
publicidad
</div>
<div style="clear: both;">&nbsp;</div>
</div>

<div id="pie_pag">
Desarrollado por RCsocial
</div>

</body>
</html>