<?php
// functions.php

// Function to get blood stock counts for each blood type
function get_blood_stock($conn) {
  $blood_stock = array();
  $blood_types = array('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-');
  
  foreach ($blood_types as $type) {
      $sql = "SELECT COUNT(*) AS count FROM donors WHERE Blood_Type = '$type'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $count = $row['count'];
      $blood_stock[$type] = $count;
  }
  
  return $blood_stock;
}


// Stores all countries in an array and returns the array
function get_all_countries() {
    // This array contains a list of countries
    $countries = array(
        "Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"
    );

    return $countries;
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "March_2003";
$dbname = "Blood_bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Build the SQL query to fetch all data from the "donors" table
$sql = "SELECT * FROM donors";
$result = $conn->query($sql);

// Call the get_blood_stock function to populate $blood_stock
$blood_stock = get_blood_stock($conn);

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Log In">
    <meta name="description" content="">
    <title>Admin</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Admin.css" media="screen">
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

    <script src="table2excel.js"></script>
    <meta name="theme-color" content="#8da3c8">
    <meta property="og:title" content="Admin">
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

      <h2>Admin page</h2>

      <div class = "stock-container">
      <h3>Current Stock</h3>
    </div>

      <div class="table-container">
      <input type="submit" value="Extract stock csv" id="extract-stock"/>
            <table class="content-table" id="stock-table">
                <thead>
                <tr>
                    <th>Blood Type</th>
                    <th>Count</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Check if $blood_stock is not empty before using foreach loop
                if (!empty($blood_stock)) {
                    foreach ($blood_stock as $type => $count) {
                        echo "<tr>";
                        echo "<td data-cell= Bloodtype>$type</td>";
                        echo "<td data-cell= Count>$count</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No data found</td></tr>";
                }
                ?>
              </tbody>
          </table>
          <script>
        document.getElementById('extract-stock').addEventListener('click',function() {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("#stock-table"));
        });
        </script>
      </div>

        <form action="Admin.php" method="post">
                <div class="form-group">
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
                    <input type="submit" value="Filter" />
                    <input type="submit" name="showAll" value="Display All" />
                    <input type="submit" value="Extract csv" id="extract-csv"/>
                </div>

                <?php
                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get the selected values from the form
                    $bloodType = isset($_POST["Blood_Type"]) ? $_POST["Blood_Type"] : '';
                    $selectedCountry = isset($_POST["country"]) ? $_POST["country"] : '';

                    // Build the SQL query based on form inputs
                    if (!empty($bloodType) && !empty($selectedCountry)) {
                        $sql = "SELECT * FROM donors WHERE Blood_Type = '$bloodType' AND Country = '$selectedCountry'";
                    } elseif (!empty($bloodType)) {
                        $sql = "SELECT * FROM donors WHERE Blood_Type = '$bloodType'";
                    } elseif (!empty($selectedCountry)) {
                        $sql = "SELECT * FROM donors WHERE Country = '$selectedCountry'";
                    } elseif (isset($_POST["showAll"])) {
                        $sql = "SELECT * FROM donors";
                    }

                    // Execute the query
                    $result = $conn->query($sql);
                }
                ?>

        </form>
        <div class="table-container">
            <table class="content-table" id="donor-table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Blood Type</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Country</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        // Display data in the table
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td data-cell= First-Name>" . $row['First_Name'] . "</td>";
                                echo "<td data-cell= Last-Name>" . $row['Last_Name'] . "</td>";
                                echo "<td data-cell= Email>" . $row['Email'] . "</td>";
                                echo "<td data-cell= Blood-type>" . $row['Blood_Type'] . "</td>";
                                echo "<td data-cell= Gender>" . $row['Gender'] . "</td>";
                                echo "<td data-cell= Age>" . $row['Age'] . "</td>";
                                echo "<td data-cell= Country>" . $row['Country'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No data found</td></tr>";
                        }

                        // Close the connection
                        $conn->close();
                    ?>
                </tbody>
            </table>
            <script>
        document.getElementById('extract-csv').addEventListener('click',function() {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("#donor-table"));
        });
        </script>
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