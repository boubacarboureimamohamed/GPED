 <?php 
     session_start();  
?>
<?php 
      // Connexion à la base de donnés
           include('connect.php');

      if (isset($_POST["id_user"]))
{
         $ccc=$_POST['id_user'];
         $username=$_POST["username"];
         $password=$_POST["password"];
         $statut=$_POST["statut"];
     $req = $maConnexion->prepare("UPDATE user SET username=:username, password=:password, statut=:statut WHERE id_user='$ccc'");
$req->execute(array(

    'username' => $username,

    'password' => $password,

    'statut' => $statut  
    ));
      if($req->execute())
          {
            echo "<script> alert(\"La modification de cet enregistrement a été effectué avec succé!!!\")</script>";
            header('location:../../index2.php');
          }
      else
          {
            die('La modification a échoué, Réssayez à nouveau!!!.');
          }
     }
  ?>
  
