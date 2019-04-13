<?php
require "db.php";


$data = $_POST;
if (isset($data['do_signup'])) {
    if (trim($data['login']) == '') {
        $errors[] = 'Login is empty!';
    }
    if (trim($data['email']) == '') {
        $errors[] = 'Email is empty!';
    }
    if (trim($data['password']) == '') {
        $errors[] = 'Password is empty!';
    }
    if (trim($data['password2']) != $data['password']) {
        $errors[] = 'Wrong password!';
    }
    if (R::count('users', "login = ? OR email = ?",
    array($data['login'], $data['email'])) > 0 ) {
        $errors[] = 'Login or Email is already on occupation!';
    }
    if (empty($errors)) {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash(
            $data['password2'],
            PASSWORD_DEFAULT
        );
        R::store($user);
        echo '<div style="color: green;">Registration complite!</div><hr>';
    } else {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
}




?>







<form action="/signup.php" method="POST">

    <p>
        <p style="font-size: 20px; font-weight: bold;">LOGIN</p>
        <input type="text" value="<?php echo @$data['login']; ?>" name="login">
    </p>

    <p>
        <p style="font-size: 20px; font-weight: bold;">EMAIL</p>
        <input type="email" value="<?php echo @$data['email']; ?>" name="email">
    </p>

    <p>
        <p style="font-size: 20px; font-weight: bold;">PASSWORD</p>
        <input type="password" value="<?php echo @$data['password']; ?>" name="password">
    </p>


    <p>
        <p style="font-size: 20px; font-weight: bold;">REPEAT PASSWORD</p>
        <input type="password" value="<?php echo @$data['password2']; ?>" name="password2">
    </p>



    <p>
        <button type="submit" name="do_signup">CONTINUE</button>
    </p>

</form>
<a href="index.php">Back to main page!</a>