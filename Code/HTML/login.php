<!DOCTYPE html>
<html>
  <head>

    <link rel = "stylesheet" type = "text/css" href = "/GreenFull/Code/CSS/srki.css">

  </head>
  <body>
    <header>
      <h1>Welcome Back!</h1>
    </header>
    <main>

      <div class="login-box">
        <h2>Login</h2>
        <form method = "POST" action = "#">
          <div class="user-box">
            <input type="text" name = "Username" required="">
            <label>Username</label>
          </div>
          <div class="user-box">
            <input type="password" name = "Password" required="">
            <label>Password</label>
          </div>
          <a>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Get In
            <?php
              if(isset($_POST['LogIn'])) {
                echo "Kliknuto je!";
              }
             ?>
          </a>
          <a href="/GreenFull/index.html">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Front
          </a>
        </form>
      </div>

    </main>
    <fother>

      <img class="leaf" src="https://cdn3.iconfinder.com/data/icons/spring-23/32/leaf-spring-plant-ecology-green-512.png"/>
      <img class="leaf" src="https://cdn3.iconfinder.com/data/icons/spring-23/32/leaf-spring-plant-ecology-green-512.png"/>
      <img class="leaf" src="https://cdn3.iconfinder.com/data/icons/spring-23/32/leaf-spring-plant-ecology-green-512.png"/>

    </fother>
  </body>
</html>
