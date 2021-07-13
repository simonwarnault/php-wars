<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php

    include 'includes/header.inc.html';
    
    ?>

    <div class="row">
    <nav class="col-sm-2 p-5">
        <?php
            session_start();
            if(!empty($_SESSION)){
            $table = $_SESSION['table'];
            }
            else{}
        ?>
    <button type="button" class="btn btn-outline-secondary m-2 col-12">Home</button>
    <?php 
    include 'includes/ul.inc.html'
    ?>

    </nav>


    <section class="col-10 p-5">
        <?php
            if(isset($_POST['enregistrer'])){
                $_SESSION['table']=[
                    'prénom'=>$_POST['prénom'],
                    'nom'=>$_POST['nom'],
                    'âge'=>$_POST['âge'],
                    'taille'=>$_POST['taille'],
                    'situation'=>$_POST['situation']
                ]; 
                echo '<h2 class="text-center">Données Sauvegardées</h2>';
            }

            if(isset($_GET['add'])){
                include 'includes/form.inc.html';
            }
            
                else {
                ?>         
                    <a href="index.php?add">
                        <button type="button" class="btn btn-primary m-2 col-2">Ajouter des données</button>
                    </a>
                <?php
            }
        ?>
    </section>
    </div>
    <p class="text-center">© 2021 Simon Warnault - PHP</p>
</body>
</html>