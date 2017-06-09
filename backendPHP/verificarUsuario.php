<?php

    try{
        $db_host = "localhost";
        $db_name = "byCarDB";
        $db_user = "root";
        $db_pass = "";

        $db=new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM usuarios WHERE nombreUsuario= :usuario AND password= :password";

        $res = $db->prepare($sql);

        $user = $_POST['usuario'];
        $pass = $_POST['password'];
        //enlazar los parametros a la instruccion sql
        $res->bindValue(":usuario", $user);
        $res->bindValue(":password", $pass);
        $res->execute();
        
        //numero de registros/filas que devuelve la instruccion anterior
        $nFilas = $res->rowCount();

        if($nFilas==1){ //El usuario existe...

            session_start();
            $_SESSION['usuarioActual'] = $_POST['usuario'];
            // Esta variable(array) contiene la informacion de usuario del usuario actual
            
            $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $user . "'";
            $res = $db->prepare($sql);
            $res->execute(array());
            $id = $res->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $id['id'];    
            // la id del usuario de la sesion actual
            
            $sql = "SELECT flag FROM usuarios WHERE nombreUsuario='" . $user . "'";
            $res = $db->prepare($sql);
            $res->execute(array());
            $flag = $res->fetch(PDO::FETCH_ASSOC);
            $_SESSION['flag'] = $flag['flag'];
            // el flag del usuario de la sesion actual
   

            if($flag['flag']==1){   // es conductor
                header("location: ../principalConductor.php");
            }
            else if($flag['flag']==0){  // es pasajero
                header("location: ../principalPasajero.php");
            }

        }else{
            header("location: ../login.php");
        }

    }
    catch(Exception $e){
        die("Fallo: " . $e->getMessage());
    }

?>


        

