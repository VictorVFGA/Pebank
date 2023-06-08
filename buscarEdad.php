<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BusquedaEdad</title>
</head>

<body>
    <div class="panel">
        <div class="users">
            <?php
            $servername = "db";
            $username = "peter";
            $password = "peter01";
            $dbname = "pebank";
            $conexion = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conexion) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            $edad = $_POST['edad'];
            $query = "SELECT * FROM users WHERE age=$edad";
            $result = mysqli_query($conexion, $query);
            while ($i = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card" <?php echo $i['name'] ?>>
                    <h2 style="text-align: center;"><?php echo $i['name']; ?></h2>
                    <?php
                    if ($i['gender'] == 'male') {
                        $gender = 'hombre';
                    } else {
                        $gender = 'mujer';
                    }
                    ?>
                    <div class="sexo"><img src="../img/<?php echo $gender ?>.png" /></div>
                    <div class="info">
                        <p>
                            ID:
                            <?php echo $i['id']; ?>
                        </p>
                        <p>
                            Edad:
                            <?php echo $i['age']; ?>
                        </p>
                        <p>
                            Sexo:
                            <?php echo $gender; ?>

                    </div>
                </div>
            <?php } ?>
            <a href="index.php"><button>Regresar</button></a>
</body>

</html>
<?php
