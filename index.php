<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aton Ini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

<style>
  <?php include('CSS/index.css'); ?>
  </style>

<body>
<div class="py-5">
   <h1 class="title"> Aton Ini</h1>     
</div>

<div class="containerlogin">

  <label for="UN-label" class="username-label">Username</label>
  <input type="username" class="form-control" id="UsernameInput" placeholder="Default Username">
 
  <div class="col">
    <label for="inputPassword6" class="password-label">Password</label>
  </div>
  <div class="col">
    <input type="password" id="PasswordInput" class="form-control" aria-describedby="passwordHelpInline" placeholder="Default Password">
  </div>
  
  <button type="button" class="frgtpw">Forgot password?</button>
  <button type="button" class="submit">Login</button>
  

</div>

  
</body>

<?php include('includes/footer.php'); ?>