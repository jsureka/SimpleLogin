<?php
    include "header.php"
?>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<?php
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
         $u_name = $_POST['your_name'];
         $u_password = $_POST['your_pass'];
        
         $query = mysqli_query($db, "SELECT * FROM users WHERE u_name = '$u_name' AND u_password = '$u_password'");
         if(mysqli_num_rows($query)) {
            header("Location: http://localhost:8090/SimpleLogin/index.php");
         }
         else
            echo "<div class='alert alert-danger' role='alert'>
            Username or Password is wrong. Please try again!
          </div>";
     }
        
?>
<?php
    include "footer.php"
?>