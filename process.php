<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="refresh" content="900"> <!-- Refresh every 15 minutes -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lending Slip Printer | ALMA</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

  </head>

  <body id="page-top">

<?php
  
  $msg = "Lending Slip Printer | ALMA";
  
?>


<?php

  $request = file_get_contents($_FILES["Report_File"]["tmp_name"]);
  $requestxml2 = new SimpleXMLElement($request);

  $requestxml = $requestxml2;

  session_start();  
  $_SESSION["xml_report"] = $request;
  $_SESSION["owner"] = @$_POST["owner"];

  $url = "preview.php";
  header( "Location: $url" ); 
?>



  </body>

</html>
