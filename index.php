<?php
    session_start(); 
?>
<?php
   if (isset ($_GET['action']))
     {
       $_SESSION['pseudo']="";
       $_SESSION['pass']="";
       $_SESSION['pseudo1']="";
       $_SESSION['pass1']="";
     }
   $pseudo="Admin@db"; 
   $pass="rootroot";
   $pseudo1="User02@DIF"; 
   $pass1="Only02DIF";
   $erreur="";
   if (isset($_POST['username']) && isset($_POST['password'])) 
     {
       if ($_POST['username']==$pseudo && $_POST['password']==$pass)
          {
            $_SESSION['pseudo']=$_POST['username'];
            $_SESSION['pass']=$_POST['password'];
            header("location:pages/admin/accueil.php");
          }
        else
          {
            echo "La connexion a échoué, username ou password incorrect!!! ";
          }
     }
     if (isset($_POST['username']) && isset($_POST['password'])) 
     {
       if ($_POST['username']==$pseudo1 && $_POST['password']==$pass1)
          {
            $_SESSION['pseudo1']=$_POST['username'];
            $_SESSION['pass1']=$_POST['password'];
            header("location:pages/users/achats/accueil.php");
          }
        else
          {
            echo "La connexion a échoué, username ou password incorrect!!! ";
          }
     }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'authentification</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
         <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

          <!-- Bootstrap core css --> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    	<div class="col-sm-12">
    		<div class="jumbotron">
    			<div class="form-group" id="logo">
                <h3><b>REPUBLIQUE DU NIGER</b></h3>
                   <img src="images/logo.png" alt="logo">
                <h4><b>MINISTERE DES FINANCES</b></h4>
                </div><hr>
                <form method="post" action="index.php" class="form-horizontal">
                	<div class="form-group input-group">
                    </div>
                	<div class="form-group input-group">
                         <span class="input-group-addon">
                         <span class="glyphicon glyphicon-user"></span>
                         </span>
                         <input type="email" name="username" placeholder="Nom d'utilisateur" class="form-control" required="" autocomplete="off">
                    </div>
                    <div class="form-group input-group">
                    </div>
                    <div class="form-group input-group">
                         <span class="input-group-addon">
                         <span class="glyphicon glyphicon-lock"></span>
                         </span>
                         <input type="password" name="password" placeholder="Mot de pass" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="form-group input-group">
                    </div>
                    <div class="form-group">
                         <input type="submit" name="" class="form-control" value="Se connecter" required="required" autocomplete="off">
                    </div>
                </form>
    	    </div>
    	</div>
    </div>
</body>
</html>