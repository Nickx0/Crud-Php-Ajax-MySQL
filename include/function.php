<?php
    include('conection.php');
    function insertdata(){
        try{
            $usr = $_POST['Uname'];
            $dom = $_POST['Domi'];
            $dis = $_POST['Distri'];
            $tel = $_POST['Phone'];
            $objCon = new Conexion();
            $sql = "INSERT INTO registrados (`nombre`, `domicilio`, `distrito`, `telefono`) VALUES (:user,:dim,:dis,:tel);";
            $conexion=$objCon->getConexion();
            $conexion=$conexion->prepare($sql);
            $result=$conexion->execute(['user'=>$usr,'dim'=>$dom,'dis'=>$dis,'tel'=>$tel]);
            echo 'Se registro Exitosamente al Usuario, puede cerrar la pestaña';
        }catch(Exception $e){
            echo 'Ocurrio un error inesperado, pruebe a cambiar algunos datos';
        };
    };
?>
<?php
    function displayview(){
        $objCon = new Conexion();
        $query = 'SELECT * FROM REGISTRADOS';
        $rs=$objCon->getConexion()->query($query);
        $val=1;
        while($fila=$rs->fetch()){       
?>
                <tr>
                    <td id="<?php echo $val; ?>"><?php echo $fila[0]; ?></td>
                    <td><?php echo $fila[1]; ?></td>
                    <td><?php echo $fila[2]; ?></td>
                    <td><?php echo $fila[3]; ?></td>
                    <th><button type="button" class="btn btn-warning" id="btn-edit" dataid="<?php echo $val; ?>">Editar</button> <button type="button" class="btn btn-danger" id="btn-delete" dataid="<?php echo $val; ?>">Eliminar</button></th>
                </tr>
<?php 
$val++;}
}
function get_data(){
    $dis = $_POST['usn'];
    $objCon = new Conexion();
    $qrs="SELECT * FROM REGISTRADOs WHERE nombre='$dis'";
    $rsx=$objCon->getConexion()->query($qrs);
    while($filax=$rsx->fetch()){
        $datauser[0]=$filax[0];
        $datauser[1]=$filax[1];
        $datauser[2]=$filax[2];
        $datauser[3]=$filax[3];
    };
    echo json_encode($datauser);
};

function update(){
    try{
        $userid = $_POST['userid'];
        $usr = $_POST['user'];
        $dom = $_POST['domi'];
        $dis = $_POST['distrit'];
        $tel = $_POST['telf'];
        $objCon = new Conexion();
        $sql = "UPDATE Registrados SET nombre = :user,domicilio=:dim,distrito=:dis,telefono=:tel WHERE nombre=:userid";
        $conexion=$objCon->getConexion();
        $conexion=$conexion->prepare($sql);
        $result=$conexion->execute(['user'=>$usr,'dim'=>$dom,'dis'=>$dis,'tel'=>$tel,'userid'=>$userid]);
        echo 'Se actualizo exitosamente, puede cerrar la pestaña';
    }catch(Exception $e){
        echo 'Ocurrio un error inesperado, pruebe a cambiar algunos datos';
    };
};
function get_data_dl(){
    $dis = $_POST['name'];
    $objCon = new Conexion();
    $qrs="SELECT * FROM REGISTRADOs WHERE nombre='$dis'";
    $rsx=$objCon->getConexion()->query($qrs);
    while($filax=$rsx->fetch()){
        $datauser[0]=$filax[0];
        $datauser[1]=$filax[1];
        $datauser[2]=$filax[2];
        $datauser[3]=$filax[3];
    };
    echo json_encode($datauser);
};
function data_dl(){
    $del = $_POST['del'];
    $objCon = new Conexion();
    $delite="DELETE FROM `registrados` WHERE `registrados`.`nombre` = :del;";
    $conexion=$objCon->getConexion();
    $conexion=$conexion->prepare($delite);
    $conexion->execute([':del'=>$del]);
    echo 'Se elimino exitosamente la columna';
}











?>

