<?php
require "db.php";

$data = $_POST;
if (isset($data['do_login'])) {
    $errors = array();
    $user = R::findOne(
        'users',
        'login = ?',
        array($data['login'])
    );
    if ($user) {
        if( password_verify($data['password'], $user->password)) {
$_SESSION['logged_user'] = $user ;
echo '<div style="color: green;">Authorization complite!<br/>
You can back on <a href="/index.php">main page</a>.</div><hr>';
        } else {
            $errors[] = 'Password is wrong!';
            echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
        }
     } else {
            $errors[] = 'User with this login doesnt exist!';
            echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
        }
}
?>

<form action="login.php" method="POST">

    <p>
        <p style="font-size: 20px; font-weight: bold;">LOGIN</p>
        <input type="text" value="<?php echo @$data['login']; ?>" name="login">
    </p>

    <p>
        <p style="font-size: 20px; font-weight: bold;">PASSWORD</p>
        <input type="password" value="<?php echo @$data['password']; ?>" name="password">
    </p>

    <p>
        <button type="submit" name="do_login">CONTINUE</button>
    </p>
</form>

<a href="index.php">Back to main page!</a>