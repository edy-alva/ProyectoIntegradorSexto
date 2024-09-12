<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de TIPOSCATALOGOS
require_once('../models/tiposcatalogo.model.php');
//error_reporting(0);
$tiposcatalogo = new TiposCatalogo;

switch ($_GET["op"]) {
        //TODO: operaciones de tiposcatalogo

    case 'todos': //TODO: Procedimiento para cargar todos los datos del tiposcatalogo
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase tiposcatalogo.model.php
        
        $datos = $tiposcatalogo->todos(); // Llamo al metodo todos de la clase tiposcatalogo.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $id_tipocatalogo = $_POST["id_tipocatalogo"];
        $datos = array();
        $datos = $tiposcatalogo->uno($id_tipocatalogo);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un tiposcatalogo en la base de datos
        $tipo = $_POST["tipo"];
        $datos = array();
        $datos = $tiposcatalogo->insertar($tipo);
        //echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un TiposCatalogo en la base de datos
        $id_tipocatalogo = $_POST["id_tipocatalogo"];
        $tipo = $_POST["tipo"];
        $datos = array();

        $datos = $tiposcatalogo->actualizar($id_tipocatalogo, $tipo);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un tiposcatalogo en la base de datos
        $id_tipocatalogo = $_POST["id_tipocatalogo"];
        $datos = array();
        $datos = $tiposcatalogo->eliminar($id_tipocatalogo);
        echo json_encode($datos);
        break;
}