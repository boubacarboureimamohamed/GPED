<?php


try

    {
       $maConnexion = new PDO('mysql:host=localhost;dbname=mydatabase;charset=utf8', 'root', '');
    }

catch (Exception $e)


    {
       die('Erreur : ' . $e->getMessage());
    }


?>