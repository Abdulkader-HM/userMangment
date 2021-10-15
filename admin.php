<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
   <title>Admin Page</title>
</head>
<body>
   <?php
  //  ini_set('display_errors', 1); 
  //  ini_set('display_startup_errors', 1); 
  //  error_reporting(E_ALL);
   session_start();
   
   if($_SESSION['user']->type === 'admin')
   {
   //    echo ' <center>
   //    <h1>
   //       welcome Admin '.$_SESSION['user']->name
   //    .'</h1>
   // </center>';
  //  ;

 
   $data=new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;","root","");
   
   
// echo$_COOKIE['edit'];
$name=$_POST['name'];
$email=$_POST['email'];

if(isset($_POST['id']))
{
   $update = $data->prepare(" UPDATE signup  SET name='$name' , email='$email' WHERE id=".$_COOKIE['edit']);
  //  $update = $data->prepare(" UPDATE signup  SET name='fff',email='$email' WHERE id=".$_POST['id']);

   $update->execute();
   echo'done';
}

   
   $showData = $data->prepare(" SELECT * FROM signup WHERE type='user' " );
   $showData->execute();


    

   ?>

  



    
     <table class="table" class="container">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">email</th>
         <th scope="col">Action</th>

       </tr>
     </thead>
<?php  
   foreach($showData as $show){?>
     <tbody>
       <tr>
         <th scope="row"><?php echo $show["id"]?></th>
         <td><?php echo $show["name"]?></td>
         <td><?php echo $show["email"]?></td>
         <td><form action="edit.php" method="GET">
         <button type="submit" name="edit" class="btn btn-success" value="<?php echo $show["id"]?>">Edit</button>
         <button type="submit" name="delete" class="btn btn-danger" value="<?php echo $show["id"]?>">Delete</button>
         </form></td>
       </tr>
     </tbody>
     </table>
    <?php } ?>

    

<?php
if(isset($_GET['delete']))
{
  // $delete->execute();
  $id = $_GET['delete'];
   $delete = $data->prepare(" DELETE  FROM `signup` WHERE id=".$_GET['delete']);
  $delete->execute();
  header('location:http://localhost/user/admin.php');

  // echo 'done';
}

// if(isset($_GET['edit']))
// {
//   $test = $_GET['edit'];
//   // compact('test',$_GET['edit']);
//   setcookie('edit',$_GET['edit']);

//   header('location:http://localhost/user/edit.php');


// }

   }
   else
   {
      header('location:http://localhost/user/signin.php');
   }

  
   


    // echo $_GET['id'];
   ?>
  
</body>
</html>