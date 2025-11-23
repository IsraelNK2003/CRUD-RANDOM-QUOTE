<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>X/Twitter</title>
  <link rel="shortcut icon" href="images/x logo.ico.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section class="container">
    <div class="logo">
      <img src="images/x logo.png" width="300" alt="">
    </div>
    <div class="form">
      <h1>Happening now </h1>
      <form action="./php/SignUp.php" method="POST">
        <div class="input">
          <label for="uname">
            <input type="text" name="uname" id="uname" placeholder="Enter your Username">
          </label>
        </div>
        <div class="input">
          <label for="email">
            <input type="email" name="email" id="" placeholder="Enter your email">
          </label>
        </div>
        <div class="input">
          <label for="pass">
            <input type="password" name="pass" id="pass" placeholder="Enter your password">
          </label>
        </div>
        <div class="input">
          <label for="cpass">
            <input type="password" name="cpass" id="cpass" placeholder="Confirt your password">
          </label>
        </div>
        <div class="input">
          <label for="signin">
            <input type="submit" value="Login" name="signin" id="signin">
          </label>
        </div>
      </form>
      <div class="terms">
        <p>By signing up, you agree to the Terms of Service and Privacy, Policy. Including cookie use.</p>
      </div>
      <div class="others">
        <a href="index.php">Already have an account ?</a>
      </div>
    </div>
  </section>
</body>

</html>