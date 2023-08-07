<?php
function removeSpecialChars($text) {
    // Supprimer les accents
    $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
    
    // Supprimer les apostrophes
    $text = str_replace("'", "", $text);
    
    // Supprimer les caractères spéciaux
    $text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text);
    
    return $text;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["texte"])) {
        $texteOriginal = $_POST["texte"];
        $texteTraite = removeSpecialChars($texteOriginal);

       echo "Texte original : " .htmlentities( $_POST["texte"]);
       echo "Texte traité : " . $texteTraite;
    }
}
?>
