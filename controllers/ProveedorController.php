<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/models/ProveedorModel.php';



class ProveedorController extends Connection
{
    public function create($id,$nombre_proveedor, $direccion)
    {
        $proveedor_obj = new Proveedor($id,$nombre_proveedor, $direccion);
        $proveedor = $proveedor_obj->create();
        return $proveedor;
    }

    public function update($id, $nombre_proveedor, $direccion)
    {
        $proveedor_obj = new Proveedor($id, $nombre_proveedor, $direccion);
        $proveedor = $proveedor_obj->update($id);
        return $proveedor;
    }

    public function delete($id)
    {
       $proveedor_obj = new Proveedor($id);
       $proveedor=$proveedor_obj->delete();
       return $proveedor;
    }

    public function view($id)
    {

        $proveedor_obj = new Proveedor($id);
        $proveedor = $proveedor_obj->view();
        return $proveedor;
    }


    public function list_proveedores()
    {
        $proveedor_obj=new Proveedor();
        $proveedores= $proveedor_obj->getAll();
        return $proveedores;
    }


    public function select_proveedores($id)
    {
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM proveedores WHERE id = ?");
        $sql->bindParam(1, $id);

        // Ejecutamos
        $sql->execute();

        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase Proveedor
            $pro_obj = new Proveedor($row->id, $row->nombre_proveedor, $row->direccion);
        }else{
            $pro_obj = null;
        }
        return $pro_obj; // Se retorna el objeto de proveedores


    }
}



?>