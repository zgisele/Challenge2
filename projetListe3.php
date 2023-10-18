<?php
session_start();
if (!isset($_SESSION['projets'])) {
    $_SESSION['projets'] = [
        [
            'Nom' => 'Marketing',
            'Description' => 'dfghjklertyuio',
            'Activité' => [
                ['nom' => 'Campagne publicitaire', 'description' => 'Promotion de produits par des campagnes publicitaires en ligne.', 'date' => '2023-02-03'],
                ['nom' => 'Analyse de marché', 'description' => 'Étude de marché pour comprendre les besoins des clients.', 'date' => '2023-02-03'],
                ['nom' => 'Stratégie de contenu', 'description' => 'Création de contenu pour attirer les clients.', 'date' => '2023-02-03']
            ],
            'Partenaires'=>[
                ['nom_p'=>'Global Marketing Network ']
            ]
        ],


        [
            'Nom' => 'Développement Web',
            'Description' => 'dfghjklertyuio',
            'Activité' => [
                ['nom' => 'Conception de site web', 'description' => 'Conception de l\'interface utilisateur et de l\'expérience utilisateur.', 'date' => '2023-02-03'],
                ['nom' => 'Développement frontend', 'description' => 'Développement de la partie client d\'un site web.', 'date' => '2023-02-03'],
                ['nom' => 'Tests unitaires', 'description' => 'Validation des différentes parties d\'un logiciel.', 'date' => '2023-02-03']
            ],
            'Partenaires'=>[
                ['nom_p'=>'Global Marketing Network ']
                ]
        ],





        [
            'Nom' => 'Formation',
            'Description' => 'dfghjklertyuio',
            'Activité' => [['nom' => 'Formation en ligne', 'description' => 'Offrir des formations en ligne pour améliorer les compétences.', 'date' => '2023-02-03'],],
            'Partenaires'=>[
                ['nom_p'=>'Global Marketing Network ']
                ]
        ]
    ];
}




echo "<hr>";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .fomulaire form{
             
             margin: 0 auto;
             width: 400px;
             padding: 1em;
             border: 1px solid #ccc;
             border-radius: 10px;
             background-color:rgb(230, 223, 223);
             /* #7e8bdf72; */

        }
        .fomulaire h3{
            text-align:center ;
            color: rgb(16, 117, 241);
            font-weight: 800;
            font-size: 30px;

        }
        label {
          
             text-align: right;
             margin-top :500px ;
             margin-bottom :500px ;
        }
        form input,select,textarea{
                margin-left: 200px;
                width: 200px;
                height: 50px;
                margin-top: 0px;

        }
        form .boutton{
            margin-left: 140px ;
            margin-top: 10px;
            width: 100px;
            border-radius: 10px;
            border: none;
            background-color: black;
            color: white;
        }
       
    </style>

</head>

<body>


    <div class="fomulaire">
    <h3>Formulaire ProjetListe </h3>
    <form action="" method="post">
        <label for="">Selectionne un projet</label>
        <select name="Projets" id="">
            <?php foreach ($_SESSION['projets'] as $projet) {
                echo '<option value="' . $projet['Nom'] . '">' . $projet['Nom'] . '</option> ';
            } ?>
        </select><br>
        <label for="">Ajoute un activité</label>
        <input type="text" name="nom" placeholder="nom de l'activité"><br>

        <label for="">Description de l'activité</label>
        <textarea name="description"></textarea><br>

        <label for="">Date activité</label>
        <input type="date" name="date"><br>

        <input type="submit" value="Enregistre" name="Enregistre" class="boutton">
       
    </form>
    </div>
</body>

</html>



<!-- deuxieme fichier Php -->
<?php
if(isset($_POST['Enregistre'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomProjet = $_POST['Projets'];
    $nomActivite = $_POST['nom'];
    $descriptionActivite = $_POST['description'];
    $dateActivite = $_POST['date'];

    $nouvelleActivite = [
        'nom' => $nomActivite,
        'description' => $descriptionActivite,
        'date' => $dateActivite
    ];
    
    for ($i = 0; $i < count($_SESSION['projets']); $i++) {
        if ($_SESSION['projets'][$i]['Nom'] == $nomProjet) {
            $_SESSION['projets'][$i]['Activité'][] = $nouvelleActivite;
        }
    }

    
}    
}

    // Parcours du tableau projets
    foreach ($_SESSION['projets'] as $key => $projet) {

        echo "<h2 style='color:white;border: 1px solid black;background-color:rgb(16, 117, 241);text-align:center'> Nom du projet :" . $projet['Nom'] . "</h2> <br>";
        echo "<h3 style='font-weight:600'>Description du projet : " . $projet['Description'] . "</h3><br>";


        foreach ($projet['Activité'] as $activite) {


            echo "<h2 style='color:white;border: 1px solid black;background-color:rgb(3, 113, 73)'> => Nom de l'activité : " . $activite['nom'] . "<br>";

            echo "  <h3 style='font-weight:600'> Description de l'activité :  " . $activite['description'] . "</h3><br>";
            
            

            if (isset($activite['date'])) {
                echo "   Date de l'activité : " . $activite['date'] . "<br>";
            }

            
        }

        echo '<form action="voir_plus.php" method="post">';
        echo '<input type="hidden" name="index" value="'.$key.'">';
        echo '<input type="submit" value="Voir+" name="Voir+"  style="color:white;background-color:black; width: 100px; border-radius: 10px;margin-left:0px;margin-top:10px">';
        echo '</form>';
        echo "<hr>";
    }  
    

?>
