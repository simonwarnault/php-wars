<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'includes/head.inc.html';
    ?>
</head>
<body>
    <?php

        include 'includes/header.inc.html';
    
    ?>

<div class="container-fluid row mx-0 py-3">
    <nav class="col-sm-3 pb-3">
        <button type="button" class="btn btn-outline-secondary col-12"><a href="index.php">Home</a></button>
        <?php
            session_start();
            if(!empty($_SESSION)){
            $table = $_SESSION['table'];
            include 'includes/ul.inc.html';
            }
        ?>
    </nav>
    <section class="col-sm-9">
        <?php
        // tableau //
            if(isset($_POST['enregistrer'])){
                $_SESSION['table']=[
                    'prenom'=>$_POST['prenom'],
                    'nom'=>$_POST['nom'],
                    'age'=>$_POST['age'],
                    'taille'=>$_POST['taille'],
                    'situation'=>$_POST['situation']
                ]; 
                echo '<h2 class="text-center">Données Sauvegardées</h2>';
            }
        // Formulaire//
            else if(isset($_GET['add'])){
                include 'includes/form.inc.html';
            }
        // Débocage //
            else if(isset($_GET['debugging'])){
                echo "<h3>Débocage</h3><br>
                ===> Lecture du tableau à l'aide de la fonction print_r()<br><br>";
                echo "<pre>";
                
                print_r($table);

                echo "</pre>";
            }
        // Concatenation //
            else if(isset($_GET['concatenation'])){
                echo "
                    <h2>Concaténation</h2><br> 
                    <p>====> Construction d'une phrase avec le contenu du tableau :</p><br>
                ";
                echo "
                    <h3>".$table['prenom']." ".$table['nom']."</h3>
                    <p>".$table['age']." ans, je mesure ".$table['taille']."m et je fais partie des ".$table['situation']." de la formation Simplon.</p><br>
                    <p>====> Construction d'une phrase après MAJ du tableau :</p>
                ";
                $table['nom']= strtoupper($table['nom']);
                echo "
                    <h3>".$table['prenom']." ".$table['nom']."</h3>
                    <p>".$table['age']." ans, je mesure ".$table['taille']."m et je fais partie des ".$table['situation']." de la formation Simplon.</p><br>
                    <p>====> Affichage d'une virgule à la place du point pour la taille :</p>
                ";
                $table['taille'] = str_replace('.',',',$table['taille']);
                echo "
                    <h3>".$table['prenom']." ".$table['nom']."</h3>
                    <p>".$table['age']." ans, je mesure ".$table['taille']."m et je fais partie des ".$table['situation']." de la formation Simplon.</p><br>
                ";
            }
        // Boucle //
            else if(isset($_GET['loop'])){
                echo "
                    <h3>Boucle</h3><br>
                    <p>===> Lecture du tableau à l'aide d'une boucle foreach</p>
                ";
                $i=0;
                foreach ($table as $key => $value) {
                echo '
                    <div>à la ligne n°'.$i++. ' correspond la clé "'.$key.'" et contient "'.$value.'"</div>
                ';
            }
            }
        // Fonction //
            else if(isset($_GET['function'])){
                echo "
                <h3>Fonction</h3><br>
                <p>===> J'utilise ma fonction readTable()</p>
            ";
            function readTable($table){
                $i=0;
                foreach ($table as $key => $value) {
                echo 'à la ligne n°'.$i++. ' correspond la clé "'.$key.'" et contient "'.$value.'"<br>
                ';
            }
            }
                readTable($table);
            }
        // Suppression //
            else if (isset($_GET['del'])){
                unset($_SESSION['table']);
                echo '<h2 class="text-center">Les données ont bien été supprimées</h2>';
            }
        // Reset //
            else {
                ?>  
                    <a href="index.php?add">
                    <button type="button" class="btn btn-primary">Ajouter des données</button>
                    </a>
                <?php
            }
        ?>
    </section>
</div>
     <?php
        include 'includes/footer.inc.html'
    ?>
</body>
</html>