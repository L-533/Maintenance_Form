<?php

include("connection.php");

$t_documento = $_POST["txtt_documento"];
$documento = $_POST["txtdocumento"];
$p_nombre = $_POST["txtp_nombre"];
$s_nombre = $_POST["txts_nombre"];
$p_apellido = $_POST["txtp_apellido"];
$s_apellido = $_POST["txts_apellido"];
$f_nacimiento = $_POST["txtf_nacimiento"];

	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{
		header("Location: main.php");
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	
	{
	$sqlgrabar = "INSERT INTO clientes(tipo_documento, documento, p_nombre, s_nombre, p_apellido, s_apellido , fecha_nacimiento) values ('$t_documento','$documento','$p_nombre','$s_nombre', '$p_apellido', '$s_apellido', '$f_nacimiento')";

if(mysqli_query($conn,$sqlgrabar))
{
	header("Location: main.php");
}else 
{
	echo "Error: " . $sqlgrabar."<br>".mysqli_error($conn);
}
		
		
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificardatos']))
	
	{
			$sqlmodificar = "UPDATE clientes SET tipo_documento= '$t_documento', p_nombre='$p_nombre', s_nombre='$s_nombre', p_apellido='$p_apellido', s_apellido='$s_apellido' , fecha_nacimiento='$f_nacimiento' WHERE documento= $documento";

if(mysqli_query($conn,$sqlmodificar))
{
	header("Location: main.php");
}else 
{
	echo "Error: " .$sqlmodificar."<br>".mysqli_error($conn);
}
		
		
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminardatos']))
	
	{
		    
			$sqleliminar = "DELETE FROM clientes WHERE documento= $documento";

if(mysqli_query($conn,$sqleliminar))
{
	header("Location: main.php");
}else 
{
	echo "Error: " .$sql."<br>".mysqli_error($conn);
}
		
		
	}

?>