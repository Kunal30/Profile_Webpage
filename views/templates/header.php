<?php session_start();

//connecting to database for checking user log in
//$db = new PDO('mysql:host=localhost;dbname=Kunal_Suthar;charset=utf8mb4', 'root', '');
$db= mysqli_connect("localhost","root","","Kunal_Suthar");
if(mysqli_connect_errno()){
  echo "Database Connection Problem";
  exit();
}
//$statement= $db->query('SELECT * from Registered_Accounts where User_ID=1');
//$row=$statement->fetchAll(PDO::FETCH_ASSOC);


//define("USER","kunalvsuthar@gmail.com");
//define("PASS","qwertyuiop");

$_SESSION["authenticated"]=false;
if(isset($_COOKIE["email"]) && isset($_COOKIE["pwd"]))
{
  $sql= sprintf("SELECT * from Registered_Accounts where email_address='%s' and password='%s'",mysqli_real_escape_string($db,$_COOKIE["email"]),mysqli_real_escape_string($db,$_COOKIE["pwd"]));
  $query= mysqli_query($db,$sql);
  
  $result= mysqli_fetch_assoc($query);  
  //print_r($result);
  if($_COOKIE["email"]== $result["email_address"] && $_COOKIE["pwd"]== $result["password"])
  {
    $_SESSION["authenticated"]=true;
    setcookie("email",$_COOKIE["email"],time()+ 7*24*60*60);
    setcookie("pwd",$_COOKIE["pwd"],time()+ 7*24*60*60);

    $host= $_SERVER["HTTP_HOST"];
    $path= rtrim(dirname($_SERVER["PHP_SELF"]),"/\\");
    //header("Location: http://$host$path/contact.php");
    //exit();
  }
}
else if(isset($_POST["email"]) && isset($_POST["pwd"]))
{
  $sql= sprintf("SELECT * from Registered_Accounts where email_address='%s' and password='%s'",mysqli_real_escape_string($db,$_POST["email"]),mysqli_real_escape_string($db,$_POST["pwd"]));
  $query= mysqli_query($db,$sql);
  
  $result= mysqli_fetch_assoc($query);  
  //print_r($result);
  if($_POST["email"]== $result["email_address"] && $_POST["pwd"]== $result["password"] )
  {
    $_SESSION["authenticated"]=true;
    setcookie("email",$_POST["email"],time()+ 7*24*60*60);
    if(isset($_POST["rem"]) && $_POST["rem"])
    setcookie("pwd",$_POST["pwd"],time()+ 7*24*60*60);

    $host= $_SERVER["HTTP_HOST"];
    $path= rtrim(dirname($_SERVER["PHP_SELF"]),"/\\");
    //header("Location: http://$host$path/profile.php");
    //exit();
  }
}

?>

</!DOCTYPE html>
<html>
<head>
  <title><?php echo htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="styles.css">
      <link rel="stylesheet" type="text/css" href="Bootstrap/boot/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Homemade+Apple|Roboto" rel="stylesheet"> 

    <!-- Optional Bootstrap theme -->

    <link rel="stylesheet" href="Bootstrap/boot/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet"> 
    
    <link href="https://fonts.googleapis.com/css?family=Chelsea+Market|Padauk" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:100|Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<nav class="navbar navbar-light" style="background-color:#eae8e8" >
  <div class="container-fluid form-inline ">
    <div class="row">
     <div class="col-xs-7"> <p class=" fontApple " >Welcome to the official homepage of Kunal Suthar</p> </div>
      <div class="col-xs-5"><br><br><form class="placeC form-inline" action="register.php" method="get" style="float:right;" >     <input name="txtbx"   type="text" placeholder="Search for anything!" required> 
        <a type="button" class="btn  btn-lg  btn-primary">Search!</a>
        
</form>
</div>
</div>    
  </div>  
</nav>

   <ul class="uls fontCC">    
      <li class=" lis <?php if ($title == "Welcome to the official homepage of Kunal Suthar") { ?> active <? } ?>"><a href="profile.php">Homepage</a></li>           
      <li class="lis"><a href="download.php">Resume/CV</a></li>
      <li class=" lis <?php if ($title == "Courses") { ?> active <? } ?>"><a class="" href="courses.php">Courses</a></li>
      <li class=" lis <?php if ($title == "Projects") { ?> active <? } ?>"><a class="" href="proj.php">Projects</a></li>
      <li class=" lis <?php if ($title == "Movies Watched") { ?> active <? } ?>"><a class="" href="movie.php">Movies-Watched</a></li>
      <li class=" lis <?php if ($title == "Wannabe") { ?> active <? } ?>"><a class="" href="wanna.php">Wannabe</a></li>
      <li class=" lis <?php if ($title == "My Soundtrack") { ?> active <? } ?>"><a class="" href="sound.php">My-Soundtrack</a></li>
      <li class=" lis <?php if ($title == "Picture Gallery") { ?> active <? } ?>"><a class="" href="pikcha.php">Picture-Gallery</a></li>
      <li class=" lis <?php if ($title == "Contact Me") { ?> active <? } ?>"><a class="" href="contact.php">Contact-Me</a></li>  
    
    <div class="fontDD" style="float: right; margin-top: 16px;">
    
<?php if($_SESSION["authenticated"]==false) { ?>
    <form class="form-inline" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
  <div class="form-group">
    <label for="emails">Email address:</label>
    <?php if(isset($_POST["email"])): ?>
      <input name="email" type="email" class="form-control" id="emails" style="font-size: 24px;" value="<?= htmlspecialchars($_POST["email"]) ?> ">
    <?php elseif (isset($_COOKIE["email"])): ?>
     <input name="email" type="email" class="form-control" id="emails" style="font-size: 24px;" value="<?= htmlspecialchars($_COOKIE["email"]) ?> ">
    <?php else: ?>      
    <input name="email" type="email" class="form-control" id="emails" style="font-size: 24px;">
  <? endif ?>
  </div>
  
  
  <div class="form-group">
    <label for="pwds">Password:</label>
    <input name="pwd" type="password" class="form-control" id="pwds">
  </div>
  <div class="checkbox" style="font-size: 18px;">
    <label><input name="rem" type="checkbox" style="font-size: 7px;"> Remember me</label>
  </div>
  <button type="submit" class="btn violetbkg btn-lg" style="font-size: 25px; margin-right: 10px;">Sign-In</button>
  </form>
  <?php } elseif($_SESSION["authenticated"]==true) { ?>
  <form class="form-inline" action="<?= $_SERVER["PHP_SELF"] ?>" method="post" style="margin-right: 10px;">
  
  <?php if(isset($_POST["email"])){ ?>  
  <button type="" class="btn btn-success btn-lg" style="font-size: 25px;">Logged In as <?= htmlspecialchars($_POST["email"]) ?></button>
<?php } elseif(isset($_COOKIE["email"])) { ?>  
  <button type="" class="btn btn-success btn-lg" style="font-size: 25px;">Logged In as <?= htmlspecialchars($_COOKIE["email"]) ?></button> <? } ?>
  <a class="btn btn-danger btn-lg" style="font-size: 25px;" href="logout.php" role="button">Log-Out</a>

  </form>
  <?php } ?>
</div>
    </ul>
 <div class="container-fluid bkg">
  
<body>
<div class="row">
   <div class="col-xs-3"><br><a href="#"><img class="smaller-image  thick-purple-border" src="dp.png" ></a></div>
   
  <div class="col-xs-9   transparent" style="margin-bottom: 50px;">