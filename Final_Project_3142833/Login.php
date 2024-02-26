<?php
// PHP code to handle login form submission and authentication

// Ensure that no output is sent to the browser before the PHP code starts
ob_start();

class LoginHandler {
    private $error_message = "";

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Collect form data
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            // Check for empty fields
            if (empty($username) || empty($password)) {
                $this->error_message = "Error: Please enter both username and password.";
                return;
            }

            // Connect to MySQL database ('host name', 'username', 'password', and 'database')
            $conn = new mysqli("localhost", "root", "March_2003", "Blood_bank");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Fetch the hashed password from the database for the provided username
            $fetchPasswordQuery = "SELECT Password FROM Accounts WHERE Username = '$username'";
            $result = $conn->query($fetchPasswordQuery);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashedPasswordFromDB = $row["Password"];
                
                // Verify the provided password against the hashed password from the database
                if (password_verify($password, $hashedPasswordFromDB)) {
                    // Passwords match, consider the user authenticated
                    if ($username === 'Admin') {
                        // Redirect to the admin page
                        header("Location: admin.php");
                        exit();
                    } else {
                        // Redirect to the home page for regular users
                        header("Location: Home-Logged-In.php");
                        exit();
                    }
                } else {
                    // Invalid password, set error message and show alert
                    $this->error_message = "Error: Invalid password.";
                    echo '<script>
                            alert("Invalid password.");
                        </script>';
                }
            } else {
                // Username not found, set error message and show alert
                $this->error_message = "Error: Username not found.";
                echo '<script>
                        alert("Username not found.");
                    </script>';
            }

            // Close the database connection
            $conn->close();

            // Ensure that any output is cleared before the PHP code ends
            ob_end_flush();
        }
    }

    public function displayErrorMessage() {
        if (!empty($this->error_message)) {
            echo '<script>alert("' . $this->error_message . '");</script>';
        }
    }
}

// Create an instance of the class
$loginHandler = new LoginHandler();

// Call the methods
$loginHandler->handleFormSubmission();
?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Log In">
    <meta name="description" content="">
    <title>Login</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Login.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.2.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/LifeLinelogo1.png"
}</script>
    <meta name="theme-color" content="#8da3c8">
    <meta property="og:title" content="Login">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-11a0"><div class="u-clearfix u-sheet u-valign-top u-sheet-1">
        <a href="#" class="u-image u-logo u-image-1" data-image-width="800" data-image-height="800">
          <img src="images/LifeLinelogo1.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-hamburger u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-custom-font u-nav u-spacing-30 u-text-font u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="Home.php" style="padding: 10px 0px;">Home</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home-Logged-In.php">Home</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-palette-2-light-2 u-section-1" id="sec-0007">
      <div class="u-clearfix u-sheet u-sheet-1">
        <body>
          <div class="login-box">
            <h1>Login</h1>
            <form action="Login.php" method="post">
                  <label>Username</label>
                  <input type="text" name="Username" placeholder="" />
                  <label>Password</label>
                  <input type="password" name="Password" placeholder="" />
                  <p class="para-2">
                    Don't have an account? <a href="Signup.php">Sign Up Here</a>
                  </p>
                  <input type="submit" value="login" />
              </form>
          </div>

        </body>
      </div>
    </section>
    
    
    
    <footer class="u-clearfix u-footer u-grey-80" id="sec-dab2"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center u-container-style u-group u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <p class="u-small-text u-text u-text-variant u-text-1">This website was created by Karim Nassif as a final year project.<br>Contact information: kan00096@students.stir.ac.uk
            </p>
          </div>
        </div>
      </div></footer>

  
</body></html>