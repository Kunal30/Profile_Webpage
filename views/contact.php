<?php
require_once('/opt/lampp/htdocs/Profile_Website_MVC/includes/helpers.php');
?> 

<?php render('header', array('title' => 'Contact Me')); ?>

     

<section  id="corses">
    <h2 class="fontAA">Contact Me</h2>    
    <p class="fontBB">Mobile Number: +91-8141410888</p>    
    <p class="fontBB">Personal Email-Address: kunalvsuthar@gmail.com</p>  
    <p class="fontBB">Professional Email Address: 201401131@daiict.ac.in</p>
    
   
    

    <p class="fontBB">You can fill up the form below!</p>
    <br>
    
    <form class="fontBB" action="register3.php" method="post">
      First Name:<br>
      <input type="text" name="firstname" value="<?php if(isset($_POST["firstname"])) echo htmlspecialchars($_POST["firstname"])  ?>"><br>
      Last Name:<br>
      <input type="text" name="lastname" value="<?php if(isset($_POST["lastname"])) echo htmlspecialchars($_POST["lastname"])  ?>"><br>
      Relation: <br>
      <select name="relation" value="<?php if(isset($_POST["relation"])) echo htmlspecialchars($_POST["relation"])  ?>">
      <option value=""></option>
      <option value="Father">Father</option>
      <option value="Mother">Mother</option>
      <option value="Relative">Relative</option>
      <option value="Friend">Friend</option>
      <option value="Teacher">Teacher</option>
      <option value="Mentor">Mentor</option>
      <option value="Colleague">Colleague</option>
      </select>
      <br>
      Email Address: <br>
      <input type="text" name="email_id" value="<?php if(isset($_POST["email_id"])) echo htmlspecialchars($_POST["email_id"])  ?>"><br>
      Contact Number: <br>
      <input type="text" name="contact" value="<?php if(isset($_POST["contact"])) echo htmlspecialchars($_POST["contact"])  ?>"><br>      
      Message: <br>
      <textarea type="text" id="msg" name="message" placeholder="Type your message in here" size="100" value="<?php if(isset($_POST["message"])) echo htmlspecialchars($_POST["message"])  ?>"> </textarea><br>
      <br>
      <input class="button2" type="submit" value="Send Message">    
    </form>
  </section>
  </div>
</div>
<?php render('footer'); ?>