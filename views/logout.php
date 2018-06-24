<?

session_start();

setcookie("email","",time()-3600);
setcookie("pwd","",time()-3600);

setcookie(session_name(),"",time()-3600);
session_destroy();
 $host= $_SERVER["HTTP_HOST"];
 $path= rtrim(dirname($_SERVER["PHP_SELF"]),"/\\");
header("Location: http://$host$path/profile.php");
exit();
?>