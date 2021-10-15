<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
   <title>Sign Up page</title>
</head>
<body>

<form method="POST">
  <fieldset class="container">
    <legend><center>Sign Up page</center></legend>
    <div class="mb-3">
      <label  class="form-label">Name</label>
      <input type="text"  class="form-control" name="name" placeholder="Name">
    </div>
    <div class="mb-3">
      <label  class="form-label">Email</label>
      <input type="email"  class="form-control" name="email" placeholder="Email">
    </div>
    <div class="mb-3">
      <label  class="form-label">Password</label>
      <input type="password"  class="form-control" name="password" placeholder="Password">
    </div>
    <div class="mb-3">
      <label  class="form-label">confirme password</label>
      <input type="password"  class="form-control" name="cpassword" placeholder="confirme password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="http://localhost/user/signin.php" class="btn btn-success" >login</a>
  </fieldset>
</form>
   
<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=sha1($_POST['password']);
$cPassword=sha1($_POST['cpassword']);

$data=new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;","root","");

$insert = $data->prepare("INSERT INTO signup (name,type,email,password) VALUES ('$name','user','$email','$password')");

if (isset($_POST['submit']) )
{
   if($password == $cPassword)
   {
      $insert->execute();
      echo'<div class="alert alert-info" role="alert">Sign Up successfully</div>';
   }
   else
   {
      echo'<div class="alert alert-danger" role="alert">Passwords didnt match</div>';
   }
}


?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>
