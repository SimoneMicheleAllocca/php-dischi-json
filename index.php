<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    

    <!-- Vue.js -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
   

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <!-- CSS  -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- /Custom Style -->
    <title>Document</title>
</head>

<body>
    <div id="app">

        <div class="container">
            <nav class="navbar">
                <div class="container-fluid md_cont">
                    <a class="navbar-brand px-5 " href="#">
                        <i class="fa-brands fa-spotify fs-1 px-5"></i>
                    </a>
                    <!-- Link per visualizzare i preferiti -->
                    <span @click.prevent="preferiti()">
                        <a href="">Visualizza Preferiti</a>
                    </span>
                    <!-- Link per visualizzare tutti gli elementi -->
                    <span @click.prevent="vediTutti()">
                        <a href="">Visualizza Tutti</a>
                    </span>
                </div>
            </nav>

        </div>
        <div class="container py-5">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 d-flex justify-content-between">
                <!-- Ciclo per generare le card dei dischi -->
                <div class="col-4 py-2" v-for="(curDischi, index) in dischi">
                    <div class="card">
                        <div class="card-body text-center text-light">
                            <img class="rounded w-75" :src="curDischi.poster" alt="">
                            
                            <h6 class="card-title text-center py-3">
                                {{ curDischi.title }}
                            </h6>
                            
                            <h6 class="card-title text-center">
                                {{ curDischi.author }}
                            </h6>
                            
                            <p class="card-text text-center py-2">
                                {{ curDischi.year }}
                            </p>
                            <div>
                                <button @click="likeDisc(index)"><!-- Bottone per mettere/togliere "Mi piace" -->
                                    <!-- Visualizza l'icona del cuore pieno o vuoto a seconda dello stato di "disc_like" -->
                                    <span v-if="curDischi.disc_like == true">
                                        <i class="fa-solid fa-heart text-success"></i>
                                    </span>
                                    <span v-else>
                                        <i class="fa-regular fa-heart text-light"></i>
                                    </span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="./js/script.js"></script>
</body>

</html>