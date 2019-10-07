<!DOCTYPE html>
<html lang="en">

  <head>

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

<style>

#mainNav, footer, .co, footer, .copyright, .star-dark, #simon {
  display: none;
}

.vertical-text {
	transform: rotate(90deg);
    margin-left: -250px;
    margin-top: 300px;
}

.vertical-text2 {
        transform: rotate(270deg);
    margin-top: 300px;
    margin-left: -210px;
}

table1{
   table-layout: fixed;
   width: 80%;
}

table td1 {
    text-align: center;
    vertical-align: middle;
    padding: 5px;
    position: relative;
}

body {
  font-size: 25px!important;
}


#left, #center, #right {
 
  float: left;

}

#left, #right {

  width:100px;

}

#left {
position: absolute;
    left: 0;
    top: 0;
}

#right {
  position: absolute;
  right: 0;
  top:0
}


#center {
position: absolute;
    left: 100px;
    top: 0;
padding-right: 100px;
}

#print {
  position: absolute;
  bottom: 0;
padding-bottom: 20px;
    padding-left: 20px;
  padding-top: 1000px;
  color: #fff;
}

#button_print1 {
  background: #aaa;
}

</style>


  </head>

  <body>




<?php
//  $request = file_get_contents($_FILES["Report_File"]["tmp_name"]);
  session_start();
  $request = @$_SESSION["xml_report"];

  if ($request != "") {

  $owner =  $_SESSION["owner"];
 

//  $request = $_POST['xml_report'];
//  $id = $_POST['id'];
   $id = $_GET['id'];
  $requestxml2 = new SimpleXMLElement($request);
  $requestxml = "";
  
  $i = 0;
//  echo $requestxml->items->Item->title;
  foreach ($requestxml2->items->Item as $Item){
    if ($i == $id) {
      $requestxml = $Item; 
    }
    $i = $i+1;
  }
  $partner=$requestxml->partner_code;  


?>
Update delivery codes if needed
<br>
<form action="print.php" method="get">
  Owner code (Return To):<br>
  <input type="text" name="owner" value="<?php echo $owner;?>"><br>
  Partner code (Ship To):<br>
  <input type="text" name="partner" value="<?php echo $partner;?>"><br><br>
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <input type="submit" value="Print">
</form>


<?php
} // if request != ""
?>

  </body>

</html>
