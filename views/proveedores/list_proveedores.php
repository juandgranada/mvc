<?php
    include_once '../proveedores/header.php';
    include_once '../../controllers/ProveedorController.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title>Proveedores</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <?php
        // Se crea una instancia de la clase PacienteControl
        $proveedor_obj = new ProveedorController();
        // Se llama al método que lista a todos los pacientes
        $proveedores = $proveedor_obj->list_proveedores();
        $pro = new ProveedorController();
    ?>
    <div class="container">
        <h1>Gestionar Proveedores</h1>
        
        <div class="row">
            <div class="col-1">ID</div>
            <div class="col-3">Nombre</div>
            <div class="col-4">Direccion</div>
            <div class="col-3">Opciones</div>
        </div><br>
        <form method="post">
        <div class="row">
            <div class="col-1">
                <input type="number" class="form-control" name="id">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" name="nombre_proveedor">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" name="direccion">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-success" name="create"><img src="../../images/agregar.png" width="24"></button>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-warning" name="view"><img src="../../images/ver.png" width="24"></button>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary" name="update"><img src="../../images/editar.png" width="24"></button>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-danger" name="delete"><img src="../../images/basura.png" width="24"></button>
            </div>
        </div><br>
        <?php foreach ($proveedores as $item) {?>
        <div class="row">
            <div class="col-1"><?php echo $item->id; ?></div>
            <div class="col-3"><?php echo $item->nombre_proveedor; ?></div>
            <div class="col-4"><?php echo $item->direccion; ?></div>
        </div><br>
        <?php }?>
        </form>
        <?php
            if(isset($_POST['create']))
            {
                $pro->create($_POST["id"],$_POST["nombre_proveedor"],$_POST["direccion"]);
                echo "<script>alert('Proveedor creado exitosamente')</script>";
            }
            if(isset($_POST['update']))
            {
                $pro->update($_POST['id'],$_POST['nombre_proveedor'],$_POST['direccion']);
                echo "<script>alert('Proyecto actualizado exitosamente')</script>";
            }
            if(isset($_POST['delete']))
            {
                $pro->delete($_POST['id']);
                echo "<script>alert('El proveedor ha sido eliminado')</script>";
                header("location ../../list_proveedores.php");
            }
        ?>
    </div>
    <br>
    <div class="container-fluid backg1">FOOTER</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
