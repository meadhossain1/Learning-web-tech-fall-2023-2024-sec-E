<html lang="en">
<head>
    <title>Form Submission</title>
</head>
<body>  

<?php 
    $Date of Birth = $_REQUEST['Date of Birth'];
    
    if($Date of Birth == ""){
        echo "null value";
    }else{
        echo "$Date of Birth";
    }
?>
</body>
</html>