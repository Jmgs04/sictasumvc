<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (!$_SESSION['user_type']) {
        header("Location: index.php");
    }
//session_start();
        $rol = ($_SESSION['user_type']);
        $id_usuario=($_SESSION['user_id']);
        $acceso=($_SESSION['acceso']);
        $entrada=( $_SESSION['entrada']);
        $usuario=( $_SESSION['username']);
       
        //echo $id_user;;

?>
<!DOCTYPE html>
<html lang="es" ng-app="angularTable">
	<head>        
        <meta charset="utf-8" />
		<title>SICTASU</title>
		<meta name="description" content="Sistema de control y pago de tasa de uso">
		<meta name="keywords" content="terminal, buses, control">
		<link rel="icon" type="image/png" href="assets/images/favicon.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!--<link rel="stylesheet" href="assets/css/css/skins/_all-skins.min.css">-->


        <!-- STYLES MODAL
        <link rel="stylesheet" href="assets/css/ngDialog.css">
        <!-- END STYLES MODAL -->
        <link rel="stylesheet" href="assets/css/style.css" />       
        
        <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- CUSTOM SCRIPTS   -->     
        <!-- SCROLLING SCRIPTS PLUGIN  -->
    
   <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- <script src="assets/js/angular/angular.js"></script>
	<script src="assets/js/dirPagination.js"></script>
	<script src="assets/js/app/app.js"></script>/>
       <link type="text/css" href="assets/css/demo_table.css" rel="stylesheet">-->
<style>
  .bg-violet{
    background-color: #FF99CC;
    color: #fff;
  }
</style>
	</head>
    <body>
    <!-- Navbar -->
 	<?php require("view/templates/menu.php"); ?>
    <!-- end navbar -->   
    <div class="container">