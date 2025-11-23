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
      <img src="images/x logo.png"  width="300" alt="">
    </div>
    <div class="form">
      <h1>Login </h1>
      <form action="./php/Login.php" method="POST">
        <div class="input">
          <label for="uname">
            <input type="text" name="username" id="uname" placeholder="Enter your Username" required>
          </label>
        </div>
        <div class="input">
          <label for="email">
            <input type="email" name="email" id="" placeholder="Enter your email" required>
          </label>
        </div>
        <div class="input">
          <label for="pass">
            <input type="password" name="password" id="pass" placeholder="Enter your password" required>
          </label>
        </div>
        <div class="input">
          <label for="signin">
            <input type="submit" value="Signin" name="signin" id="login">
          </label>
        </div>
        
      </form>
        <div class="or">
          <div class="hr">
          </div>
          <div>
            <p>Or</p>
          </div>
           <div class="hr">
          </div>
        </div>
        <div class="social">
          <div>
            <form method="POST">

              <button class="google" name="Google">
                <div>
                  <img src="images/download 1.png" width="30" alt="">
                </div>
                <div>
                  <p>Signin with Google</p>
                </div>
              </button>
            </form>
          </div>
          <div>
            <button class="apply">
              <div>
                <img src="images/Apple Logo.png" width="40" alt="">
              </div>
              <div>
                <p>Signin with Apple</p>
              </div>
            </button>
          </div>
        </div>
      <div class="terms">
        <p>By signing up, you agree to the Terms of Service and Privacy, Policy. Including cookie use.</p>
      </div>
      <div class="others">
        <a href="create.php">Click here to create new account</a>
      </div>
    </div>
  </section>
  <?php 

    if(isset($_POST['Google'])){
        session_start();
            $_SESSION['username'] = "guest";
            header("location:./php/Display.php");
    }
  
  ?>
</body>
</html>