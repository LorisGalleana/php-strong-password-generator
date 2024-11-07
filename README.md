
# PHP Strong Password Generator

Un generatore di password sicure, creato con PHP.

## Descrizione del Progetto

Questo progetto consente agli utenti di generare password casuali e sicure, con diverse opzioni di personalizzazione. L’applicazione permette di impostare la lunghezza della password e di scegliere quali caratteri includere, come numeri, lettere e simboli. Tramite una pagina dedicata e l'uso delle variabili di sessione, la password generata viene mostrata all’utente.

## Funzionalità Principali

1. **Generazione della Password**  
   Attraverso un form, l'utente può inserire la lunghezza della password desiderata. Una funzione genera quindi una password casuale utilizzando lettere, lettere maiuscole, numeri e simboli.

2. **Struttura Ordinata**  
   La logica di generazione della password è organizzata separatamente in un file `functions.php` per garantire un codice più pulito e modulare.

3. **Visualizzazione Dedicata**  
   La password generata viene mostrata su una pagina separata grazie all'uso di variabili di sessione (`$_SESSION`), rendendo più chiaro il risultato all’utente.

4. **Opzioni di Personalizzazione Avanzata**  
   L'utente può selezionare quali tipi di caratteri includere nella password (numeri, lettere, simboli) e scegliere se consentire o meno la ripetizione di caratteri uguali per una maggiore sicurezza.

## Struttura del Progetto

- `index.php`: Pagina principale che include il form per la generazione della password.
- `functions.php`: File contenente la logica per la generazione della password.
- `password.php` (opzionale, per la visualizzazione dedicata): Pagina che mostra la password generata all’utente utilizzando la sessione.

## Come Usare il Progetto

1. Clona il repository:
   ```bash
   git clone https://github.com/username/php-strong-password-generator.git
   ```
2. Accedi alla cartella del progetto:
   ```bash
   cd php-strong-password-generator
   ```
3. Avvia un server PHP locale:
   ```bash
   php -S localhost:8000
   ```
4. Visita `http://localhost:8000` nel browser, inserisci la lunghezza della password e scegli le opzioni di personalizzazione per generare la tua password sicura.
