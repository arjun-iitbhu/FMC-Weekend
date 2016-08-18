
<?php
echo $_POST['user_name'];
echo $_POST['user_email'];
echo $_POST['user_address'];
echo $_POST['user_college'];
echo $_POST['user_city'];
echo $_POST['user_interest'];
echo $_POST['submit_value'];
?>

<?php
if (isset($_POST['submit_value'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_college = $_POST['user_college'];
    $user_city = $_POST['user_city'];
    $user_interest = $_POST['user_interest'];
    $query = "INSERT INTO registration (user_name, user_email, user_address, user_college, user_city, user_interest)
                    VALUES ('{$_POST['user_name']}', '{$_POST['user_email']}', '{$_POST['user_address']}', '{$_POST['user_college']}', '{$_POST['user_city']}', '{$_POST['user_interest']}')";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "Success!";
    } else {
        die("Database query failed ".mysqli_error($connection));
    }
}
?>
<?php include("conn_open.php"); ?>
