<?php 

// ketika masuk akan langsung hilang sessionnya
session_start();
$_SESSION = []; // biar var session jadi kosong
session_destroy();
session_unset();

header("Location: login.php");
exit;

?>