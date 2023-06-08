<?php
 $servername = "db";
 $username = "peter";
 $password = "peter01";
 $dbname = "pebank";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$genero = $_POST['sexo'];

$sqlultimo = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
$result2 = mysqli_query($conn, $sqlultimo);
$lastRecord = mysqli_fetch_assoc($result2);
$lastId = $lastRecord['id'];

if ($genero == 'masculino') {
    $genero = 'male';
  } else {
    $genero = 'female';
  }

$sql = "INSERT INTO users (id,name, age, gender) VALUES ($lastId+1,'$nombre', $edad, '$genero')";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit;
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
// Cierra la conexión
mysqli_close($conn);
?>
