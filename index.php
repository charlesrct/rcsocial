<?php
require_once("class/trabajo.php");
$tra=new Trabajo();

if( isset($_GET["pos"])) 
{
	$inicio=$_GET["pos"];
}else 
{
	$inicio=0;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" >
<title>Mi web</title>

<link href="css/estilos.css" type="text/css" rel="stylesheet">

<script type="text/javascript" language="javascript" src="js/funciones.js" ></script>

</head>
<body>

<div id="encabezado"></div>

<div id="cuerpo">
<div id="contenido"> 
<br>
Bienvenidos a mi p&aacute;gina personal dedicada a compartir en internet mis conocimientos en PHP, MySQL, CSS, JavaScript y HTML. Creada con el &aacute;nimo de ense&ntilde;ar el m&eacute;todo para crear una web din&aacute;mica desde cero.
<br><br>
<hr>

<?php 
	$datos=$tra->get_articulo($inicio);
	for($i=0;$i<sizeof($datos);$i++) 
	{
		$texto=str_replace(" ", "-", $datos[$i]["titulo"]);
		$usuario=$tra->get_nombre_usuario($datos[$i]["id_usuario"]);
		$categoria=$tra->get_categoria($datos[$i]["id_categoria"]);
?>

	<div class="articulo">
		<h2><a href="<?php echo "$texto/".$datos[$i]["id_articulo"]."/"; ?>" > <?php echo $datos[$i]["titulo"]; ?>  </a> </h2>
		<p><span class="date"> <?php echo $datos[$i]["fecha_publicacion"]; ?> </span> <span class="posted"> <?php echo $usuario ?> </span> </p>
		<div style="clear: both;">&nbsp;</div>
		<div class="entry">
			<p> <?php echo substr($datos[$i]["descripcion"],0,300); ?>... </p>
			<p class="links"><a href="#" >Leer Más</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
			Categoría <a href="#" > <?php echo $categoria ?> </a></p>		
		</div>
		
	</div>
<?php 
	}
?>
	<hr />
	<?php 
		if ($inicio>=10)
		{
			$anterior=$inicio-10;
	?>
		<a href="?pos=<?php echo $anterior;?>" > Anterior </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php
		}else 
		{
	?>
		<a href="javascript:void(0);" > Anterior </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php			
		}
	?>
	<?php
		if (count($datos)==10)
		{
			$proximo=$inicio+10;
	?>
		<a href="?pos=<?php echo $proximo; ?>" > Siguiente </a>
	<?php
		}else 
		{
	?>
		<a href="javascript:void(0);" > Siguiente </a>
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