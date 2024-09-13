<!--Javascriptpro_-->
<!DOCTYPE html>
<html>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Registration.css">
        <title>Registration</title>
</head>

<body>
<div class="container">
<form action="/src/actions/register.php" method="post">
   
  <h3>Register</h3>
  <h2>It's Completely Free</h2>
  
  <div class="input first-box">
      <input type="text" id="input1" name="Username" required>   
      <label for="input1">Username</label>
  </div>
  <div class="input">
       <input type="text" id="input2" name="E-mail" required>
       <label for="input1input2">Email</label>
  </div>
  <div class="input">
       <input type="password" id="input3" name="Create_Password" required>
       <label for="input3">Create &nbsp; Password</label>
  </div>
  <div class="input">
       <input type="password" id="input4" name="Confirm_Password" required>
       <label for="input4">Confirm &nbsp; Password</label>
  </div>  
  <button class="create-btn">Create Account</button>
  <p>Already have an account?<a href="/login.php"><span>Login</a></span></p>
 </form>
</div>
<script src="Registration.js"></script>
</body>

</html>
