<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>
<?php 
   if(isset($_SESSION['user_role'])){
       if($_SESSION['user_role']!=='admin'){
           header('location: ../index.php');
       }
   }else{
       header('location: ../index.php');
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
        #bulkOptionContainer{
            padding: 0px;
        }
        
        #load-screen {   
        background: url(images/header-back.png);
        position: fixed;
        z-index: 10000;
        top:0px;
        width: 100%;
        height: 1600px;
        }


        #loading {

        width: 500px;
        height: 500px;
        margin: 10% auto;
        background: url(images/loader.gif);
        background-size: 40%;
        background-repeat: no-repeat;
        background-position: center;

        }

    </style>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   <!--google charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <!--CKEditor-->
   <script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>
   
</head>

<body>
