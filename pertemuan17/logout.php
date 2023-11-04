<?php 

// ketika masuk akan langsung hilang sessionnya
session_start();
$_SESSION = []; // biar var session jadi kosong
session_destroy();
session_unset();

setcookie('lymrts', '', time()-3600);
setcookie('Xy#7!', '', time()-3600);

header("Location: login.php");
exit;

?>