<?php
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

    $id=0;
    $update= false;
    $name = '';
    $location = '';
    $telefone ='';
    $email='';

    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        

        $mysqli->query("INSERT INTO data1(name, location, telefone, email) VALUES('$name', '$location', '$telefone', '$email')") or die($mysqli->error);

        $_SESSION['message'] = "Record has been saved";
        $_SESSION['msg_type'] = "Success";

        header("location: oração.php");

    }


    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data1 WHERE id=$id") or die($mysqli->error);

        $_SESSION['message'] = "Record has been deleted";
        $_SESSION['msg_type'] = "Danger";

        header("location: oração.php");
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM data1 WHERE id=$id") or die($mysqli->error);
        if(count(array($result))==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
        $telefone = $row['telefone'];
        $email = $row['email'];
    }
    }

        if(isset($_POST['update'])){
            $id= $_POST['id'];
            $name= $_POST['name'];
            $location= $_POST['location'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];

            $mysqli->query("UPDATE data1 SET name='$name', location='$location', telefone='$telefone', email='$email' WHERE id=$id") or die($mysqli->error);

            $_SESSION['message'] = "Record has been updated";
            $_SESSION['msg_type'] = "warning";

            header('location: oração.php');
        }
?>
