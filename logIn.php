<?php 
    include 'links.php';
    include 'function.php';
    session_start();
?>
<title>Customer Login|TechTrix</title>
<body>
  <center>
          <fieldset>
          <div class="col-md-12">
          <h2>Customer Login</h2> 
          <div style="width:300px;">
          <div class="form-group" style="color:#fff;">
          <form action="" method="post">
          <label></label>
          <input type="text" class="form-control" name="trix_id" placeholder="Unique Techtrix Team ID" required/>
          <label></label>
          <input type="password" class="form-control" name="password" placeholder="Password" required/>
          <br>
          <input type="submit" class="btn btn-info" name="submit" value="Login"/>
          <input type="reset"  class="btn btn-default" value="Reset"/>
          </form> 
          </fieldset>                
    </center>
</body>

<?php
if(isset($_POST['submit']))
    {
        $_SESSION['u_id']=logincheck($_POST['trix_id'],$_POST['password']);
        header('location:ride.php');
    }
?>

