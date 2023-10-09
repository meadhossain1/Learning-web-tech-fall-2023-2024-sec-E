<html lang="en">
<head>
    <title>Form Submission</title>
</head>
<body>  

<?php 
    $email = $_REQUEST['email'];
    
    if($email == ""){
        echo "null value";
    }else{
        echo "$email";
    }
?>
</body>
</html>