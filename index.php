<?php 
include('includes/header.php'); ?>

<style>
  <?php include('CSS/index.css'); ?>
  </style>

<body>
<div class="py-5">
  
    <div class ="row">
      <div class="col-md-12">
        <h1 class="title"> Aton Ini</h1>

      </div>
    </div>
  

</div>

<div class="container">

  <label for="UN-label" class="username-label">Username</label>
  <input type="username" class="form-control" id="UsernameInput" placeholder="Default Username">
 
  <div class="col-auto">
    <label for="inputPassword6" class="password-label">Password</label>
  </div>
  <div class="col-auto">
    <input type="password" id="PasswordInput" class="form-control" aria-describedby="passwordHelpInline" placeholder="Default Password">
  </div>
  

</div>

  


</body>

<?php include('includes/footer.php'); ?>