<?php
      include_once 'header.php';

      // Start a session
      session_start();

      // Error Handling - 
      // if ( isset($_SESSION['error']) ) {     
      //     $userNameError  =    $_SESSION['error']['username'];
      //     $passwordError   =    $_SESSION['error']['password'];
      //     unset($_SESSION['error']);
      // }

      if (($_SESSION['loggedIn'])) {
          echo 'User Logged in. Go to <a href="member_area.php">dashboard</a>';
      }

      else {
?>
           <section class="form-body">

                <?php
                           if ( isset($_SESSION['error']) ) { 
                              $passwordError = $_SESSION['error']['password'];
                              echo '<div class="errors">';
                                echo "$passwordError";
                                echo '<a href="#" class="notification-close notification-close-error">x</a>';
                              echo '</div>';
                              unset($_SESSION['error']);
                          }
                ?>
                <form class="registration-form login-form preflip" id="login-form" name="login" action="login_form.php" method="post">
                      <h1>Sign In</h1>
                            
                      <fieldset>   
                            <div id="field-container">
                              <input type="text" name="username" maxlength="30" id="username" placeholder="Username" pattern=".{4,}" required />
                              <div class="popover">Minimum of 4 letters</div>
                            </div>                           

                            <label class="input">
                                <input type="checkbox" id="checkboxShow" class="icon-eye" name="checkbox" /> 
                            </label>                    

                            <div id="field-container">
                              <input type="password" id="textPassword" name="password" placeholder="Password" pattern=".{6,}" required />
                              <div class="popover">Minimum 6 letters</div>
                            </div>                                    
                      </fieldset>

                      <div class="full-width-line"></div>

                      <fieldset>
                          <input type="submit" value="Sign In" name="login" id="login" class="flat-button" />
                      </fieldset>

                      <fieldset>
                         <div class="text-label"><a href="index.php">Don't have an account yet? Register here.</a></div>
                         <div class="text-label"><a class="flipLink" href="#">Forgotten Password?</a></div>
                      </fieldset>
                </form> 
                <!-- end login form -->

                <form class="registration-form forgot-form postflip" name="forgot" action="forgot.php" method="post">     
                      <h1>Forgot Password?</h1>

                      <fieldset>
                        <input type="text" name="email" maxlength="30" placeholder="Email Address" />
                      </fieldset>

                      <div class="full-width-line"></div>

                      <fieldset>
                        <input type="submit" value="Enter email and click here" name="login" id="login" class="flat-button" />
                      </fieldset>
                          
                      <fieldset>
                        <div class="text-label"><a class="flipLink" href="#">Already have an account? Sign In</a></div>
                      </fieldset> 
                </form> <!-- end forgot password form -->
           </section><!-- end .form-body -->

<?php 
   } // Close else statement
    
   include_once 'footer.php'; ?>