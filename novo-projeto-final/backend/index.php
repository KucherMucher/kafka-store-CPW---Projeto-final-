<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.6">
        <meta name="description" content="CPW Final Project">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Illia Kucher">
        <title>Back End</title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet" >
        <!--<script src="./js/main.js"></script>-->
    </head>
    <body>
        <div class="container-fluid p-0">
            <?php include 'header.php';?>
            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                else{
                    $page = "backend";
                }
                include 'navsystem.php';
            ?>
            
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>