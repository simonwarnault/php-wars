<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'includes/head.inc.html';
    ?>
</head>
<body>
    <!-- jummbotron visible en desktop et caché en mobile -->
    <?php
        include 'includes/header.inc.html';
    ?>
<div class="container-fluid row mx-0 py-3">
    <!-- menu burger en nav -->
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
    <!-- section où le contenu change en fonction du menu burger -->
    <section class="col-sm-9">
        <?php
        // tableau //
            if(isset($_POST['enregistrer'])){
                $_SESSION['table']=[
                    'first_name'=>$_POST['first_name'],
                    'last_name'=>$_POST['last_name'],
                    'age'=>$_POST['age'],
                    'size'=>$_POST['size'],
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
                    echo"<h2>Débocage</h2><br>
                        ===> Lecture du tableau à l'aide de la fonction print_r()<br><br>";
                    echo "<pre>";
                        print_r($table);
                    echo "</pre>";
            }
        // Concatenation //
            else if(isset($_GET['concatenation'])){
                echo "
                    <h2>Concaténation</h2><br> 
                    <p>====> Construction d'une phrase avec le contenu du tableau :</p>
                ";
                echo "
                    <h3>".$table['last_name']." ".$table['last_name']."</h3>
                    <p>".$table['age']." ans, je mesure ".$table['size']."m et je fais partie des ".$table['situation']."s de la formation Simplon.</p><br>
                    <p>====> Construction d'une phrase après MAJ du tableau :</p>
                ";
                $table['last_name']= strtoupper($table['last_name']);
                echo "
                    <h3>".$table['first_name']." ".$table['first_name']."</h3>
                    <p>".$table['age']." ans, je mesure ".$table['size']."m et je fais partie des ".$table['situation']."s de la formation Simplon.</p><br>
                    <p>====> Affichage d'une virgule à la place du point pour la taille :</p>
                ";
                $table['size'] = str_replace('.',',',$table['size']);
                echo "
                    <h3>".$table['first_name']." ".$table['last_name']."</h3>
                    <p>".$table['age']." ans, je mesure ".$table['size']."m et je fais partie des ".$table['situation']."s de la formation Simplon.</p><br>
                ";
            }
        // Boucle //
            else if(isset($_GET['loop'])){
                echo "
                    <h2>Boucle</h2><br>
                    <p>===> Lecture du tableau à l'aide d'une boucle foreach</p>
                ";
                $i=0;
                foreach ($table as $key => $value) {
                    echo '<div>à la ligne n°'.$i++. ' correspond la clé "'.$key.'" et contient "'.$value.'"</div>';
                }
            }
        // Fonction //
            else if(isset($_GET['function'])){
                echo "
                    <h2>Fonction</h2><br>
                    <p>===> J'utilise ma fonction readTable()</p>
                ";
                function readTable($table){
                    $i=0;
                    foreach ($table as $key => $value) {
                        echo 'à la ligne n°'.$i++. ' correspond la clé "'.$key.'" et contient "'.$value.'"<br>';
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
                echo'<a href="index.php?add"><button type="button" class="btn btn-primary">Ajouter des données</button></a>';
            }
        ?>
    </section>
</div>
    <!-- copyright bas de page -->
    <?php
        include 'includes/footer.inc.html'
    ?>
</body>
</html>