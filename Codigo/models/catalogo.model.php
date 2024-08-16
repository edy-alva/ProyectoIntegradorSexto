<?php
//TODO: Clase de Catalogo
require_once('../config/comun.php');

class Catalogo
{
    //TODO: Implementar los metodos de la clase Catalogo
    public $tabla;

    public function __construct()
    {
        $this->tabla = new ClaseTabla("catalogo","idcatalogo");
        $this->tabla->AgregarCampo("detalle");
        $this->tabla->AgregarCampo("idtipo");
        $this->tabla->AgregarCampo("valor");
    }

    public function todos() 
    {
        $datos = $this->tabla->DevolverTodos();
        return $datos;
    }

    public function uno($idcatalogo) 
    {
        $datos = $this->tabla->DevolverUno($idcatalogo);
        return $datos;
    }

    public function insertar($detalle, $idtipo, $valor) 
    {
        $valores = array($detalle, $idtipo, $valor);
        return $this->tabla->InsertarRegistro($valores);
    }
    public function actualizar($id_catalogo, $detalle, $idtipo, $valor) 
    {
        $valores = array($detalle, $idtipo, $valor);
        return $this->tabla->ActualizarRegistro($id_catalogo, $valores);
    }
    public function eliminar($id_catalogo) 
    {
        $this->tabla->EliminarRegistro($id_catalogo);
    }
}