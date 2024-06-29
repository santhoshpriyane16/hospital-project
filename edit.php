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
</head>

</html>

<?php
include("config.php");



$id=$_GET['id'];


if(isset($_POST['update']))
{
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $doctor=$_POST['doctor'];
  $date=$_POST['date'];
  $department=$_POST['department'];
  $message=$_POST['message'];
    
    if($name!='' && $phone!='' && $doctor!='' && $date!='' && $department!='' && $message!='')
    {
        $ins_qry=$conn->query("update appointment1 set name='$name',phone='$phone',doctor='$doctor',date='$date',department='$department',message='$message' where id='$id'");
        
        if($ins_qry)
        {
           
           header("Location:updatesuccess.html");
        }
        else
        {
             $msg="Can't update";
		        $tpy="danger";
        }
        
        
    }else{
        $msg="Please fill All the Fields";
		    $tpy="warning";
    }


}

$sel_qry=$conn->query("select * from appointment1 where id='$id'");

if($sel_qry->rowCount()==1)
{
    $sel_qry_arr=$sel_qry->fetch();
}
else{
    header("Location:admindashboard.php");
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

    <title>Add people</title>
  </head>
  <body>
   <?php include("header.php"); ?>
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
                <h1 style="color:black";>Edit people</h1>
           
			    <form method="post">
			        <div class="form-group">
    <label for="name">Name</label>
    <input style="border-color:gray;color:black" type="text" name="name" value="<?=$sel_qry_arr['name']?>" class="form-control" id="name" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input style="border-color:gray;color:black" type="text" name="phone" value="<?=$sel_qry_arr['phone']?>" class="form-control" id="phone" required>
  </div>
  <div class="form-group">
    <label for="doctor">Doctor</label>
    
    
      <div class = "form-group">
                <select style="width:1070px;height:35px;border-color:gray" type="text" name="doctor" value="<?=$sel_qry_arr['option']?>" class="form-control" id="doctor" required>
                    <option>Dr.Aravindh</option>
                    <option>Dr.Govindh</option>
                    <option>Dr.Ganga</option>
                    <option>Dr.Durga</option>
                </select>
      </div>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input style="border-color:gray;color:black" type="date" name="date" value="<?=$sel_qry_arr['date']?>" class="form-control" id="date" required>
  </div>
  <div class="form-group">
    <label for="department">Department</label>
    
    
    
        <div class = "form-group">
                <select style="width:1070px;height:35px;border-color:gray "  name="department" value="<?=$sel_qry_arr['option']?>" class="form-control" id="department" required >
                    <option style="padding-left:20px">Orthopedic</option>
                    <option style="padding-left:20px">Dentist</option>
                    <option style="padding-left:20px">General Physician</option>
                    <option style="padding-left:20px">Gynecologist</option>
                </select>
        </div>
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <input style="border-color:gray;color:black" type="text" name="message" value="<?=$sel_qry_arr['message']?>" class="form-control" id="message" required>
  </div>

  
  <button type="submit" name="update" class="btn btn-primary">Update Appointment</button>
	<a href="admindashboard.php" class="btn btn-info">Back</a>		        
			    </form>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    
  </body>
</html>