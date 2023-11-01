<?php
session_start();
if (!isset($_SESSION['author'])) {
    header('location: login.php');
}
?><html>

</html>