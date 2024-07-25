<?php
    session_start();
    require_once __DIR__ . '/functions.php';

    $password = '';
    $length = 12;
    $allow_duplicates = true;
    $characters = ['L', 'N', 'S'];
    $generation_type = 'random';
    $themes = ['fantasy'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ottiene la lunghezza dalla richiesta POST, se fornita
        $length = isset($_POST['length']) ? (int)$_POST['length'] : 12;
        // Ottiene se i duplicati sono permessi dalla richiesta POST
        $allow_duplicates = isset($_POST['allow_duplicates']) ? (bool)$_POST['allow_duplicates'] : true;
        // Ottiene i tipi di caratteri dalla richiesta POST, se forniti
        $characters = isset($_POST['characters']) ? $_POST['characters'] : ['L', 'N', 'S'];
        // Ottiene il tipo di generazione dalla richiesta POST, se fornito
        $generation_type = isset($_POST['generation_type']) ? $_POST['generation_type'] : 'random';
        $themes = isset($_POST['themes']) ? $_POST['themes'] : ['fantasy'];

        // Genera la password con la lunghezza e i tipi di caratteri specificati
        $password = generatePassword($length, $allow_duplicates, $characters, $generation_type, $themes);
        

        $_SESSION['password'] = $password;

        header('Location: show_password.php');
        exit();
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <div>
        <h1>Generatore di Password</h1>
        <form action="" method="post">
            <label for="length">Lunghezza password:</label>
            <input type="number" name="length" id="length" value="<?php echo htmlspecialchars($length); ?>" min="8" max="36" >

            <fieldset>
                <legend>Consenti duplicati:</legend>
                <label>
                    <input type="radio" name="allow_duplicates" value="1" <?php echo $allow_duplicates ? 'checked' : ''; ?>> Sì
                </label>
                <label>
                    <input type="radio" name="allow_duplicates" value="0" <?php echo !$allow_duplicates ? 'checked' : ''; ?>> No
                </label>
            </fieldset>

            <fieldset>
                <legend>Tipo di caratteri:</legend>
                <div>
                    <input type="checkbox" name="characters[]" id="letters" value="L" <?php echo in_array('L', $characters) ? 'checked' : '' ?>>
                    <label for="letters">Lettere</label>
                </div>
                <div>
                    <input type="checkbox" name="characters[]" id="numbers" value="N" <?php echo in_array('N', $characters) ? 'checked' : '' ?>>
                    <label for="letters">Numeri</label>
                </div>
                <div>
                    <input type="checkbox" name="characters[]" id="symbols" value="S" <?php echo in_array('S', $characters) ? 'checked' : '' ?>>
                    <label for="letters">Simboli</label>
                </div>
            </fieldset>

            <fieldset>
                <legend>Tipo di Generazione:</legend>
                <label >
                    <input type="radio" name="generation_type" value="random" <?php echo $generation_type === 'random' ? 'checked' : ''; ?>> Casuale
                </label>
                <label >
                    <input type="radio" name="generation_type" value="word" <?php echo $generation_type === 'word' ? 'checked' : ''; ?>> Parola di senso compiuto
                </label>
            </fieldset>
            
            <fieldset>
                <legend>Tema:</legend>
                <div>
                    <input type="checkbox" name="themes[]" id="fantasy" value="fantasy" <?php echo in_array('fantasy', $themes) ? 'checked' : ''; ?>>
                    <label for="fantasy">Fantasy</label>
                </div>
                <div>
                    <input type="checkbox" name="themes[]" id="harry_potter" value="harry_potter" <?php echo in_array('harry_potter', $themes) ? 'checked' : ''; ?>>
                    <label for="harry_potter">Harry Potter</label>
                </div>
                <div>
                    <input type="checkbox" name="themes[]" id="lotr" value="lotr" <?php echo in_array('lotr', $themes) ? 'checked' : ''; ?>>
                    <label for="lotr">Il Signore degli Anelli</label>
                </div>
                <div>
                    <input type="checkbox" name="themes[]" id="how_i_met_your_mother" value="how_i_met_your_mother" <?php echo in_array('how_i_met_your_mother', $themes) ? 'checked' : ''; ?>>
                    <label for="how_i_met_your_mother">How I Met Your Mother</label>
                </div>
            </fieldset>

            <button type="submit">Genera Password</button>
        </form>
        <?php if ($password): ?>
            <p>Password generata : <?php echo htmlspecialchars($password); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>