
<?php
// Password protect this content
require_once('protect-this.php');
?>
<?php
$conn = mysqli_connect(/*inserire database*/);
//Check Connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM testgym WHERE id=" . $_POST["id"];
$result = ($conn->query($sql));
$rows = [];

if ($result->num_rows > 0) {
    // fetch all data from db into array 
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="./bootstrap-italia/css/bootstrap-italia.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="./bootstrap-italia/js/bootstrap-italia.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-color">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="./index.php">
                <img src="./logo.png" alt="" width="50" height="50">
            </a>
            <a class="navbar-brand bold" href="./index.php">Test Gym</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link bold" href="./index.php">Iscriviti <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bold" href="./accessi.php">Controlla i tuoi accessi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bold" href="./elenco.php">Elenco iscritti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bold" href="./entra.php">Effettua un accesso</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5 mb-5">

        <div class="card opacity without-border">
            <div class="card-header card-title white-text">
                Aggiorna i tuoi dati
            </div>
            <div class="card-body card-background">
                <form method="post" action="./aggiorna-dati.php">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp"
                            placeholder="Inserisci il tuo nome" value="<?php echo $rows[0]['nome']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="surname">Cognome</label>
                        <input type="text" name="surname" class="form-control" placeholder="Inserisci il tuo cognome" value="<?php echo $rows[0]['cognome']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Genere</label>
                        <select class="form-control" name="gender" id="exampleFormControlSelect1">
                            <option value="male" id="maschio">Maschio</option>
                            <option value="female" id="femmina">Femmina</option>
                            <option value="nonbinary" id="nonbinary">Preferisco non specificarlo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Inserisci la tua email" value="<?php echo $rows[0]['email']; ?>">
                    </div>
                    <input type="hidden" name="ntessera" value="<?php echo $rows[0]['ntessera']; ?>">
                    <div class="container button">
                        <button id="bottone" type="submit"
                            class="btn btn-primary hover card-title without-border">Aggiorna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="text-center text-white grey footer" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3 white-text" style="background-color: rgba(0, 0, 0, 0.2);">
            ?? 2020 Copyright:
            <a class="text-dark white-text" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script>
        let a = '<?php echo $rows[0]['genere'] ?>';
        if(a == 'male')
        {
            let male = document.getElementById('maschio');
            male.selected = 'selected';
        }
        else if(a == 'female')
        {
            let female = document.getElementById('femmina');
            female.selected = 'selected';
        }
        else if(a == 'nonbinary')
        {
            let nonbinary = document.getElementById('nonbinary');
            nonbinary.selected = 'selected';
        }
    </script>
</body>

</html>