<?php

session_start();

if ($_SESSION['page'] < 3 || !isset($_SESSION['score'])) {
    header('Location: index.php');
    return;
}

$percent = $_SESSION['score'] / 90 * 100;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QUIZ | GEEK</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container text-center">
    <h1>Score is: <?php echo number_format($percent, 0) . ' %' ?></h1>

    <a class="btn btn-primary w-50" href="reset.php">Reset</a>
</div>

</body>
</html>