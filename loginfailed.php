<?php 
include('config.php');

if(isset($_POST['login']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $epwd =md5($password);
  $lq_qry=$conn->query("select * from user_registration where email='$email' and password='$epwd'");
  
  if($lq_qry->rowCount()==1)
  {
    $lq_qry_arr=$lq_qry->fetch();
    $type=$lq_qry_arr['type'];


    if($type==1)
    {
      header('Location:admindashboard.php');
    }
    else
    {
      header('Location:appointment.php');
    }
  } 
  else 
  {
    header('Location:loginfailed.php');
  }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>login page</title>
  <style>
    body{
           background-image: url( images/pexels-fauxels-3183132.jpg);
           background-size: cover;
       }
   .main_div {
     
     justify-content: center;
     display: flex;
     
    
     
   }
   .tab-content {
     margin-top: 70px;
     background-color: aliceblue;
    border-radius: 15px;
    width: 450px;
    justify-content: center;
    display: flex;
   }
   .tab-pane{
    padding-top: 50px;
   }
   .form-outline {
    width: 100%;
   }
 </style>
</head>
<body>
  
  <div class="main_div">
    
    <!-- Pills content -->
    <div class="tab-content">
      <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <ul class="login_box nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab"
              aria-controls="pills-login" aria-selected="true">Login</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="registration.php" role="tab"
              aria-controls="pills-register" aria-selected="false">Register</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="index.html" role="tab"
              aria-controls="pills-register" aria-selected="false">Home</a>
          </li>
        </ul>
        <form method="POST">
    
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="loginName" class="form-control" required />
            <label class="form-label" for="loginName">Email or username</label>
          </div>
    
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="loginPassword" class="form-control" required/>
            <label class="form-label" for="loginPassword">Password</label>
          </div>
    
          <!-- 2 column grid layout -->
          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check mb-3 mb-md-0">
                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                <label class="form-check-label" for="loginCheck"> Remember me </label>
              </div>
            </div>
    
            <div class="col-md-6 d-flex justify-content-center">
              <!-- Simple link -->
              <a href="#!">Forgot password?</a>
            </div>
          </div>
    
          <!-- Submit button -->
          <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>
          <p style=color:red> Invalid username or password.. tryagain </p>
    
          <!-- Register buttons -->
          <div class="text-center">
            <p>Not a member? <a href="registration.php">Register</a></p>
          </div>
        </form>
      </div>
      
    </div>
    <!-- Pills content -->
  </div>
  
</body>
</html><!-- Pills navs -->
