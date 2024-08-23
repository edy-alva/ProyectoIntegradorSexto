<?php
//TODO: Clase de ActividadComercio
require_once('../config/comun.php');

class ActividadComercio
{
    //TODO: Implementar los metodos de la clase ActividadComercio
    public $tabla;

    public function __construct()
    {
        $this->tabla = new ClaseTabla("actividadcomercio","id_actividadcomercio");
        $this->tabla->AgregarCampo("id_actividad");
        $this->tabla->AgregarCampo("id_comercio");
        $this->tabla->AgregarCampo("costo");
    }
    public function todos() 
    {
        $datos = $this->tabla->DevolverTodos();
        return $datos;
    }
    public function uno($id_actividadcomercio) 
    {
        $datos = $this->tabla->DevolverUno($id_actividadcomercio);
        return $datos;
    }
    public function insertar($id_actividad,$id_comercio,$costo) 
    {
        $valores = array($id_actividad,$id_comercio,$costo);
        return $this->tabla->InsertarRegistro($valores);
    }
    public function actualizar($id_actividadcomercio, $id_actividad,$id_comercio,$costo ) 
    {
        $valores = array($id_actividad,$id_comercio,$costo);
        return $this->tabla->ActualizarRegistro($id_actividadcomercio, $valores);
    }
    public function eliminar($id_actividadcomercio) 
    {
        $this->tabla->EliminarRegistro($id_actividadcomercio);
    }
}