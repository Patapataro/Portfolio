<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php"?>
<?php include "functions.php";?>
<?php
if(!isset($_SESSION['user_role'])){

header("Location: ../index.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  
  <link href="css/styles.css" rel="stylesheet"> 
  <!--  jquey-->
  <script src="../js/jquery/jquery.min.js"></script>
  <!-- google chart-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Tiny for editer -->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script src="js/scripts.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">