<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="david margalejo" />
        <title>aplicacion pesca</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Pescapp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Clasificaciones</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Introduce las capturas</h1>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="assets/fishing.png" alt="..." /></figure>
                        <!-- Post content-->
                        <form action="pescappc.php" method="POST">
                            <h2> Introducir datos</h2>
                            <p><label>Pescador: </label><input type="text" name="Pescador"></p>
                            <p>Manga</p>
                            <label for="1º">1º</label><input type="radio" name="manga"value="1"></p>
                            <label for="2º">2º</label><input type="radio" name="manga"value="2"></p>
                            <label for="3º">3º</label><input type="radio" name="manga"value="3"></p>
                            <label for="4º">4º</label><input type="radio" name="manga"value="4"></p>
                            <h2> Introducir capturas</h2>
                            <p><label>Captura1: </label><input type="number" name="1"></p>
                            <p><label>Captura2: </label><input type="number" name="2"></p>
                            <p><label>Captura3: </label><input type="number" name="3"></p>
                            <p><label>Captura4: </label><input type="number" name="4"></p>
                            <p><label>Captura5: </label><input type="number" name="5"></p>
                            <p><label>Captura6: </label><input type="number" name="6"></p>
                            <p><label>Captura7: </label><input type="number" name="7"></p>
                            <p><label>Captura8: </label><input type="number" name="8"></p>
                            <p><label>Captura9: </label><input type="number" name="9"></p>
                            <p><input type="submit" name="Publicar"></p>
                        </form>
                        <?php
                        include ("pescappc.php");
                        ?>
                        <table> 
		                        <tr>
			                        <th>pescador</th>
			                        <th>manga</th>
			                        <th>puntos</th>
                                </tr>

                                <?php showpuntuaciones(); ?>
	                    </table>

                       


                    
                
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; David Margalejo</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
