<?php
// Password protect this content
require_once('protect-this.php');
?>
<?php
$conn = mysqli_connect("mysql.next-data.net", "www_13237", "uBaKfYFM", "www_wpschool_it");
//Check Connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "select * from trimonsgym";
$result = ($conn->query($sql));
//declare array to store the data of database
$rows = [];

if ($result->num_rows > 0) {
    // fetch all data from db into array 
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}

if ($conn->query($sql) === TRUE) {
    $verifica = true;
} else {
    $verifica = $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="./bootstrap-italia/css/bootstrap-italia.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="./bootstrap-italia/js/bootstrap-italia.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-color">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="./index.php">
                <img src="./logo.png" alt="" width="50" height="50">
            </a>
            <a class="navbar-brand bold" href="./index.php">Trimons Gym</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link bold" href="./index.php">Iscriviti <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bold" href="./accessi.php">Controlla i tuoi accessi</a>
                </li>
                <li class="nav-item active">
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
                Elenco Iscritti
            </div>
            <div class="card-body card-background">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Genere</th>
                            <th scope="col">Email</th>
                            <th scope="col">Numero Tessera</th>
                            <th scope="col">Accessi</th>
                            <th scope="col">Operazioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo $row['cognome']; ?></td>
                                <td><?php echo $row['genere']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['ntessera']; ?></td>
                                <td><?php echo $row['accessi']; ?></td>
                                <td>
                                    <div class="row">
                                        <form action="./stampaqr.php" class="mr-2" id="<?php echo $row['id']; ?>" method="POST">
                                            <input type="hidden" name="ntessera" value="<?php echo $row['ntessera']; ?>">
                                            <button type='submit' class='btn btn-success'><i class="fa-solid fa-qrcode"></i></button>
                                        </form>
                                        <form action="./update.php" class="mr-2" id="<?php echo $row['id']; ?>" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type='submit' class='btn btn-secondary'><i class="fa-solid fa-pen"></i></button>
                                        </form>
                                        <form action="./delete.php" id="<?php echo $row['id']; ?>" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type='submit' class='btn btn-danger'><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="text-center text-white grey footer" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3 white-text" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark white-text" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>