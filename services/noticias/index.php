<?php
header('Content-Type: application/json');

require_once dirname(__FILE__) . "/../class/PDOSenacExample.php";
require_once dirname(__FILE__) . "/../class/Noticias.php";

$noticias = new Noticias();

switch($_SERVER['REQUEST_METHOD']){
	case "POST":
		$dados = json_decode(file_get_contents("php://input"), true);
		echo json_encode($noticias->save($dados));
		break;

	case "PUT":
		$dados = json_decode(file_get_contents("php://input"), true);
		echo json_encode($noticias->edit($dados));
		break;

	case "GET":
		if(!isset($_GET['id'])){
			echo json_encode($noticias->all());
		}else{
			echo json_encode($noticias->get((int) $_GET['id']));
		}
		break;

	case "DELETE":
		if(isset($_GET['id'])){
			echo json_encode($noticias->remove((int) $_GET['id']));
		}
		break;
}