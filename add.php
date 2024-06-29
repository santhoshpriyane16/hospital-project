<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Team 14 - Hospital</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Medical HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Medical HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="medic" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animation/animate.min.css">
  <!-- jquery-ui -->
  <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.css">
  <!-- timePicker -->
  <link rel="stylesheet" href="plugins/timePicker/timePicker.css">
  
  <!-- Stylesheets -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="icon" href="images/favicon.png" type="image/x-icon">

</head>


<?php
include("config.php");



if(isset($_POST['add']))
{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $doctor=$_POST['doctor'];
    $date=$_POST['date'];
    $department=$_POST['department'];
    $message=$_POST['message'];
    $email=$_POST['email'];
    
    if($name!='' && $phone!='' && $doctor!='' && $date!='' && $department!='' && $message!='' && $email)
    {
        $ins_qry=$conn->query("insert into appointment1 (name,phone,doctor,date,department,message,email) values('$name','$phone','$doctor','$date','$department','$message','$email')");
        
        if($ins_qry)
        {
           header("Location:addsuccess.html");
        }
        else
        {
             $msg="Can't Insert";
		$tpy="danger";
        }
        
        
    }else{
        $msg="Please fill All the Fields";
		$tpy="warning";
    }


}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    body{
           background-image: url(images/pexels-fauxels-3183132.jpg);
           background-size: cover;
       }
    
    form{
        background:white;
        padding:20px;
        border-radius:10px;
        
    }
    
</style>
    <title >Add People</title>
  </head>
  <body>
   <?php $_SESSION['name'] ="Admin"; include("header.php")?>
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
                <h1 style="color:black";>Add people</h1>
             
	
 <form method="post">
			        <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name"  class="form-control" id="name" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone"  class="form-control" id="phone" required>
  </div>
  <div class="form-group">Departments
                  <select class="form-control" name="department">
                  <option>Orthopadic</option>
                    <option>Diagnostic</option>
                    <option>Psychological</option>
                    <option>General Treatment</option>
                  </select>
                </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email"  class="form-control" id="email" required>
  </div>
  <div class="form-group">
    <label for="date">date</label>
    <input type="date" name="date"  class="form-control" id="date" required>
  </div>
  <div class="form-group">Doctor
                  <select class="form-control" name="doctor">
                  <option>Dr.A</option>
                    <option>Dr.B</option>
                    <option>Dr.C</option>
                    <option>Dr.D</option>
                  </select>
                </div>
  <div class="form-group">
    <label for="message">message</label>
    <input type="text" name="message"  class="form-control" id="message" required>
  </div>
  
  <button type="submit" name="add" class="btn btn-primary">Add People</button>
	<a href="admindashboard.php" class="btn btn-info">Back</a>		        
			    </form>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    
  </body>
</html>