<!DOCTYPE html>
<html lang="pt-PT">
<?php include 'data.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oração da manhã</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <main class="main" style="background-color: <?php echo $corbackground ?>; color: <?php echo $cortexto ?>">
        <div class="row wrap container-fluid" style="width='100vh'">
            <div class="container row h-100">
                <div id="carouselExampleIndicators" class="col-md-7 h-100 carousel slide" style="min-height: 100vh;">
                    <?php echo '<h1>' . $titulo . '</h1>';
                    echo "<h4>" . $dia . "/" . $mes . "/" . $ano . "</h4>";
                    echo '<div class="carousel-indicators">';
                    for ($slide = 0; $slide < 3; $slide++) {
                        $activeClass = $slide === 0 ? 'class="active" aria-current="true"' : '';
                        echo '<button type="button" data-bs-target="#carouselExampleIndicators" 
                            data-bs-slide-to="' . $slide . '" ' . $activeClass . '
                            aria-label="Slide ' . ($slide + 1) . '"></button>';
                    }
                    echo '</div>';
                    ?>
                    <div class="carousel-inner">
                        <?php foreach ($texto as $index => $slide) {
                            $activeClass = $index === 0 ? ' active' : '';
                            echo '<div class="carousel-item' . $activeClass . '">
                                <p>' . $texto[$index] . '</p>
                            </div>';
                        } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                    <div id="audio"></div>
                    <button id="audio_button" class="position-fixed bottom-0 m-2" onclick="clicked()"
                        style="border: none; right: 45px; color: <?php echo $cortexto ?>; background-color: <?php echo $corbackground ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-volume-mute" viewBox="0 0 16 16">
                            <path
                                d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06M6 5.04 4.312 6.39A.5.5 0 0 1 4 6.5H2v3h2a.5.5 0 0 1 .312.11L6 10.96zm7.854.606a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0" />
                        </svg>
                    </button>
                </div>


                <div class="col-md-5">
                    <?php echo '<div class="bg-image d-none d-md-block h-100" style="background-image: url(' . $imagem . '); background-position: end" alt="' . $altimage . '" id="Image">
                    <img src="CSM_ball_logo_oficial.png" alt="Logo Colégio" width="100vh" height="100vh">
                    </div>' ?>
                </div>
                
            </div>
        </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        var isMuted = 1
        var mutedIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-volume-mute" viewBox="0 0 16 16"><path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06M6 5.04 4.312 6.39A.5.5 0 0 1 4 6.5H2v3h2a.5.5 0 0 1 .312.11L6 10.96zm7.854.606a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0"/></svg>';
        var unmutedIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-volume-up-fill" viewBox="0 0 16 16"><path d="M11.536 14.01A8.47 8.47 0 0 0 14.026 8a8.47 8.47 0 0 0-2.49-6.01l-.708.707A7.48 7.48 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303z"/><path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.48 5.48 0 0 1 11.025 8a5.48 5.48 0 0 1-1.61 3.89z"/><path d="M8.707 11.182A4.5 4.5 0 0 0 10.025 8a4.5 4.5 0 0 0-1.318-3.182L8 5.525A3.5 3.5 0 0 1 9.025 8 3.5 3.5 0 0 1 8 10.475zM6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06"/></svg>';
        var player

        function onYouTubeIframeAPIReady() {
            var url = '<?php echo $linkmusica ?>';
            var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/embed\/|\/shorts\/|\/live\/|\/)([a-zA-Z0-9_-]{11})/);
            if (videoid == null) {
                console.log("The youtube url is not valid.");
            }

            player = new YT.Player('audio', {
                width: '0', height: '0',
                videoId: videoid[1],
                playerVars: {
                    controls: 0,
                    autoplay: 0,
                    mute: 0,
                    loop: 1,
                    playlist: videoid[1]
                },
                events: {
                    onStateChange: function (e) {
                        isPlaying = e.data === YT.PlayerState.PLAYING;
                    }
                }
            });
        }

        // This handles the race condition — if the API already loaded, call it manually
        if (window.YT && window.YT.Player) {
            onYouTubeIframeAPIReady();
        }

        function clicked() {
            if (isMuted == 0) {
                document.getElementById('audio_button').innerHTML = mutedIcon
                isMuted = 1
                player.pauseVideo()
            } else if (isMuted == 1) {
                document.getElementById('audio_button').innerHTML = unmutedIcon
                isMuted = 0
                player.playVideo()
            }
        }
    </script>
</body>
</html>
<!--Feito por: Lucas da Silva e Illia Kucher 11ºF 2025/26-->