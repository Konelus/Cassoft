<?php
    ini_set('display_errors', 0);
    require_once ($_SERVER["DOCUMENT_ROOT"]."/controllers/controller.php");
?>

<!DOCTYPE html>

<html lang = 'ru'>
    <head>
        <title>Тестовое задание</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/dist/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/dist/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/styles/styles.css">
        <link rel="stylesheet" href="/styles/modal.css">
        <link rel="stylesheet" href="/styles/profile.css">
        <link rel="stylesheet" href="/styles/posts.css">
        <link rel="stylesheet" href="/styles/add.css">
        <link rel="stylesheet" href="/styles/message.css">
    </head>
    <body style = 'cursor: default;'>
        <div class = 'container-fluid'>
            <div class = 'row'>
                <div class = 'col'>
                    <?php if ($_COOKIE['user']) { ?>
                    <div class = 'main-body'>
                        <?php require_once($_SERVER['DOCUMENT_ROOT']."/pages/header.php"); ?>
                        <div class = 'row'>
                            <div class = 'col'></div>
                            <div class = 'col-6'>
                                <?php
                                    if ($_GET['page']) { require_once($_SERVER['DOCUMENT_ROOT']."/pages/{$_GET['page']}.php"); }
                                ?>
                            </div>
                            <div class = 'col'></div>
                        </div>
                        <?php require_once($_SERVER['DOCUMENT_ROOT']."/pages/footer.php"); ?>
                    </div>
                    <?php } else
                    {
                        require_once($_SERVER['DOCUMENT_ROOT']."/pages/login.php");
                        $login = true;
                    } ?>
                </div>
            </div>
        </div>
    </body>
</html>


<script>
    <?php if ($login == true) { ?>$(".login").modal("show");<?php } ?>
</script>