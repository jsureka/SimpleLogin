<?php
    include "header.php"
?>
<!-- Sign up form -->
    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Username" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
 <?php
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
         $u_name = $_POST['name'];
         $u_email = $_POST['email'];
         $u_password = $_POST['pass'];
         $u_repass = $_POST['re_pass'];
        if($u_password!=$u_repass)
            {
                echo "<div class='alert alert-danger' role='alert'>
               Password does not match. Please try again!
                 </div>";
            }
        else
        {
            $query = mysqli_query($db, "SELECT * FROM users WHERE u_name = '$u_name'");
            if(mysqli_num_rows($query)) {
                echo "<div class='alert alert-danger' role='alert'>
                Username already exists. Please try again!
                </div>";
             
            }
            else
                {
                   
                $query = mysqli_query($db, "INSERT INTO users(u_name, u_email,u_password) VALUES ('$u_name','$u_email','$u_password') ");
                if($query) {
                  
                    header("Location: http://localhost:8090/SimpleLogin/login.php");
                    echo "<div class='alert alert-success' role='alert'>
                    User Added Successfully
                     </div>";
                }
        }
     }
    }
    include "footer.php";
?>