<!DOCTYPE html>
<html lang='eng'>
    <head>
        <meta charset="utf-8">
        <title>Food & Drink</title>
        <link rel="stylesheet" href="../reset.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="BackEnd.css">
        <link rel="shortcut icon" type="image/svg" href="../food-and-drink.svg">
    </head>
    <header>
        <nav class="navbar navbar-expand-sm">
            <a class="navbar-brand"><img width="100" src="../food-and-drink.svg"></a>
            <a class="navbar-brand">Food and Drink</a>
            <div class="navbar-collapse">
                <form class="form-inline">
                    <button class="btn btn-outline-success" type="button">Déconnexion</button>
                  </form>
            </div>
        </nav>        
    </header>
    <body class="body">
        <?php
        $user = 'root';
        $password = 'root';

        $dbh = new PDO ('mysql:host=localhost;dbname=food and drink',$user, $password);

        $sth = $dbh->prepare('Select * from menu join saisons on menu.saisons_idsaison = saisons.idsaison');
        $sth->execute();
        $results = $sth->fetchAll();

        if (isset($_GET['all'])){
            $sth = $dbh->prepare('Select * from menu join saisons on menu.saisons_idsaison = saisons.idsaison');
            $sth->execute();
            $results = $sth->fetchAll();
        }else{
            $sth = $dbh->prepare('Select * from menu join saisons on menu.saisons_idsaison = saisons.idsaison where Cacher = 1');
            $sth->execute();
            $results = $sth->fetchAll();
        }
        if (isset($_POST['envoyer'])){
            $nouveau_nom = $_POST['NEW_nom'];
            $nouveau_entree = $_POST['NEW_entree'];
            $nouveau_plat = $_POST['NEW_plat']; 
            $nouveau_dessert = $_POST['NEW_dessert'];
            $nouveau_tarif = $_POST['NEW_tarif'];
            $nouveau_boisson = $_POST['NEW_boisson'];
            $nouveau_saison = $_POST['NEW_saison'];
            $nouveau_photo = $_POST['NEW_photo'];
            $ajout=("INSERT INTO `menu` (`nom`,`entree`, `plat`,`dessert`,`tarif`,`boissons`,`saisons_idsaison`,`photo`) VALUES (:nom, :entree, :plat, :dessert, :tar, :boisson, :saison, :photo)");
            $result=$dbh->prepare($ajout);
            $execute=$result->execute(array(":nom"=>$nouveau_nom,":entree"=>$nouveau_entree, ":plat"=>$nouveau_plat, ":dessert"=>$nouveau_dessert,":tar"=>$nouveau_tarif, ":boisson"=>$nouveau_boisson, ":saison"=>$nouveau_saison, ":photo"=>$nouveau_photo));
                if($execute){
                    echo "L'ajout du nouveau menu à bien fonctionné, veuillez actualiser la page";
                }else{
                    echo "Il y a un problème";
                    print_r($result->errorInfo());
                }
        }
        if (isset($_POST['modif_saison'])){
            $cours = $_POST['cours_saison'];
            $ajout="UPDATE `menu` SET EnCours = 0;";
            $ajout.="UPDATE menu SET EnCours = 1 WHERE saisons_idsaison = $cours";
            $result=$dbh->prepare($ajout);
            $execute=$result->execute();
            if($execute){
                echo 'La nouvelle saison est validé';
            }else{
                echo "Il y a un problème";
            }
        }
        if (isset($_POST['suppr'])){
            $idsuppr = $_POST['admin'];
            $ajout="UPDATE `menu` SET cacher = 0 WHERE idmenu = $idsuppr";
            $result=$dbh->prepare($ajout);
            $execute=$result->execute();
            if($execute){
                echo "La suppression à bien fonctionné, veuillez actualiser la page";
            }else{
                echo "Il y a un problème";
            }
        }
        ?>
        <section class="season">
            <h1>Choisissez la saison en cours</h1>
                <form action='Index.php' method='POST'>
                    <div>
                        <input type="radio" id="Hiver" name="cours_saison" value="3" checked>
                        <label for="Hiver">Hiver</label>
                    </div>
                    <div>
                        <input type="radio" id="Printemps" name="cours_saison" value="4">
                        <label for="Printemps">Printemps</label>
                    </div>
                    <div>
                        <input type="radio" id="Été" name="cours_saison" value="1">
                        <label for="Été">Été</label>
                    </div>
                    <div>
                        <input type="radio" id="Automne" name="cours_saison" value="2">
                        <label for="Automne">Automne</label>
                    </div>
                    <input type="submit" class ="btn" name="modif_saison" value="Valider la saison">
                </form>
        </section>
        <section class="add">
            <h1>Nouveau menu à la carte</h1>
                <form class="modif" action='Index.php' method='POST'>
                    <div>
                        <input type='text' name='NEW_nom' placeholder="Nom du menu" required></input>
                        <input type='text' name='NEW_tarif' placeholder="Tarif (€)" required></input>
                    </div>
                    <div>
                        <input type="radio" id="Hiver" name="NEW_saison" value="3" checked>
                        <label for="Hiver">Hiver</label>
                        <input type="radio" id="Printemps" name="NEW_saison" value="4">
                        <label for="Printemps">Printemps</label>
                    </div>
                    <div>
                        <input type="radio" id="Été" name="NEW_saison" value="1">
                        <label for="Été">Été</label>
                        <input type="radio" id="Automne" name="NEW_saison" value="2">
                        <label for="Automne">Automne</label>
                    </div>
                    <div>
                        <p class="menu">Entrée</p>
                    </div>
                    <div>
                        <input type="text" name="NEW_entree" placeholder="Nom" required></input>
                    </div>
                    <div>
                        <p class="menu">Plat</p>
                    </div>
                    <div>
                        <input type='text' name='NEW_plat' placeholder="Nom" required></input>
                    </div>
                    <div>
                        <p class="menu">Dessert</p>
                    </div>
                    <div>
                        <input type='text' name='NEW_dessert' placeholder="Nom" required></input>
                    </div>
                    <div>
                        <p class="menu">Boisson</p>
                    </div>
                    <div>
                        <input type='text' name='NEW_boisson' placeholder="Nom" required></input>
                </div>
                    <div>
                        <p class="menu">Photo</p>
                    </div>
                    <div>
                        <input type="url" name="NEW_photo" placeholder="URL" required>
                    </div>
                    <input type="submit" class ="btn" name="envoyer" value="Ajouter un menu">
                </form>
        </section>
        <section class="list">
            <h1 id='liste-des-menus'>Liste des menus</h1>

            <?php
                if (isset($_POST['modif'])){
                $idsuppr = $_POST['admin'];
            ?>
            <form action='Index.php' method='POST'>
                <input type='text' name='MODIF_nom' placeholder="Nom du menu" required></input>
                <input type='text' name='MODIF_tarif' placeholder="Tarif (€)"required></input>
                <input type="radio" id="Hiver" name="MODIF_saison" value="3" checked>
                    <label for="Hiver">Hiver</label>
                <input type="radio" id="Printemps" name="MODIF_saison" value="4">
                    <label for="Printemps">Printemps</label>
                <input type="radio" id="Été" name="MODIF_saison" value="1">
                    <label for="Été">Été</label>
                <input type="radio" id="Automne" name="MODIF_saison" value="2">
                    <label for="Automne">Automne</label>
                <input type="text" name="MODIF_entree" placeholder="Nom de l'entrée" required></input>
                <input type='text' name='MODIF_plat' placeholder="Nom du plat" required></input>
                <input type='text' name='MODIF_dessert' placeholder="Nom du dessert" required></input>
                <input type='text' name='MODIF_boisson' placeholder="Nom de la boisson" required></input>
                <input type="hidden" name="id_cacher" value = <?php echo $idsuppr?>></input>
                <input type="submit" class ="btn" name="modification" value="Valider la modification"></input>
            </form>
            <?php
            }
            ?>
            <?php
            if (isset($_POST['modification'])){
                $idsuppr = $_POST['id_cacher'];
                $nouveau_nom = $_POST['MODIF_nom'];
                $nouveau_entree = $_POST['MODIF_entree'];
                $nouveau_plat = $_POST['MODIF_plat']; 
                $nouveau_dessert = $_POST['MODIF_dessert'];
                $nouveau_tarif = $_POST['MODIF_tarif'];
                $nouveau_boisson = $_POST['MODIF_boisson'];
                $nouveau_saison = $_POST['MODIF_saison'];
                $ajout="UPDATE `menu` SET nom='$nouveau_nom', entree='$nouveau_entree', plat='$nouveau_plat', dessert='$nouveau_dessert',tarif='$nouveau_tarif', 
                                            boissons='$nouveau_boisson', saisons_idsaison='$nouveau_saison' WHERE idmenu = $idsuppr";
                $result=$dbh->prepare($ajout);
                $execute=$result->execute();
                if($execute){
                    echo 'La modification à bien fonctionné, veuillez actualiser la page';
                }else{
                    echo "Il y a un problème";
                    print_r($result->errorInfo());
                }
            }
            ?>
            <div>
                <form action='Index.php#liste-des-menus' method='GET'>
                    <input type="checkbox" name="all" <?php if(isset($_GET['all'])) echo 'checked'; ?> onclick="submit()">
                    <label class="foreign">Voir les anciens menus</label>
                </form>
            </div>
            <?php
            echo "<table>";
            echo "<tr><th>Nom</th><th>Entree</th><th>Plat</th><th>Dessert</th><th>Boisson</th><th>Tarif</th><th>Saison</th><th></th></tr>";
            for ($i=0; $i < count($results); $i++){
                $result = $results[$i];
                $nom = $result['nom'];
                $entree = $result['entree'];
                $plat = $result['plat'];
                $dessert = $result['dessert'];
                $boisson = $result['boissons'];
                $tarif = $result['tarif'];
                $saison = $result['nomsaison'];
                $id = $result['idmenu'];
                echo "<tr><td> $nom </td><td> $entree </td><td> $plat </td><td> $dessert </td><td> $boisson </td><td> $tarif </td><td> $saison </td><td> <form action='Index.php#liste-des-menus' method='POST'><input type=radio name=admin value=$id><input type=submit name=suppr value=Supprimer><input type=submit name=modif value=Modifier></form> </td></tr>";
            }
            ?>
        </section>
    </body>
</html>
