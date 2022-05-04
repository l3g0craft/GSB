<?php
    include '../fonctiongenevisiteur.php';
    
    session_start();
    if(isset($_GET['username']) && isset($_GET['password'])){
        $cnxBDD= connexion();

        $username=$_GET['username'];
        $password=$_GET['password'];

        if($username !== "" && $password !== ""){
            $requete = "SELECT count(*) AS existe FROM comptable WHERE 
                username = '$username' AND mdp = '$password';";
            
            $result = $cnxBDD->query($requete);
            $row=mysqli_fetch_assoc($result);
            $existe=$row['existe'];
            echo $existe;
            if($existe==1) // nom d'utilisateur et mot de passe correctes
            {
                $_SESSION['username'] = $username;
                header('Location: ../Direction.html');
            }
            else
            {
                header('Location: connexion.html');            }
        }else{
            header('Location: connexion.html');
        }
        $cnxBDD->close();
    }


?>