<?php
require_once __DIR__ . '/auth.php';
start_session();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //     http_response_code(405);
    //     exit('Alleen POST toegestaan');
    // }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        http_response_code(400);
        exit('Email en wachtwoord zijn verplicht');
    }

    $user = verify_login($email, $password);
    if (!$user) {
        http_response_code(401);
        exit('Onjuiste inloggegevens');
    }

    login_user($user);

    echo "Login geslaagd";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div id="header">
        <h2>Time2study</h2>
    </div>
    <div id="main_container">
        <form method="POST" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input class="input" type="text" id="email" name="email" placeholder="Example@gmail.com...">
            <input class="input" type="password" id="password" name="password" placeholder="Wachtwoord..." required>
            <button class='login_button' type='submit'>Login</button>
        </form>        
    </div>
</body>
</html>