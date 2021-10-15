<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
   <title>user Page</title>
</head>
<body>
   <form method=POST>
   <button type="submit" name="logout" class="btn btn-danger">Logout</button>
   </form>
   <?php
   session_start();
   if($_SESSION['user']->type === "user"){
    echo'  <center>
      <h1>logged in successfully</h1>
      <h3>welcome '.$_SESSION['user']->name.'</h3>
      <a href="http://localhost/user/change_password.php"
       type="button" class="btn btn-info">Change Password</a>

   </center>';

   
   }
   else
   {
      header('location:http://localhost/user/signin.php');
   }

   if(isset($_POST['logout']))
   {
      session_unset();
      session_destroy();
      header('location:http://localhost/user/signin.php');
   }
  
   ?>
  
</body>
</html>
