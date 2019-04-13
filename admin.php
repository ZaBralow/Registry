<?php 
require "db.php";
?>

<?php
if($_SESSION['logged_user']->login == 'oldmen')  : ?>
<p style="color: green">Logged admin: <p style="font-size: 40px;
font-weight: bold;"><?php echo $_SESSION['logged_user']->login?></p></p>
<hr>
<a href="index.php">Back to main page!</a>
<br>
<a href="/logout.php">Exit</a>
<?php else : ?>
<h1 style="color:red;">You are not admin!!! ebat ti loh.</h1>
<a href="index.php">Back to main page!</a>
<?php endif; ?>