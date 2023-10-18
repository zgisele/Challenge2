<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<H2 style="color:red; text-align:center">Formulaire de test de covide</H2>
<form action="" method="post" style="border: 1px solid green; item-aligne :center;text-align:justify;margin-left:30%;margin-right:30%;padding-left:5%;padding-bottom:5%;background-color:antiquewhite;">
    <div>
        <h3>Information Personnel(IP):</h3>
        <label for="">Nom</label> <input type="text" name="nom" ><br><br>
        <label for="">prenom</label> <input type="text" name="prenom" ><br><br>
        <label for="">poids</label> <input type="number" name="poids" ><br><br>
        <label for="">age</label> <input type="number" name="age" >
    </div>
    
    <div>

        <h3>Température(T°c):</h3>
        <label for="">Quelle est votre température corporelle?</label> 
        <input type="number" name="temperature" value="temperature"  >°c
       
    </div>
    <div>

        <h3>Maux de tête(MT):</h3>
        <label for="">Avez-vous les maux de tête?</label> 
        <input type="radio" name="tete" value="OUI" >OUI
        <input type="radio" name="tete"  value="NON" >NON
       
    </div>

    <div>
        <h3>(D):</h3>
        <label for="">Avez-vous la diarrée?</label> 
        <input type="radio" name="diarre" value="OUI" >OUI
        <input type="radio" name="diarre"  value="NON" >NON
    </div>
    <div>
        <h3>(T):</h3>
        <label for="">Avez-vous la Toux?</label> 
        <input type="radio" name="toux" value="OUI" >OUI
        <input type="radio" name="toux"  value="NON" >NON
    </div>
    <div>
        <h3>(PO):</h3>
        <label for="">Avez-vous une perte odorat ? </label> 
        <input type="radio" name="odorat" value="OUI" >OUI
        <input type="radio" name="odorat"  value="NON" >NON
    </div>
    <div style="display: flex;flex-direction: row;">
        <input type="submit" value="Soumettre" style=" border: none;color:white;background-color:green;border-radius:5px ;margin-top:10%;margin-left:35%;height:50px;width:100px;font-weight: bold;">
        <!-- <input type="submit" name="supprimer" value="Supprimer" style=" border: none;color:white;background-color:red;border-radius:5px ;margin-top:10%;margin-left:35%;height:50px;width:100px;font-weight: bold;"> -->
    </div>
</form>
    
</body>
</html>


<?php

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

            // if ($poids <= 0 ||$age < 0 || $temperature <0 ) {
            //         echo "Veuillez saisir des valeurs positives et différentes de zéro pour le poids, l'âge et la température.";

            if (empty($nom) || empty($prenom)|| empty($poids)|| empty($age )|| empty($temperature)|| empty( $tete)|| empty($diarre)|| empty($toux)|| empty($odorat)) {
                            echo "Veuillez saisir à vos informations .";
                    
            } elseif (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ-]+$/", $nom) || !preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ-]+$/", $prenom)) {
                            echo "Le nom et le prénom doivent contenir uniquement des lettres alphabétiques.";
                            
            } elseif ($poids <= 0 || $age <= 0 || $temperature <= 0) {
                            echo "Veuillez saisir des valeurs positives et différentes de zéro pour le poids, l'âge et la température.";
                            
             }elseif ($poids > 250 || $age > 150  || $temperature > 40) {
                            echo "le poids est maximum est de 250 , l'âge 150 et la température 40.";
            }
                
            // } 
            else {

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
        // include 'historique.php'; 
        session_start();


        // Obtenez la date actuelle (heure, jour et mois)
        $dateActuelle = date('d M');

        // Ajoutez le test avec la date à l'historique
        $_SESSION['historique'][] = array('Date' => $dateActuelle, 'nom' => $nom ,'prenom' => $prenom,'age' => $age,'poids' => $poids,'temperature' => $temperature,'tete' => $tete,'diarre' => $diarre,'toux'=> $toux ,'odorat' => $odorat,'pourcentage' => $pourcentage);

        if (!empty($_SESSION['historique']))
        {
            echo '<H2>Historique des TESTS</H2>';
            
            // Créez un tableau pour stocker les conversions par date
            
            $conversionsParDate = array();

            foreach ($_SESSION['historique'] as $test)
            {
                // Obtenez la date de la conversion
                $dateTest = $test['Date'];
                // $dateConversion = substr($conversion['Date'],7,3); // Extrait "d M" (jour et mois)
                
                // Ajoutez la conversion au tableau correspondant à la date
                $testParDate[$dateTest][] = $test;
            }

            
        }

           
        // Parcourez les conversions par date et affichez-les
            foreach ( $testParDate as $date => $tests) 
            {
                echo "<h3> Tests du $date :</h3>";
                
            
                echo '<ul>';
                foreach ($tests as $test) 
                {
                    // var_dump($test);
                    echo '<li>';
                    echo'<h4 style="color:white;background-color:green"> Résultat du test de COVID-19 pour '.$test['nom'].' '.$test['prenom'].'</h4>';
                    echo'<p>Vous avez  '.$test['age'].'  ans
                        <br> Vous pesser  '.$test['poids'].'  Kg
                        <br>votre température est de '. $test['temperature'] .' °C 
                        <br>Vous avez repondu:
                        <br>'.$test['tete'].' pour les maux de tete
                        <br>'.$test['diarre'].' pour la diarrée
                        <br>'.$test['toux'].' pour la Toux
                        <br>'.$test['odorat'].' pour la perte odorat</p>';
                        if ($test['pourcentage'] <= 40) {

                            echo'Votre pourcentage est de'.$test['pourcentage'].' % Vous êtes donc negative au COVIDE';
                            }else if ($test['pourcentage']>40 && $test['pourcentage'] <60) {
                                echo'Votre pourcentage est de'.$test['pourcentage']. ' % vous êtes donc succeptible au COVIDE';
                            } else {
                                echo'Votre pourcentage est de '.$test['pourcentage'].' % vous êtes donc Positive au COVIDE';
                            };
                    echo '</li>';



                    echo '<form action="" method="post" > <input type="submit" name="supprimer" value="Supprimer" style=" border: none;color:white;background-color:red;border-radius:5px ;margin-top:10%;margin-left:35%;height:50px;width:100px;font-weight: bold;"></form>';
                }
                echo '</ul>';
                 
            }

            if (isset($_POST['supprimer'])) {
            
            unset($_SESSION['historique']);
                // header('Location: page_principale.php'); // Redirigez vers la page principale après la suppression.
            }
  
}
        
?>