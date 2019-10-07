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

<script>

var _validFileExtensions = [".xml"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;            
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extension is: " + _validFileExtensions.join(", "));
                    return false;
                }
            } else {
                alert("You need to choose a XML lending report file to print");
                return false;
            }
        }
    }
  
    return true;
}

</script>

  </head>

  <body id="page-top">

<?php
  
  $msg = "Lending Slip Printer | ALMA";
  if (@$_GET["owner"] == "") echo "Contact <a href=https://www.mnpals.org>PALS</a> for more info";
  
?>


<?php
  
    if (@$_GET["owner"] != "") {

    $key = @$_GET["owner"];
    setcookie("key", $key, time() + (86400 * 300), "/"); 
 
?>

            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" action=process.php method="POST" enctype="multipart/form-data" onsubmit="return Validate(this);">

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Choose a XML lending report file to print:</label>
                  <br>
                  <input type="file" name="Report_File" value="">
                  <input type="hidden" name="owner" value="<?php echo @$_GET["owner"];?>">
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Submit</button>
              </div>
            </form>

<?php
  }
?>

          </div>
        </div>
      </div>
    </section>




  </body>

</html>
