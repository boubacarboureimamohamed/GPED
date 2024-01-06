<?php 
     session_start(); 
?>
<?php 
           // Connexion à la base de donnés
           include('connect.php');
           if(isset($_POST)){
   try{
         //Prépation de la requête
        $stmt = $maConnexion->prepare('INSERT INTO user (username, password, statut) VALUES (:username, :password, :statut)');
         
         //Définition des paramètres et Récupération des données du formulaire et affectation des valeurs aux paramètres de la requête
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':statut', $_POST['statut']);
          
          // Exécution de la requête
         if($stmt->execute())
           {
                //Message de confirmation!!!
             echo "<script> alert(\"L'enregistrement a été effectué avec succé!!!\")</script>";
             header('location:../../index2.php');
           }
        else
           {  
               //Message d'erreur!!!
             echo "<script> alert(\"L'enregistrement a échoué,  Veuillez saisir à nouveau!!!\")</script>";
           }

        
      }
      catch (PDOException $e)
          {
                 //ERROR!!!
             die('ERROR: ' . $exception->getMessage());
          }
          }
      
?>