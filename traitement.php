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

        /*************************************************************************************************************
         * il faut echapper les caractere speciaux sinon ils seront interpreté par le navigateur d'ou l'utilisation
         * de htmlentities
         * ************************************************************************************************************
         */
       echo "Texte original : " .htmlentities($texteOriginal);
       echo "Texte traité : " . $texteTraite;
    }
}
?>
