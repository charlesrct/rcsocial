<?php
require_once("class.php");

class Trabajo
{
	private $articulo;
	
	public function __construct() 
	{
		$this->articulo=array();
	}
	
public function get_articulo($inicio) 
	{
		$sql="select "
			." id_articulo,titulo,descripcion,fecha_publicacion,id_usuario,id_categoria"
			." from articulos order by id_articulo desc limit $inicio,10";
		//echo $sql;
		$result=mysql_query($sql,Conectar::conect());
		while($reg=mysql_fetch_assoc($result)) 
		{
			$this->articulo[]=$reg;
		}
		return $this->articulo;
	}
public function get_id_articulo($id_articulo) 
	{
		$sql="select "
			." id_articulo,titulo,descripcion,fecha_publicacion,id_usuario,id_categoria"
			." from articulos where id_articulo=$id_articulo";
		$result=mysql_query($sql,Conectar::conect());
		while($reg=mysql_fetch_assoc($result)) 
		{
			$this->articulo[]=$reg;
		}
		return $this->articulo;
	}
public function get_video_articulo($id_articulo) 
	{
		$sql="select video from videos_articulos where id_articulo=$id_articulo";
		$result=mysql_query($sql,Conectar::conect());
		while($reg=mysql_fetch_array($result)) 
		{
			$video=$reg["video"];
		}
		return $video;
	}
public function get_nombre_usuario($id_usuario) 
	{
		$sql="select nombre from usuarios where id_usuario=$id_usuario";
		$result=mysql_query($sql,Conectar::conect());
		while($reg=mysql_fetch_array($result)) 
		{
			$nom=$reg["nombre"];
		}
		return $nom;
	}
public function get_categoria($id_categoria) 
	{
		$sql="select categoria from categorias where id_categoria=$id_categoria";
		$result=mysql_query($sql,Conectar::conect());
		while($reg=mysql_fetch_array($result)) 
		{
			$cat=$reg["categoria"];
		}
		return $cat;
	}

}

?>