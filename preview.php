<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="refresh" content="600"> <!-- Refresh every 15 minutes -->
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

//  $request = file_get_contents($_FILES["Report_File"]["tmp_name"]);
//  $requestxml2 = new SimpleXMLElement($request);



  session_start(); 
  $request = @$_SESSION["xml_report"];

  if (@$_SESSION["xml_report"] != "") {

  $requestxml = new SimpleXMLElement($request);
  
  $key = "";
  $key = @$_COOKIE["key"];
  
  echo "<a href=index.php?owner=$key>Back To Homepage (Choose another XML file)</a><br><br>";

 
?>

            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
	  <label>Select lending request you want to print:</label>
<br><br>      

<?php
  $i = 0;
  foreach ($requestxml->items->Item as $Item){
    $full = $Item->external_request_id;
    echo '<a href=owner.php?id=' .  $i . '>' .  $full . " - " . $Item->title . '</a><br><br>';
    $i = $i+1;
  }

  } else {
    //echo "Press F5 refresh the site to load your XMP report file again !";
?>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>

<?php
  }

?>



  </body>

</html>
