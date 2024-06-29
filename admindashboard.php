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
    
    .table{
        background:white;
        border-radius:5px;
    }
</style>
</head>

<?php
    include('config.php')
?>
<body>
<?php
  include('header.php')
?>

<div class="container">
		<div class="row">
			<div class="col-sm-12">
                <a href="add.php" class="btn btn-success">Add person</a>
			    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Doctor</th>
      <th scope="col">Department</th>
      <th scope="col">Date</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
     
      $sel_qry=$conn->query("select * from appointment1");
     
      if($sel_qry->rowCount()>0)
      
      {
          $result=$sel_qry->fetchAll();
          foreach($result as $sel_qry_arr)
          {
              ?>
              <tr>
                  <td><?=$sel_qry_arr['id']?></td>
                  <td><?=$sel_qry_arr['name']?></td>
                  <td><?=$sel_qry_arr['doctor']?></td>
                  <td><?=$sel_qry_arr['department']?></td>
                  <td><?=$sel_qry_arr['date']?></td>
                  <td><?=$sel_qry_arr['phone']?></td>
                  <td><?=$sel_qry_arr['message']?></td>
                  <td><a href="edit.php?id=<?=$sel_qry_arr['id']?>" class="btn btn-primary">Edit</a>
                  <?php 
                  if($_SESSION['type']=1) { ?>
                  <a href="delete.php?id=<?=$sel_qry_arr['id']?>" class="btn btn-danger">Delete</a>
                      <?php } ?>
                  </td>
              </tr>
              <?php
          }
      }
      ?>
  </tbody>
</table>
</div>
</div>
</div>
</body>

