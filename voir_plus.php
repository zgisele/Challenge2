<?php

session_start();

$PROJET=$_SESSION['projets'];

if(isset($_POST['index'])) {

    echo "<h2 style='color:white;border: 1px solid black;background-color:rgb(16, 117, 241);text-align:center'>Nom du projet :".$PROJET[$_POST['index']]['Nom']."</h2>";
    echo"<h3 style='font-weight:600 ;'>Description du projet :". $PROJET[$_POST['index']][ 'Description']."</h3>";
   
    foreach ($PROJET[$_POST['index']][ 'Activité'] as $activite){
        echo "<h3 style='color:white;border: 1px solid black;background-color:rgb(3, 113, 73);'>  => Nom de l'activité :<strong> " . $activite['nom'] . "</strong></h3><br>";
        echo "   Description de l'activité :<h3 style='color:green'> <strong> " . $activite['description'] . "</strong></h3><br>";
        echo "   Date de activité <h3 style='color:green'> <strong> " . $activite['date'] . "</strong></h3><br>";
    }
    echo "<hr>";
    foreach ($PROJET[$_POST['index']]['Partenaires'] as $Partenaire){
        
    echo " <br> <h3 style='font-weight:600' > Les partenaires du projet:". $Partenaire[ 'nom_p']."</h3>.";

     }
    

}
?>