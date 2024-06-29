<?php
include('config.php');


if(isset($_POST['register']))
{
	$name=$_POST['name'];
	$uname=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST ['password'];
	$reppassword=$_POST['reppassword'];
  $epwd = md5($password);
  $ecpwd = md5($reppassword);

  $stmt = $conn->prepare("select * from user_registration where email=?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();
  if ($user) {
    header("Location:userexists.html");
  }
	
 
	else if($ins_qry=$conn->query("insert into user_registration (name,username,email,password,reppassword) values('$name','$uname','$email','$epwd','$ecpwd')"))

	{
		header("location:registrationsuccess.html");
	} else {
		echo "<script>
		alert ('registered failed')
		</script>";
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
    <title>Regsitration page</title>
</head>
<body>
    <style>
       body{
           background-image: url(images/pexels-fauxels-3183132.jpg);
           background-size: cover;
       }
        .main-div {
           
            justify-content: center;
            display: flex;
            padding: 50px;
           
        }

        .check_box {
            padding-right:200px ;
        }
        .tab-content{
         background-color: aliceblue;
         border-radius: 15px;
         width: 450px;
         justify-content:center;
         display: flex;
         
         }
         #pills-register{
            padding-top: 20px;
         }
         .form-outline {
            width: 100%;
         }
    </style>
    <script>
        var check = function() {
             if (document.getElementById('registerPassword').value == "") {
                     document.getElementById('message').innerHTML = null;
                        
                           
                 }
                 else if(
                                document.getElementById('registerPassword').value ==
                                 document.getElementById('registerRepeatPassword').value) {
                                 document.getElementById('message').style.color = "green"
                                  document.getElementById('message').innerHTML = "Matching :)"
                       
                                  document.getElementById('Register').disabled = false;
                              }
                  else {
                    document.getElementById('message').style.color = "red"
                        document.getElementById('message').innerHTML = "Not matching :("
                        
                        document.getElementById('Register').disabled = true;
                       
                              }
                            
                    }
           
    </script>

 
  
  <!-- Pills content -->
  <div class="main-div">
    <div class="tab-content">
        <div id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link " id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab"
                    aria-controls="pills-login" aria-selected="false">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="registration.php" role="tab"
                    aria-controls="pills-register" aria-selected="true">Register</a>
                </li>
                <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="index.html" role="tab"
              aria-controls="pills-register" aria-selected="false">Home</a>
          </li>
              </ul>
            <form method="POST" class="mb-5"  >
              
              <!-- Name input -->
              <div class="form-outline mb-4">
                <input type="text" name="name" id="registerName" class="form-control" required/>
                <label class="form-label" for="registerName">Name</label>
              </div>
        
              <!-- Username input -->
              <div class="form-outline mb-4">
                <input type="text" name="username" id="registerUsername" class="form-control" required />
                <label class="form-label" for="registerUsername">Username</label>
              </div>
        
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="registerEmail" class="form-control" required/>
                <label class="form-label" for="registerEmail">Email</label>
              </div>
        
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="registerPassword" class="form-control" onkeyup='check()' required />
                <label class="form-label" for="registerPassword">Password</label>
              </div>
        
              <!-- Repeat Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="reppassword" id="registerRepeatPassword" class="form-control" onkeyup='check()' required />
                <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                <span style="padding-left:20px" id='message'></span>
              </div>
        

        
              <!-- Checkbox -->
              <div class="check-box form-check d-flex mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                  aria-describedby="registerCheckHelpText" required />
                <label class="form-check-label" for="registerCheck">
                  I have read and agree to the terms
                </label>
              </div>
        
              <!-- Submit button -->
              <button name = "register" id="Register" type="submit" class="btn btn-primary btn-block mb-3">Register</button>
            </form>
          </div>
          <!-- Pills content -->
      </div> 
  </div>
 
 
</body>
</html>