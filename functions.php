<?php
require_once __DIR__ . '/dictionary.php';

    function generatePassword($length = 12, $allow_duplicates = true, $characters = ['L', 'N', 'S'], $generation_type = 'random', $themes = ['fantasy']) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $symbols = '!?&%$<>^+-*/()[]{}@#_=';

        if ($generation_type === 'word') {
            return generatePasswordFromWord($length, $characters, $themes);
        }
        
        // Crea una stringa di base in base ai caratteri selezionati
        $base_string = createBaseString($alphabet, $numbers, $symbols, $characters); 

        return getPassword($base_string, $length, $allow_duplicates);
    }

    function generatePasswordFromWord($length, $characters, $themes) {
        global $themes_data;

        $combined_words = [];
        foreach ($themes as $theme) {
            if (isset($themes_data[$theme])) {
                $combined_words = array_merge($combined_words, $themes_data[$theme]);
            }
        }

        if (empty($combined_words)) {
            return ''; // Restituisce una stringa vuota se non ci sono parole
        }

        $word = $combined_words[array_rand($combined_words)];

        if (strlen($word) > $length) {
            $word = substr($word, 0, $length);
        } else {
            $extra_chars = '0123456789!?&%$<>^+-*/()[]{}@#_=';

            while (strlen($word) < $length) {
                $word .= $extra_chars[rand(0, strlen($extra_chars) - 1)];
            }

            /* $word = str_shuffle($word); */
        }

        return $word;

    }

    function getPassword($base_string, $length, $allow_duplicates) {
        $password = '';

        while(strlen($password) < $length) {
            $index = rand(0, strlen($base_string) - 1); //genera un numero randomico tra 0 e la lunghezza dei caratteri di base_string - 1
            $char = $base_string[$index];

            if($allow_duplicates || !str_contains($password, $char)) {
                $password .= $char;
            }
        }

        return $password;
    }

    function createBaseString($alphabet, $numbers, $symbols, $characters) {
        $fullCharacters = '';
        if (in_array('L', $characters)) {
            $fullCharacters .= $alphabet . strtoupper($alphabet);
        }
        if (in_array('N', $characters)) {
            $fullCharacters .= $numbers;
        }
        if (in_array('S', $characters)) {
            $fullCharacters .= $symbols;
        }
        return $fullCharacters;
    }
?>