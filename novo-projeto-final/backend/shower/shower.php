<!DOCTYPE html>
<html lang="pt-PT">
<?php include 'shower/data.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oração da manhã</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="shower/styles.css" rel="stylesheet">
</head>
<body>
    <main class="main" style="background-color: navy; color: white; height: 720px !important;"> <!-- Ratio: 1.56 -->
        <div class="row wrap container-fluid" >
            <div class="container row h-100">
                <div class="bg-image col-md-5 d-block" style="background-image: url('shower/toco-toucan-toucano-cabeça-de-aves-do-parque-das-foz-iguacu-brasil-pa-pássaro-tuco-ramphastos-para-fechar-retrato-no-parques-167759732.webp');" alt="Imagem de um tucano" id="Image">
                    <img src="shower/CSM_ball_logo_oficial.png" alt="Logo Colégio" width="100vh" height="100vh">
                </div>
                <div id="carouselExampleIndicators" class="col-md-7 h-100 carousel slide" style="min-height: 100vh;">
                    <h1>Título</h1>
                    <h4>dia/mês/ano</h4>

                    <div id="audio"></div>
                    <button id="audio_button" class="position-fixed bottom-0 m-2"
                        style="border: none; right: 45px; color: white; background-color: navy">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-volume-mute" viewBox="0 0 16 16">
                            <path
                                d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06M6 5.04 4.312 6.39A.5.5 0 0 1 4 6.5H2v3h2a.5.5 0 0 1 .312.11L6 10.96zm7.854.606a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
</html>
<!--Feito por: Lucas da Silva e Illia Kucher 11ºF 2025/26-->