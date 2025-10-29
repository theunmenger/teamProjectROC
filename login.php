<?php
require_once __DIR__ . '/auth.php';
start_session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Alleen POST toegestaan');
}

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