<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.6">
        <meta name="description" content="CPW Final Project">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Illia Kucher">
        <title>Cool Site</title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/porter-sans-block" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/reddit-sans" rel="stylesheet">
        <script src="./js/main.js"></script>
    </head>
    <body>
        <div class="container-fluid p-0">
            <?php include 'header.php';?>
            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                else{
                    $page = "home";
                }
                switch ($page) {
                    case 'home':
                        include 'home.php';
                        break;
                    case 'test':
                        include 'test.php';
                        break;
                }
            ?>
            <?php include 'connect.php' ?>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>