<!DOCTYPE html>
include
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
setcookie("moncookie","",time()-3600); 

$url = "Pageconnexion.php";
redirection($url);
exit();



?>
</body>
</html>