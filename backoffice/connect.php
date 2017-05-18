<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 16/05/2017
 * Time: 14:56
 */



    // include('connexion.php');
  try
  {
      // $pdo = new PDO('mysql:host=alexisleznalexba.mysql.db;dbname=alexisleznalexba;charset=utf8', 'alexisleznalexba', 'Amla7793');
      $pdo = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', 'root');
  }
  catch(PDOException $exception)
  {
      die('Erreur : '.$exception->getMessage());
  }

  $pdo->exec("SET NAMES UTF8");
