 <?php 
     session_start();  
?>
<?php
     // Connexion à la base de donnés
           include('connect.php');

      try 
     {
      //Récupération des données à supprimer
       $variable =isset($_GET['supression']) ? $_GET['supression'] : die('ERROR: Record id_user not found.');
       $query = "DELETE FROM user WHERE id_user = ?";
       $stmt = $maConnexion->prepare($query);
       $stmt->bindParam(1, $variable);
     
       if($stmt->execute())
         {
          header('location:../../index2.php');
         }
       else
         {
          die('La suppresion a échoué, Réssayez à nouveau!!!.');
         }
      }
      // error
    catch(PDOException $exception)
         {
          die('ERROR: ' . $exception->getMessage());
         }
?>