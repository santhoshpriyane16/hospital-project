

<style>
  .logo3 {
    height: 150px;
    width: 150px;
  }
</style>
<!--Header Upper-->
<section class="header-uper">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-xl-4 col-lg-3">
        <div class="logo">
          <a href="index.html">
            <img loading="lazy" class="logo3" src="images/logo3.png" alt="logo">
          </a>
        </div>
      </div>
      <div class="col-xl-8 col-lg-9">
        <div class="right-side">
          <ul class="contact-info pl-0 mb-4 mb-md-0">
         
          </ul>
          <div class="link-btn text-center text-lg-right">
          <p>Hi, <?php
          
          
         
           echo $_SESSION['name']; 

           if($_SESSION['name']= ""){
            header("Location:login.php");
           }
           ?> <a href="logout.php" class="btn btn-danger" >Logout</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Header Upper-->
    
