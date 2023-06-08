<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo.png" />
  <link rel="stylesheet" href="style.css">
  <title>PeBank</title>
</head>

<body class="grid-container">
  <?php
  $servername = "db";
  $username = "peter";
  $password = "peter01";
  $dbname = "pebank";

  // Crear conexión
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Verificar conexión
  if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
  }
  ?>
  <header class="header">
    <h1>PeBank</h1>
    <div class="logo">
      <img src="../img/logo.png" alt="logo" />
    </div>
  </header>
  <nav class="navbar">
    <form action="guardar.php" method="POST">

      <?php
      $sqlultimo = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
      $result2 = mysqli_query($conn, $sqlultimo);
      $lastRecord = mysqli_fetch_assoc($result2);
      $lastId = $lastRecord['id'];

      ?>
      <h2>NUEVO</h2>
      <div class="User">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $lastId + 1; ?>" disabled placeholder="<?php echo $lastId + 1; ?>" />
      </div>
      <div class="User">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" />
      </div>

      <div class="User">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" />
      </div>

      <div class="User">
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo">
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
        </select>
      </div>
      <div class="User" style="text-align: center">
        <button type="submit">Registrar</button>
      </div>
    </form>
    <div class="busqueda" style="text-align: center">
      <h2>BUSQUEDA</h2>
      <form action="buscarNombre.php" method="POST">
        <div class="User">
          <label for="nombreFiltro">Nombre:</label>
          <input type="text" id="nombreFiltro" name="nombre" onclick="activarNombre()" />
        </div>
        <button class="buscar" type="submit">BUSCAR</button>
      </form>
      <form action="buscarEdad.php" method="POST">
        <div class="User">
          <label for="edadFiltro">Edad:</label>
          <input type="text" id="edadFiltro" name="edad" onclick="activarNombre()" />
        </div>
        <button class="buscar" type="submit">BUSCAR</button>
      </form>
      <form action="buscarSexo.php" method="POST">
         <select id="sexo" name="sexo">
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
        </select>
        <button class="buscar" type="submit">BUSCAR</button>
      </form>
  </nav>
  <article class="main">
    <div class="panel">
      <div class="users">
        <?php
        $sql = "SELECT * FROM users";
        $row = mysqli_query($conn, $sql);
        // Recorremos los resultados y los mostramos en una tabla
        while ($i = mysqli_fetch_assoc($row)) {
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
        <?php }
        ?>
        </p>
      </div>
    </div>
  </article>
</body>

</html>