<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
   <title>Sign in Page</title>
</head>
<body>

<form class="row g-3" dir="rtl" method="POST">
<div class="col-auto">
    <button type="submit" name='register' class="btn btn-success" class="btn btn-primary mb-1">Register</button>
  </div>
<div class="col-auto">
    <button type="submit" name='submit' class="btn btn-primary mb-1">Log in</button>
  </div>
  <div class="col-auto">
    <label class="visually-hidden">Password</label>
    <input type="password" name='password' class="form-control"  placeholder="Password">
  </div>
  <div class="col-auto">
    <label  class="visually-hidden">Email</label>
    <input type="text"  name='email' class="form-control-plaintext"  placeholder="Email@hotmail.com">
  </div>

  <?php
   $eamil=$_POST['email'];
   $password=sha1($_POST['password']);

   $data=new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;","root","");
   $check= $data->prepare("SELECT * FROM signup WHERE email=:email AND password=:password");
   $check->bindParam("email",$eamil);
   $check->bindParam('password',$password);
   $check->execute();

   if(isset($_POST['register']))
   {
      header('location:http://localhost/user/signup.php');
   }
   if(isset($_POST['submit']))
   {
   if($check->rowCount() === 1)
   {
      $user= $check->fetchObject();
      session_start();
      $_SESSION['user']=$user;
      if($user->type === 'user')
      {
      header("location:user.php");
      }
      else
      {
         header('location:admin.php');
      }

     
   }
   else
   {
      echo'<div class="alert alert-danger" role="alert"><center>email or password is wrong please try again</center></div>';
   }
   }
  ?>


</form>
   




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>