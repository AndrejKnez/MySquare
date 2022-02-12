<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['stiglo']){
            require '../../../config/connection.php';
            $id = $_POST['id'];
            if($conn){
                $upit = "DELETE FROM review WHERE reviewid = :id";
                $delete = $conn->prepare($upit);
                $delete->bindParam(":id",$id);
                try{
                    $uspeh = $delete->execute();
                    if($uspeh){
                        echo "Comment deleted successfully";
                    }
                    else{
                        echo "Error";
                    }
                }
                catch(PDOException $mssg){
                    echo $mssg;
                }
            }
        }
        else{
            header('Location:../../../index.php');
        }
    }
    else{
        header('Location:../../../index.php');
    }
?>