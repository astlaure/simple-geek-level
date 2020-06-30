<?php

session_start();

if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 1;
    $_SESSION['score'] = 0;
}
if ($_SESSION['page'] > 3) {
    header('Location: results.php');
    return;
}

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

<div class="container">
    <?php
    switch ($_SESSION['page']) {
        case 1:
            include_once dirname(__DIR__) . '/partials/page1.php';
            break;
        case 2:
            include_once dirname(__DIR__) . '/partials/page2.php';
            break;
        case 3:
            include_once dirname(__DIR__) . '/partials/page3.php';
            break;
        default:
    }
    ?>

    <form action="/next.php" method="post">
        <?php foreach ($questions as $question): ?>
        <div>
            <h2><?php echo $question["title"] ?></h2>

            <?php foreach ($question["choices"] as $choice): ?>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="<?php echo $choice["id"] ?>" name="<?php echo $choice["name"] ?>" value="<?php echo $choice["value"] ?>">
                <label for="<?php echo $choice["id"] ?>" class="form-check-label"><?php echo $choice["label"] ?></label>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        <input type="submit" value="Next">
    </form>
</div>

</body>
</html>