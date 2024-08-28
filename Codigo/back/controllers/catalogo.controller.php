<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de CATALOGOS
require_once('../models/catalogos.model.php');
//error_reporting(0);
$catalogos = new Catalogos;

switch ($_GET["op"]) {
        //TODO: operaciones de catalogos

    case 'todos': //TODO: Procedimiento para cargar todos los datos del catalogos
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase catalogos.model.php
        
        $datos = $catalogos->todos(); // Llamo al metodo todos de la clase catalogos.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $idcatalogos = $_POST["idcatalogos"];
        $datos = array();
        $datos = $catalogos->uno($idcatalogos);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un catalogos en la base de datos
        $detalle = $_POST["detalle"];
        $idtipo = $_POST["idtipo"];
        $valor = $_POST["valor"];
        $datos = array();
        $datos = $catalogos->insertar($detalle, $idtipo, $valor);
        //echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un Catalogos en la base de datos
        $idcatalogo = $_POST["idcatalogo"];
        $detalle = $_POST["detalle"];
        $idtipo = $_POST["idtipo"];
        $valor = $_POST["valor"];
        $datos = array();
        $datos = $catalogos->actualizar($idcatalogo, $detalle, $idtipo, $valor);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un catalogos en la base de datos
        $idcatalogo = $_POST["idcatalogo"];
        $datos = array();
        $datos = $catalogos->eliminar($idcatalogo);
        echo json_encode($datos);
        break;
}