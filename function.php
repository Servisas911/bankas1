<?php

// Funkcija sukuria naują sąskaitą
function sukurti_saskaita($vardas, $pavarde, $asmens_kodas) {
    // Generuojame sąskaitos numerį
    $sas_nr = generate_iban();

    // Patikriname, ar asmens kodas unikalus
    if (is_unique_asmens_kodas($asmens_kodas)) {
        // Sukuriame naują sąskaitą
        $sas = [
            'vardas' => $vardas,
            'pavarde' => $pavarde,
            'sas_nr' => $sas_nr,
            'likutis' => 0,
        ];

        // Įrašome sąskaitą į duomenų bazę
        $db = get_db();
        $db->insert('saskontos', $sas);

        // Grąžiname sėkmės pranešimą
        return 'Sąskaita sukurta sėkmingai!';
    } else {
        // Grąžiname klaidos pranešimą
        return 'Toks asmens kodas jau egzistuoja!';
    }
}

// Funkcija gauna sąskaitos informaciją
function gauti_saskaita($sas_nr) {
    // Gauti sąskaitos informaciją iš duomenų bazės
    $db = get_db();
    $query = $db->query("SELECT * FROM saskaitos WHERE sas_nr = '$sas_nr'");
    $saskaita = $query->fetch_assoc();

    // Jei sąskaita nerasta, grąžinti tuščią masyvą
    if (!$saskaita) {
        return [];
    } else {
        // Grąžinti sąskaitos informaciją
        return $saskaita;
    }
}

// Funkcija atnaujina sąskaitos informaciją
function atnaujinti_saskaita($sas_nr, $likutis) {
    // Patikriname, ar sąskaitoje yra lėšų
    if ($likutis >= 0) {
        // Atnaujina sąskaitos informaciją
        $db = get_db();
        $query = $db->query("UPDATE saskaitos SET likutis = $likutis WHERE sas_nr = '$sas_nr'");

        // Grąžinti sėkmės pranešimą
        return 'Sąskaitos informacija atnaujinta sėkmingai!';
    } else {
        // Grąžinti klaidos pranešimą
        return 'Sąskaitoje negali būti minusinės sumos!';
    }
}

// Funkcija ištrina sąskaitą
function istrinti_saskaita($sas_nr) {
    // Patikriname, ar sąskaitoje nėra lėšų
    if (gauti_saskaita($sas_nr)['likutis'] == 0) {
        // Ištrina sąskaitą
        $db = get_db();
        $db->query("DELETE FROM saskaitos WHERE sas_nr = '$sas_nr'");

        // Grąžinti sėkmės pranešimą
        return 'Sąskaita ištrinta sėkmingai!';
    } else {
        // Grąžinti klaidos pranešimą
        return 'Sąskaitoje yra lėšų, todėl jos negalima ištrinti!';
    }
}

// Funkcija generuoja
