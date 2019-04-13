<?php
require "db.php";
?>

<?php if (isset($_SESSION['logged_user'])) : ?>
    Autorized!
    Hello, <?php echo $_SESSION['logged_user']->login; ?>!
    <hr>
    <a href="/admin.php">Go to admin!</a>
    <a href="/logout.php">Exit</a>


<?php else : ?>
    You doesnt authorised, do something:
    <br>
    <a href="/login.php">Authorization</a>
    <br>
    <a href="/signup.php">Registration</a>
<?php endif; ?>