<!doctype html>
<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

session_start ();
// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
    echo '<html>';

}
else {
    echo 'Les variables ne sont pas déclarées.';
}
?>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link defer rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/pace-theme-minimal.css" />-->

</head>

<body>
<div id="top">

</div>
<div class=" wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Archive du Loiret</h3>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#top" id="stat">Statistique Generale</a>
            </li>
            <li>
                <a href="#top" id='visu'>Visualiser les tables</a>
            </li>
            <?php
            if($_SESSION['login'] == 'admin'){

                echo "<li> <a href=\"#pageSubmenu\" id=\"modif2\" data-toggle=\"collapse\" aria-expanded=\"false\">Modifier les données</a>  </li>" ;
            }


            if($_SESSION['login']=='user'){
                echo "  <li><a href=\"index.php\" data-toggle=\"collapse\" aria-expanded=\"false\" id=\"log\">Connexion Admin</a></li>";
            }

            ?>

        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#top" id="stat1">Statistique Generale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#top" id="visu1">Visualiser les tables </a>
                        </li>
                        <?php
                        if($_SESSION['login'] == 'admin'){

                            echo "  <li class=\"nav-item\"><a class=\"nav-link\" id=\"modif1\" href=\"#top\">Modifier les données</a></li>" ;
                        }


                        if($_SESSION['login']=='user'){
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" id=\"log\" href=\"index.php\">Connexion Admin</a> </li> ";
                        }

                        ?>



                    </ul>
                </div>
            </div>
        </nav>

        <section id="Home">
            <div class="container-fluid">
                <div class="card-text" style="text-align: center">
                    <h1>Statistiques générale</h1>
                </div>
                <hr />
                <div class="card-deck">
                    <div class="card bg-info text-white">
                        <div class="card-body" id="couleur"></div>

                    </div>

                    <div class="card bg-info text-white">
                        <div class="card-body" id="photoNb"></div>

                    </div>

                    <div class="card bg-info text-white">
                        <div class="card-body" id="photoReversible"></div>

                    </div>

                    <div class="card bg-info text-white">
                        <div class="card-body" id="reverse"></div>

                    </div>

                </div>



            </div>
            <hr />

            <div class="container-fluid">
                <div class="card">

                    <div class="card-deck">
                        <div class="card">
                            <div class="card-img-top">
                                <canvas id="Pie"> </canvas>
                            </div>
                        </div>



                        <div class="card">
                            <canvas class="card-img-top" id="incomplet"> </canvas>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-text" style="text-align: center">
                        <h3>Villes avec le plus de photos : </h3>
                    </div>
                    <canvas class="card-img-top" id="photoVille"> </canvas>
                </div>


            </div>
        </section>

        </section>
        <hr />

        <section id="visualisation">
            <div class="card-text" style="text-align: center">
                <h3>Visualisations des tables </h3>
            </div>
            <hr />
            <div class="card text-center">


                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item" id="add">


                            <button type="button" id="b1" class="btn btn-outline-primary">A completer</button>


                            <button type="button" id="b2" class="btn btn-outline-primary">Administratif</button>


                            <button type="button" id="b3" class="btn btn-outline-primary">Date</button>


                            <button type="button" id="b4" class="btn btn-outline-primary">Details Artistique</button>


                            <button type="button" id="b5" class="btn btn-outline-primary">Details Photos</button>


                            <button type="button" id="b6" class="btn btn-outline-primary">Localisation</button>
                </div>
                </li>
                </ul>
            </div>


            <div class="card-body">
                <!----------------- A completer ------------------------>

                <div id="Comp">
                    <table id="tab" class="display" style="width:100%">
                    </table>
                </div>
                <!----------------- Administratif------------------------>

                <div id="Adm">
                    <table id="tab2" style="width:100%">
                    </table>
                </div>
                <!----------------- Date ------------------------>
                <div id="date">
                    <table id="tdate" style="width:100%">
                    </table>
                </div>

                <!----------------- Details Artistique------------------------>
                <div id="detA">
                    <table id="tA" style="width:100%">
                    </table>


                </div>
                <!----------------- Details Photo----------------------->
                <div id="detP">
                    <table id="tP" style="width:100%">
                    </table>
                </div>
                <!----------------- Localisation----------------------->
                <div id="Loc">
                    <table id="loc" style="width:100%">
                    </table>

                </div>

            </div>
        </section>

        <section id="modif">

            <div class="card-text" style="text-align: center">
                <h3>Modification des tables </h3>
            </div>
            <hr />
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item" id="add">
                            <button type="button" class="btn btn-outline-secondary" id="option1">Inserer</button>
                            <button type="button" class="btn btn-outline-secondary" id="option2">Mettre a jour </button>
                            <button type="button" class="btn btn-outline-secondary" id="option3">Supprimer</button>

                        </li>
                    </ul>
                </div>
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item" id="add">


                            <button type="button" id="b1F" class="btn btn-outline-primary">A completer</button>


                            <button type="button" id="b2F" class="btn btn-outline-primary">Administratif</button>


                            <button type="button" id="b3F" class="btn btn-outline-primary">Date</button>


                            <button type="button" id="b4F" class="btn btn-outline-primary">Details Artistique</button>


                            <button type="button" id="b5F" class="btn btn-outline-primary">Details Photos</button>


                            <button type="button" id="b6F" class="btn btn-outline-primary">Localisation</button>
                </div>
                </li>
                </ul>
            </div>

            <div class="card-body">
                <div id="insert">
                    <div id="comp">
                        <form id="acomp">
                            <div class="form-row">
                                <div class="col">
                                    <label>Date</label>
                                    <input type="text" class="form-control" id="fdate">
                                </div>
                                <div class="col">
                                    <label for="">Article</label>
                                    <input type="text" class="form-control" id="farticle">
                                </div>
                                <div class="col">
                                    <label for="">Reference cindoc</label>
                                    <input type="text" class="form-control" id="freference_cindoc">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Serie</label>
                                    <input type="text" class="form-control" id="fserie">
                                </div>
                                <div class="col">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" id="fdescription">
                                </div>
                                <div class="col">
                                    <label for="">index personne</label>
                                    <input type="text" class="form-control" id="findex_personne">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Negatif / Inversible </label>
                                    <input type="text" class="form-control" id="fnegatif_reversible">
                                </div>
                                <div class="col">
                                    <label for="">Couleur / noir et blanc</label>
                                    <input type="text" class="form-control" id="fcouleur_noirblanc">
                                </div>
                                <div class="col">
                                    <label for="">Discriminants</label>
                                    <input type="text" class="form-control" id="fdiscriminant">
                                </div>
                            </div>


                            <button type="button" class="btn btn-primary" id="inserComp">Envoyer</button>
                        </form >
                    </div>
                    <div id="adm">
                        <form >
                            <div class="form-row">
                                <div class="col">
                                    <label>Serie</label>
                                    <input type="text" class="form-control" id="dserie">
                                </div>
                                <div class="col">
                                    <label for="">Article</label>
                                    <input type="text" class="form-control" id="darticle">
                                </div>
                                <div class="col">
                                    <label for="">Reference cindoc</label>
                                    <input type="text" class="form-control" id="dreference_cindoc">
                                </div>
                                <div class="col">
                                    <label for="">Discriminants</label>
                                    <input type="text" class="form-control" id="ddiscriminant">
                                </div>
                            </div>


                            <button type="button" class="btn btn-primary" id="inserAdm">Envoyer</button>
                        </form>

                    </div>


                    <div id="date1">
                        <form >
                            <div class="form-row">
                                <div class="col">
                                    <label>Annee</label>
                                    <input type="text" class="form-control" id="cannee">
                                </div>
                                <div class="col">
                                    <label for="">Mois</label>
                                    <input type="text" class="form-control" id="cmois">
                                </div>
                                <div class="col">
                                    <label for="">Jour</label>
                                    <input type="text" class="form-control" id="cjour">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="inserDate">Envoyer</button>
                        </form>

                    </div>

                    <div id="deta">
                        <form >
                            <div class="form-row">
                                <div class="col">
                                    <label>Remarque </label>
                                    <input type="text" class="form-control" id="aremarque">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label>Nombre de cliché</label>
                                    <input type="text" class="form-control" id="anb_cliche">
                                </div>
                                <div class="col">
                                    <label for="">Negatif / Inversible</label>
                                    <input type="text" class="form-control" id="anegatif_reversible">
                                </div>
                                <div class="col">
                                    <label for="">Couleur / Noir et blanc</label>
                                    <input type="text" class="form-control" id="acouleur_noirblanc">
                                </div>
                                <div class="col">
                                    <label for="">Taille du cliché</label>
                                    <input type="text" class="form-control" id="ataille_cliche">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="inserdetA">Envoyer</button>
                        </form>
                    </div>


                    <div id="detp">
                        <form >
                            <div class="form-row">
                                <div class="col">
                                    <label>Article</label>
                                    <input type="text" class="form-control" id="barticle">
                                </div>
                                <div class="col">
                                    <label for="">Sujet</label>
                                    <input type="text" class="form-control" id="bsujet">
                                </div>
                                <div class="col">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" id="bdescription">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label>Notes de bas de page</label>
                                    <input type="text" class="form-control" id="bnotebasdepage">
                                </div>
                                <div class="col">
                                    <label for="">Fihier numérique</label>
                                    <input type="text" class="form-control" id="bfichier_numerique">
                                </div>
                                <div class="col">
                                    <label for="">Fichier iconographique</label>
                                    <input type="text" class="form-control" id="bfichier_iconographique">
                                </div>
                                <div class="col">
                                    <label for="">Index personne</label>
                                    <input type="text" class="form-control" id="bindex_personne">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="inserdetP">Envoyer</button>
                        </form>

                    </div>

                    <div id="locF">
                        <form >
                            <div class="form-row">
                                <div class="col">
                                    <label>Ville</label>
                                    <input type="text" class="form-control" id="nnom_ville">
                                </div>
                                <div class="col">
                                    <label for="">Latitude (Lambert93)</label>
                                    <input type="text" class="form-control" id="nlat">
                                </div>
                                <div class="col">
                                    <label for="">Longitude (Lambert93)</label>
                                    <input type="text" class="form-control" id="nlong">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="inserLoc">envoyer</button>
                        </form>

                    </div>
                </div>
                <!---- partie update avec des form différents -->

                <div id="update">
                    <div id="updateComp">
                        <form action="php/update/updateComp.php" method="post" >
                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="valmodif"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="date">Date</option>
                                        <option value="article">Article</option>
                                        <option value="reference_cindoc">Reference Cindoc</option>
                                        <option value="serie">Serie</option>
                                        <option value="nom_ville">Nom ville</option>
                                        <option value="sujet">sujet</option>
                                        <option value="description">Description</option>
                                        <option value="index_personne">Index personne</option>
                                        <option value="nb_cliche">Nombre de cliché</option>
                                        <option value="negatif_reversible">Negatif / Inversible</option>
                                        <option value="couleur_noirblanc">Couleur / Noir et blanc</option>
                                        <option value="discriminant">Discriminant</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Valeur a modifier</label>
                                    <input type="text" class="form-control" name="valuemodif">
                                </div>

                            </div>

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="date">Date</option>
                                        <option value="article">Article</option>
                                        <option value="reference_cindoc">Reference Cindoc</option>
                                        <option value="serie">Serie</option>
                                        <option value="nom_ville">Nom ville</option>
                                        <option value="sujet">sujet</option>
                                        <option value="description">Description</option>
                                        <option value="index_personne">Index personne</option>
                                        <option value="nb_cliche">Nombre de cliché</option>
                                        <option value="negatif_reversible">Negatif / Inversible</option>
                                        <option value="couleur_noirblanc">Couleur / Noir et blanc</option>
                                        <option value="discriminant">Discriminant</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Nouvelle valeur</label>
                                    <input type="text" class="form-control" name="newvalue">
                                </div>

                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary" id="uComp">Envoyer</button>
                            </div>
                        </form>

                    </div>

                    <div id="updateAdm">
                        <form action="php/update/updateAdm.php" method="post">

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="valmodif"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="serie">Serie</option>
                                        <option value="article">Article</option>
                                        <option value="reference_cindoc">Reference Cindoc</option>
                                        <option value="discriminant">Discriminant</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Valeur a modifier</label>
                                    <input type="text" class="form-control" name="valuemodif">
                                </div>

                            </div>

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="Serie">Serie</option>
                                        <option value="article">Article</option>
                                        <option value="reference_cindoc">Reference Cindoc</option>
                                        <option value="discriminant">Discriminant</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Nouvelle valeur</label>
                                    <input type="text" class="form-control" name="newvalue">
                                </div>

                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary" id="uAdm">Submit</button>
                            </div>
                        </form>

                    </div>





                    <div id="updateDate">
                        <form action="php/update/updateDate.php" method="post">
                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="valmodif"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="jour">Jour</option>
                                        <option value="mois">Mois</option>
                                        <option value="annne">Annee</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Valeur a modifier</label>
                                    <input type="text" class="form-control" name="valuemodif">
                                </div>

                            </div>

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="jour">Jour</option>
                                        <option value="mois">Mois</option>
                                        <option value="annee">Annee</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Nouvelle valeur</label>
                                    <input type="text" class="form-control" name="newvalue">
                                </div>

                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary" id="uDate">Submit</button>
                            </div>
                        </form>

                    </div>



                    <div id="updatedetA">
                        <form action="php/update/updatedetA.php" method="post">

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="valmodif"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option
                                        <option value="taille_cliche">Taille du cliche</option>
                                        <option value="remarque">Remarque</option>
                                        <option value="nb_cliche">Nombre de cliché</option>
                                        <option value="negatif_reversible">Negatif / Inversible</option>
                                        <option value="couleur_noirblanc">Couleur / Noir et blanc</option>
                                        <option value="discriminant">Discriminant</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Valeur a modifier</label>
                                    <input type="text" class="form-control" name="valuemodif">
                                </div>

                            </div>

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="remarque">Remarque</option>
                                        <option value="taille_cliche">Taille du cliche</option>
                                        <option value="nb_cliche">Nombre de cliché</option>
                                        <option value="negatif_reversible">Negatif / Inversible</option>
                                        <option value="couleur_noirblanc">Couleur / Noir et blanc</option>
                                        <option value="discriminant">Discriminant</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Nouvelle valeur</label>
                                    <input type="text" class="form-control" name="newvalue">
                                </div>

                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary" id="udetA">Submit</button>
                            </div>
                        </form>

                    </div>


                    <div id="updatedetP">
                        <form action="php/update/updatedetP.php" method="post" >

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="valmodif"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="notebasdepage">Note de bas de page</option>
                                        <option value="article">Article</option>
                                        <option value="fichier_iconographique">Fichier iconographique</option>
                                        <option value="fichier_numerique">Fichier numerique</option>
                                        <option value="sujet">sujet</option>
                                        <option value="description">Description</option>
                                        <option value="index_personne">Index personne</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Valeur a modifier</label>
                                    <input type="text" class="form-control" name="valuemodif">
                                </div>

                            </div>

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="notebasdepage">Note de bas de page</option>
                                        <option value="article">Article</option>
                                        <option value="fichier_iconographique">Fichier iconographique</option>
                                        <option value="fichier_numerique">Fichier numerique</option>
                                        <option value="sujet">sujet</option>
                                        <option value="description">Description</option>
                                        <option value="index_personne">Index personne</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Nouvelle valeur</label>
                                    <input type="text" class="form-control" name="newvalue">
                                </div>

                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary" id="udetP">Submit</button>
                            </div>
                        </form>

                    </div>


                    <div id="updateLoc">
                        <form action="php/update/updateLoc.php" method="post">
                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="valmodif"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="nom_ville">Ville</option>
                                        <option value="lat">Latitude (Lambert93)</option>
                                        <option value="long">Longitude (Lambert93)</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Valeur a modifier</label>
                                    <input type="text" class="form-control" name="valuemodif">
                                </div>

                            </div>

                            <div class="form-row ">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs a modifier</label>
                                    <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="nom_ville">Ville</option>
                                        <option value="lat">Latitude (Lambert93)</option>
                                        <option value="long">Longitude (Lambert93)</option>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <label>Nouvelle valeur</label>
                                    <input type="text" class="form-control" name="newvalue">
                                </div>

                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary" id="uLoc">Submit</button>
                            </div>
                        </form>

                    </div>

                </div> <!--update part -->

        <div id="delete">

            <div id="delComp">
            <form action="php/delete/delComp.php" method="post">
                <div class="form-row ">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs</label>
                        <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="date">Date</option>
                            <option value="article">Article</option>
                            <option value="reference_cindoc">Reference Cindoc</option>
                            <option value="serie">Serie</option>
                            <option value="nom_ville">Nom ville</option>
                            <option value="sujet">sujet</option>
                            <option value="description">Description</option>
                            <option value="index_personne">Index personne</option>
                            <option value="nb_cliche">Nombre de cliché</option>
                            <option value="negatif_reversible">Negatif / Inversible</option>
                            <option value="couleur_noirblanc">Couleur / Noir et blanc</option>
                            <option value="discriminant">Discriminant</option>
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <label>Valeur a supprimer   </label>
                        <input type="text" class="form-control" name="newvalue">
                    </div>

                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary" id="del">Submit</button>
                </div>
            </form>

            </div>

                <div id="delAdm">
                    <form action="php/delete/deleteAdm.php" method="post">
                        <div class="form-row ">
                            <div class="col-auto my-1">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs </label>
                                <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Choose...</option>
                                    <option value="serie">Serie</option>
                                    <option value="article">Article</option>
                                    <option value="reference_cindoc">Reference Cindoc</option>
                                    <option value="discriminant">Discriminant</option>
                                </select>
                            </div>
                            <div class="col-auto my-1">
                                <label>Valeur a supprimer</label>
                                <input type="text" class="form-control" name="newvalue">
                            </div>

                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>
                    </form>
                </div>

                <div id="delDate">
                    <form action="php/delete/deleteDate.php" method="post">
                    <div class="form-row ">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs </label>
                            <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                <option value="jour">Jour</option>
                                <option value="mois">Mois</option>
                                <option value="annee">Annee</option>
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <label>Valeur a supprimer</label>
                            <input type="text" class="form-control" name="newvalue">
                        </div>

                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary" id="uDate">Submit</button>
                    </div>
                    </form>
                </div>


            <div id="deldetA">

                <form action="php/delete/deldetA.php" method="post">
                    <div class="form-row ">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs</label>
                            <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                <option value="remarque">Remarque</option>
                                <option value="taille_cliche">Taille du cliche</option>
                                <option value="nb_cliche">Nombre de cliché</option>
                                <option value="negatif_reversible">Negatif / Inversible</option>
                                <option value="couleur_noirblanc">Couleur / Noir et blanc</option>
                                <option value="discriminant">Discriminant</option>
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <label>Valeur a supprimer</label>
                            <input type="text" class="form-control" name="newvalue">
                        </div>

                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>

            </div>




            <div id="deldetP">
                <form action="php/delete/deldetP.php" method="post">

                    <div class="form-row ">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs </label>
                            <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                <option value="notebasdepage">Note de bas de page</option>
                                <option value="article">Article</option>
                                <option value="fichier_iconographique">Fichier iconographique</option>
                                <option value="fichier_numerique">Fichier numerique</option>
                                <option value="sujet">sujet</option>
                                <option value="description">Description</option>
                                <option value="index_personne">Index personne</option>
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <label>Valeur a supprimer </label>
                            <input type="text" class="form-control" name="newvalue">
                        </div>

                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary" id="udetP">Submit</button>
                    </div>
                </form>


            </div>




            <div id="delLoc">
                <form action="php/delete/deleteLoc.php" method="post">
                    <div class="form-row ">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Selectionner le champs </label>
                            <select name="newval"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                <option value="nom_ville">Ville</option>
                                <option value="lat">Latitude (Lambert93)</option>
                                <option value="long">Longitude (Lambert93)</option>
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <label>Valeur a supprimer </label>
                            <input type="text" class="form-control" name="newvalue">
                        </div>

                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>


            </div><!---delete part -->



            </div><!-- card body -->
        </section>
    </div><!-- content -->


</div><!-- wrapper-->








</div>
</div>
</body>


<script defer src="js/jquery-3.3.1.js" type="text/javascript"></script>
<?php
if($_SESSION['login']=='user'){
    echo "<script defer type=\"text/javascript\" src=\"js/login.js\"></script>";
}
?>
<script defer type="text/javascript" src="js/form.js"></script>
<script defer src="js/monjs.js" type="text/javascript"></script>
<script async src="js/bootstrap.js" type="text/javascript"></script>
<script async src="js/bootstrap.bundle.js"></script>
<script defer type="text/javascript" src="js/table.js"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script async type="text/javascript" src="js/pace.min.js"></script>
<script async src="js/Chart.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script async type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


</script>

</html>