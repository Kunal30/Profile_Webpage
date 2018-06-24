<?php
require_once('/opt/lampp/htdocs/Profile_Website_MVC/includes/helpers.php');
?> 

<?php render('header', array('title' => 'Contact Me')); ?>

<?php
    // validating submission
   if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["relation"]) && !empty($_POST["email_id"]) && !empty($_POST["contact"]) && !empty($_POST["message"]))
   {
     $db= mysqli_connect("localhost","root","","Kunal_Suthar");
     if(mysqli_connect_errno())
      {
        echo "Database Connection Problem";
        exit();
      }

     $sql=sprintf("INSERT INTO Contact_Me_Responses (index_number, First_Name, Last_Name, Relation, Email_Address, Contact_Number, Message) VALUES ('', '%s', '%s', '%s', '%s', '%s', '%s');
                  ",mysqli_real_escape_string($db,$_POST["firstname"]),mysqli_real_escape_string($db,$_POST["lastname"]),mysqli_real_escape_string($db,$_POST["relation"]),mysqli_real_escape_string($db,$_POST["email_id"]),mysqli_real_escape_string($db,$_POST["contact"]),mysqli_real_escape_string($db,$_POST["message"]));
    if(mysqli_query($db,$sql)){

?>
<div>
	<p class="fontAA">Your Message has been sent!!</p>
</div>
<?
   }
   else
    echo mysqli_error($db);
 }
   else
   {
   	header("Location: http://localhost/Profile_Website_MVC/views/contact.php");
   	exit;
   }
?>
<?php render('footer'); ?>