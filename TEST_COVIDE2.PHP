<?php

echo'<H2 style="color:red; text-align:center">Formulaire de test de covide</H2>
<form action="" method="post" style="border: 1px solid green;item-aligne:center;text-align:justify;margin-left:30%;margin-right:30%;padding-left:5%;padding-bottom:5%;background-color:antiquewhite;">
    <div>
        <h3>Information Personnel(IP):</h3>
        <label for="">Nom</label> <input type="text" name="nom" required><br><br>
        <label for="">prenom</label> <input type="text" name="prenom" required><br><br>
        <label for="">poids</label> <input type="number" name="poids" required><br><br>
        <label for="">age</label> <input type="number" name="age" required>
    </div>
    
    <div>

        <h3>Température(T°c):</h3>
        <label for="">Quelle est votre température corporelle?</label> 
        <input type="number" name="temperature" value="temperature"  required>°c
       
    </div>
    <div>

        <h3>Maux de tête(MT):</h3>
        <label for="">Avez-vous les maux de tête?</label> 
        <input type="radio" name="tete" value="OUI" required>OUI
        <input type="radio" name="tete"  value="NON" required>NON
       
    </div>

    <div>
        <h3>(D):</h3>
        <label for="">Avez-vous la diarrée?</label> 
        <input type="radio" name="diarre" value="OUI" required>OUI
        <input type="radio" name="diarre"  value="NON" required>NON
    </div>
    <div>
        <h3>(T):</h3>
        <label for="">Avez-vous la Toux?</label> 
        <input type="radio" name="toux" value="OUI" required>OUI
        <input type="radio" name="toux"  value="NON" required>NON
    </div>
    <div>
        <h3>(PO):</h3>
        <label for="">Avez-vous une perte odorat ? </label> 
        <input type="radio" name="odorat" value="OUI" required>OUI
        <input type="radio" name="odorat"  value="NON" required>NON
    </div>

    <input type="submit" value="Soumettre" style=" border: none;color:white;background-color:green;border-radius:5px ;margin-top:10%;margin-left:35%;height:50px;width:100px;font-weight: bold;">
    
</form>';
$nom = "";
$prenom = "";
$poids = 0;
$age = 0;
$temperature = 0.0;
$tete = "";
$diarre = "";
$toux = "";
$odorat = "";
$pourcentage = 0;

// /while (true) {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                // $poids = $_POST["poids"];
                $poids = intval($_POST["poids"]);
                // $age = $_POST["age"];
                $age = intval($_POST["age"]);
                // $temperature = $_POST["temperature"];
                $temperature = floatval($_POST["temperature"]);
                $tete= $_POST["tete"];
                $diarre = $_POST["diarre"];
                $toux = $_POST["toux"];
                $odorat = $_POST["odorat"];

                if ($poids <= 0 ||$age < 0 || $temperature <0 ) {
                    echo "Veuillez saisir des valeurs positives et différentes de zéro pour le poids, l'âge et la température.";
                } else {

                // Calcul du pourcentage en fonction des réponses
                
                        $pourcentage = 0;
            
                // Si la température est supérieure à 38 degrés, augmentez le pourcentage de risque
                if ($temperature > 38) {

                    $pourcentage += 10;
                }
                // Si l'utilisateur les mau, augmentez le pourcentage de risque
                if ($tete == "OUI") {

                    $pourcentage += 20;
                }

                // Si l'utilisateur a la diarrhée, augmentez le pourcentage de risque
                if ($diarre == "OUI") {

                    $pourcentage += 20;
                }

            
                // Si l'utilisateur a la toux, augmentez le pourcentage de risque
                if ($toux == "OUI") {
                    
                
                    $pourcentage += 20;
                }

                // Si l'utilisateur a une perte d'odorat, augmentez le pourcentage de risque
                if ($odorat == "OUI") {
                    
                
                $pourcentage += 20;
                }

                // Afficher le résultat
                echo '<h2> Résultat du test de COVID-19 pour ' . $nom . ' ' . $prenom . '</h2>';

                // echo '<p>Pourcentage de risque : ' . $pourcentage . '%</p>';

                echo'<p>Vous avez  '.$age.'  ans
                <br> Vous pesser  '.$poids.'  Kg
                <br>votre température est de '.$temperature .' °C 
                <br>Vous avez repondu:
                <br>'.$tete.' pour les maux de tete
                <br>'.$diarre.' pour la diarrée
                <br>'. $toux.' pour la Toux
                <br>'.$odorat.' pour la perte odorat</p>';

                if ($pourcentage <= 40) {

                    echo'Votre pourcentage est de'.$pourcentage.'% Vous êtes donc negative au COVIDE';
                    }else if ($pourcentage>40 && $pourcentage <60) {
                        echo'Votre pourcentage est de'.$pourcentage.'vous êtes donc succeptible au COVIDE';
                    } else {
                        echo'Votre pourcentage est de '.$pourcentage.'vous êtes donc Positive au COVIDE';
                    };
                    
            }
            }

        // include 'historique.php';
    // }
?>