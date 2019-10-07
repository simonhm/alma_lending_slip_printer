<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="refresh" content="3; URL=preview.php"> 


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

.return_bar {
  padding-left: 10px;
  padding-right: 20px;
}

.ship_to_bar {
  padding-right: 10px;
  padding-left: 20px;
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


#center1 {
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

  <body onload="window.print();">




<?php
//  $request = file_get_contents($_FILES["Report_File"]["tmp_name"]);
  session_start();
  $request = $_SESSION["xml_report"];

  $owner =  $_GET["owner"];
  $partner = $_GET["partner"];
 

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
  

  $barcode = $requestxml->external_request_id;
  $full = $requestxml->external_request_id;
  if (strpos($barcode, "//") > 0 ) {
    $barcode = substr($barcode, strpos($barcode, "//") + 2, strlen($barcode));
  } 
   
?>
<center>
<b>Interlibrary Loan<br>
Return this slip with the item</b><br><br>
                <div id=center>
                <table border=1 cellpadding="10" cellspacing=10>
		<tr>
			<td width=50% valign=top>Return to:
                            <br><h1><?php echo $owner;?></h1>
                            <br>Request # <?php echo $full;?>
                            <br><img class="return_bar" src="barcode.php?text=<?php echo $full;?>">
                            <br><br>Printed Date: <?php echo date("m/d/y", time());?>
                            <br>Need By Date: <?php echo $requestxml->need_by_date;?>
                        </td>
			<td width=50% valign=top>Ship to: 
                            <br><h1><?php echo $partner;?></h1>
                            <br>Request # <?php echo $full;?>
                            <br><img class="ship_to_bar" src="barcode.php?text=<?php echo $barcode;?>">
                            <br><br>Borrower: <?php echo substr($requestxml->partner_name,strpos($requestxml->partner_name,$requestxml->partner_code)+strlen($requestxml->partner_code)+1,strlen($requestxml->partner_name));?>
                            <br>Request Date: <?php echo $requestxml->creation_date;?>
                        </td>
		</tr>
		<tr>

<?php
  // physical
  if ($requestxml->format == "DIGITAL") {
?> 
  
                        <td colspan="2">Article Title: <?php echo $requestxml->title;?>
                                        <br>Journal Title: <?php echo $requestxml->resoruce_sharing_request_metadata->journal_title;?>                 
<?php
if ($requestxml->author != '') {
?>
                        <br>Author: <?php echo $requestxml->author;?>
<?php
}

if ($requestxml->publication_date != '') {
?>
                        <br>Date: <?php echo $requestxml->resoruce_sharing_request_metadata->publication_date;?>
<?php
}
?>
                        <br>Vol: <?php echo $requestxml->resoruce_sharing_request_metadata->volume;?>
                        <br>Issue: <?php echo $requestxml->resoruce_sharing_request_metadata->issue;?>

                        </td>

                </tr>
                <tr>
                        <td colspan="2">

ISSN: <?php echo $requestxml->ISSN;?>
<br>DoF: <?php echo $requestxml->resoruce_sharing_request_metadata->doi;?>

<?php
  if ($requestxml->resoruce_sharing_request_metadata->oclc_nr != "") {
?>
<br>OCLC_nr: <?php echo $requestxml->resoruce_sharing_request_metadata->oclc_nr;?>
<?php
  }
?>

                        </td>
                </tr>


<?php
  } else { // physical and others
?>
			<td colspan="2">Title: <?php echo $requestxml->title;?>
<?php             
if ($requestxml->author != '') {             
?>
                        <br>Author: <?php echo $requestxml->author;?> 
<?php
}
if ($requestxml->ISSN != '') {
?>                 
                        <br>ISSN: <?php echo $requestxml->ISSN;?> 
<?php
}
if ($requestxml->ISBN != '') {
?>
                        <br>ISBN: <?php echo $requestxml->ISBN;?>
<?php
}
if ($requestxml->barcode != '') {
?>
                        <br>Barcode: <?php echo $requestxml->barcode;?>
<?php 
}
?>
                        </td>
             
		</tr>
		<tr>
			<td colspan="2">
<?php
  $avas = $requestxml->availabilities;
  foreach ($avas->availability as $ava){
    echo $ava . "<br>";
  }

  

?>                          


                        </td>
		</tr>
<?php
  } // physical
?>

		<tr>
			<td colspan=2>Requested Material: <?php echo $requestxml->format;?></td>
		</tr>
                </table>
               </div>
</center>

<script>
function myFunction() {
  window.print();
}

function myFunction1() {
  window.close();
}

</script>

  </body>

</html>
