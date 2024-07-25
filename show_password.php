<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La tua Password</title>
</head>
<body>
    <div>
        <h1>Password Generata</h1>
        <?php 
            if(isset($_SESSION['password'])) {
                echo '<p>Password generata: ' . htmlspecialchars($_SESSION['password']) . '</p>';

                unset($_SESSION['password']);
            } else {
                echo '<p>Nessuna password generata.</p>';
            }
        ?>
        <a href="index.php">Torna alla pagina principale</a>
    </div>
</body>
</html>