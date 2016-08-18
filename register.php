<?php ob_start(); ?>
<?php include("includes/conn_open.php"); ?>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

    <?php
    if (isset($_POST['submit_value'])) {
        function has_presence($value) {
            return isset($value) && ($value !== "");
        }
        if (isset($_POST['user_interest'])){
            if (has_presence($_POST['user_name']) && has_presence($_POST['user_email']) && has_presence($_POST['user_address']) && has_presence($_POST['user_college']) && has_presence($_POST['user_city']) && has_presence($_POST['user_interest'])){
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_address = $_POST['user_address'];
                $user_college = $_POST['user_college'];
                $user_city = $_POST['user_city'];
                $user_interest = '';
                if($_POST['user_interest']){
                    foreach ($_POST['user_interest'] as $event){
                        $user_interest = $user_interest.$event." ";
                    }
                }
                $query = "INSERT INTO registration (user_name, user_email, user_address, user_college, user_city, user_interest)
                    VALUES ('{$user_name}', '{$user_email}', '{$user_address}', '{$user_college}', '{$user_city}', '{$user_interest}')";
                $result = mysqli_query($connection, $query);
                if($result){
                    echo "Registration Successful!";
                } else {
                    echo "Please don't leave any field blank";
                }
            }

        } else {
            echo "Please don't leave any field blank";
        }

    }
    ?>

    <form action="register.php" method="post">
      
        <h1>Register</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Personal Info</legend>
          <label for="name">Full Name:</label>
          <input type="text" id="name" name="user_name">
          
          <label for="mail">Email ID:</label>
          <input type="email" id="mail" name="user_email">
          
          <label>Address:</label>
          <input type="text" id="address" name="user_address">
        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Your Profile</legend>
          <label for="college">College:</label>
          <input type="text" id="college" name="user_college">

          <label for="college">City:</label>
          <input type="text" id="city" name="user_city">
          <!-- <textarea id="bio" name="user_bio"></textarea> -->
        </fieldset>
          
          
          
        <fieldset>
          <label>Events Interested:</label>
          <input type="checkbox" id="development" value="event1" name="user_interest[]"><label class="light" for="development">event 1</label><br>
            <input type="checkbox" id="design" value="event2" name="user_interest[]"><label class="light" for="design">event 2</label><br>
          <input type="checkbox" id="business" value="event3" name="user_interest[]"><label class="light" for="business">event 3</label><br>
          <input type="checkbox" id="development" value="event4" name="user_interest[]"><label class="light" for="development">event 4</label><br>
            <input type="checkbox" id="design" value="event5" name="user_interest[]"><label class="light" for="design">event 5</label><br>
          <input type="checkbox" id="business" value="event6" name="user_interest[]"><label class="light" for="business">event 6</label>
        
        </fieldset>
        <button type="submit" name="submit_value" value="submit">Register</button>
      </form>
      
    </body>
</html>
<?php include('includes/conn_close.php')?>