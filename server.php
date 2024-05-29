<?php 
require_once __DIR__ . "/partials/function.php";

// Ottieni i dati dei dischi dall'array associativo
$list_disc = get_data();

// Gestisci l'aggiornamento del like del disco se è stato inviato tramite POST
if(isset($_POST["index"])){
    $list_disc[$_POST["index"]]["disc_like"] = !$list_disc[$_POST["index"]]["disc_like"];
    // Salva le modifiche nel file JSON
    file_put_contents("dischi.json", json_encode($list_disc));
}

// Prepara la lista dei preferiti (se richiesto tramite POST)
$lista_preferiti = $list_disc;
if(isset($_POST["action_prefer"])) {
    $lista_preferiti = array_filter($lista_preferiti, function($disco) {
        return $disco["disc_like"] === true;
    });
}

// Costruisci l'array dei dischi da inviare al frontend
$dischi = [
    "results" => $lista_preferiti,
];

// Converti l'array dei dischi in una stringa JSON
$json_list_disc = json_encode($dischi);
// Imposta l'header per indicare che la risposta è in formato JSON
header("Content-type: application/json");
// Invia la risposta JSON al frontend
echo $json_list_disc;
?>