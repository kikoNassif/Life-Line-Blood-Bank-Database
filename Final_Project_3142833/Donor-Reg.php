<?php
// functions.php

function get_all_countries() {
    // This array contains a list of countries
    $countries = array(
        "Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"
    );

    return $countries;
}

function insert_donor_data($first_name, $last_name, $email, $blood_type, $gender, $age, $country) {
    // Connect to MySQL database ('host name', 'username', 'password', and 'database')
    $conn = new mysqli("localhost", "root", "March_2003", "Blood_bank");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the 'donors' table
    $insertQuery = "INSERT INTO donors (first_name, last_name, email, blood_type, gender, age, country) 
                    VALUES ('$first_name', '$last_name', '$email', '$blood_type', '$gender', '$age', '$country')";

    if ($conn->query($insertQuery) === TRUE) {
        // Display success message using modal or redirect
        echo '<script>
                alert("Donor registration successful! Thank you for joining the cause.");
                window.location.href = "Donor-Nav.php"; // Redirect to donor navigation page after successful registration
              </script>';
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

function display_empty_field_alert() {
    echo '<script>alert("Error: Please fill in all fields.");</script>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = isset($_POST['First_Name']) ? $_POST['First_Name'] : '';
    $lastName = isset($_POST['Last_Name']) ? $_POST['Last_Name'] : '';
    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $bloodType = isset($_POST['Blood_Type']) ? $_POST['Blood_Type'] : '';
    $gender = isset($_POST['Gender']) ? $_POST['Gender'] : '';
    $age = isset($_POST['Age']) ? $_POST['Age'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';

    // Check for empty fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($bloodType) || empty($gender) || empty($age) || empty($country)) {
        // Call the function to display the empty field alert
        display_empty_field_alert();
    } else {
        // Call the function to insert donor data into the database
        insert_donor_data($firstName, $lastName, $email, $bloodType, $gender, $age, $country);
    }

}

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Log In">
    <meta name="description" content="">
    <title>Donor-Reg</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Donor-Reg.css" media="screen">
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
    <meta property="og:title" content="Donor-Reg">
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
            <ul class="u-custom-font u-nav u-spacing-30 u-text-font u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="Home-Logged-In.php" style="padding: 10px 0px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="Home.php" style="padding: 10px 0px;">Signout</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home-Logged-In.php">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Signout</a>
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
          <div class="donor-reg">
            <h1>Donor Registration</h1>
            <h4>Register and help save a life</h4>
            <form action="Donor-Reg.php" method="post">
                <div class="form-group">
                    <input type="text" name="First_Name" placeholder="First Name" class="form-control">
                    <input type="text" name="Last_Name" placeholder="Last Name" class="form-control">
                </div>

                <div class="form-wrapper">
                    <input type="text" name="Email" placeholder="Email Address" class="form-control">
                </div>

                <div class="form-wrapper">
                    <select name="Blood_Type" class="form-control">
                        <option value="" disabled selected>Blood Type</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <div class="form-wrapper">
                    <select name="Gender" class="form-control">
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-wrapper">
                    <select name="Age" class="form-control">
                        <option value="" disabled selected>Age</option>
                        <?php
                        for ($i = 18; $i <= 65; $i++) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-wrapper">
                    <select name="country" id="country" class="form-control">
                        <option value="" disabled selected>Country</option>
                        <?php
                        // calls get_all_countries() function that returns an array of all countries
                        $countries = get_all_countries();

                        foreach ($countries as $country) {
                            echo "<option value=\"$country\">$country</option>";
                        }
                        ?>
                    </select>
                </div>

                <input type="submit" value="Submit" />
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