<?php
// Funzione per ottenere i dati dai dischi JSON e restituirli come array associativo
function get_data() {
    // Legge il contenuto del file dischi.json e lo converte in stringa
    $file_to_string = file_get_contents("dischi.json");
    // Decodifica la stringa JSON in un array associativo
    return json_decode($file_to_string, true);
}
?>