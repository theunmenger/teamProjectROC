<?php
require_once __DIR__ . '/db.php';

function start_session() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function password_correct($input, $stored) {
    if ($stored === '' || !is_string($stored)) return false;
    if ($stored[0] === '$') {
        return password_verify($input, $stored);
    }
    return $input === $stored;
}

function find_teacher($email) {
    $conn = db();
    $sql = ""; // sql
    // Vul $user met de leraar info uit de database
    return $user ?? null;
}

function find_student($email) {
    $conn = db();
    $sql = ""; // sql
    // Vul $user met de student info uit de database
    return $user ?? null;
}

function verify_login($email, $password) {
    $user = find_teacher($email);
    if ($user && password_correct($password, $user['password'])) {
        return $user;
    }
    $user = find_student($email);
    if ($user && password_correct($password, $user['password'])) {
        return $user;
    }
    return null;
}

function login_user($user) {
    start_session();
    $_SESSION['user'] = $user;
}

function current_user() {
    start_session();
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}
?>