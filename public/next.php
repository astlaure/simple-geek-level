<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    header('Location: index.php');
    return;
}

if(!isset($_POST['first']) || !isset($_POST['second']) || !isset($_POST['third'])){
    header('Location: quiz.php');
    return;
}

session_start();

$_SESSION['page']++;

if ($_SESSION['page'] > 3) {
    header('Location: results.php');
    return;
}

$answers = [
    [
        [ 0, 10, 5 ],
        [ 10, 5, 0 ],
        [ 5, 10, 0 ]
    ],
    [
        [ 5, 0, 10 ],
        [ 5, 10, 0 ],
        [ 0, 10, 5 ]
    ],
    [
        [ 0, 10, 5 ],
        [ 10, 5, 0 ],
        [ 5, 10, 0 ]
    ]
];

$_SESSION['score'] += $answers[$_SESSION['page'] - 1][0][$_POST['first'] - 1];
$_SESSION['score'] += $answers[$_SESSION['page'] - 1][1][$_POST['second'] - 1];
$_SESSION['score'] += $answers[$_SESSION['page'] - 1][2][$_POST['third'] - 1];

header('Location: quiz.php');