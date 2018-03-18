<!DOCTYPE html>
<?php
    include_once("../DataAccess/formation.php");
    include_once("../DataAccess/connexionSite.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<!-- <script>swal("Good job!", "You clicked the button!", "success");</script> -->
<body>
<?php
      insertstatut();
    
       
        $url = "../index-chef-equipe.php";
        echo 'redui';
        redirection($url);
        
    
  

?>
</body>
</html>
