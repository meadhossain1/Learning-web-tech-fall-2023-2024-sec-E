<html lang="en">
<head>
    <title>Form Submission</title>
</head>
<body>  

<?php 
    $username = $_REQUEST['username'];
    
    if($username == ""){
        echo "null value";
    }else{
        echo "$username";
    }
?>
</body>
</html>