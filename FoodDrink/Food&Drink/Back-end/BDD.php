<?php
        $user = 'root';
        $password = 'root';

        $dbh = new PDO ('mysql:host=localhost;dbname=food and drink',$user, $password);
        $sth = $dbh->prepare('Select * from menu');
        $sth->execute();
        $results = $sth->fetchAll();
        if (isset($_POST['envoyer'])){
            $nouveau_nom_menu = $_POST['NEW_nom_menu'];
            $nouveau_entree = $_POST['NEW_entree'];
            $nouveau_plat = $_POST['NEW_plat']; 
            $nouveau_dessert = $_POST['NEW_dessert'];
            $nouveau_tarif = $_POST['NEW_tarif'];
            $nouveau_producteurs = $_POST['NEW_producteurs'];
            $nouveau_boisson = $_POST['NEW_boisson'];
            $nouveau_saison = $_POST['NEW_saison'];
            $nouveau_photo = $_POST['NEW_photo'];
            $ajout=("INSERT INTO `menu` (`nommenu`,`entree`, `plat de résistance`,`déssert`,`tarif`,`producteurs`,`boissons`,`saisons_idsaison`,`photo`) VALUES (:nom, :entree, :plat, :dessert, :tar, :prod, :boisson, :saison, :photo)");
            $result=$dbh->prepare($ajout);
            $execute=$result->execute(array(":nom"=>$nouveau_nom_menu,":entree"=>$nouveau_entree, ":plat"=>$nouveau_plat, ":dessert"=>$nouveau_dessert,":tar"=>$nouveau_tarif, ":prod"=>$nouveau_producteurs, ":boisson"=>$nouveau_boisson, ":saison"=>$nouveau_saison, ":photo"=>$nouveau_photo));
                if($execute){
                    echo 'Connexion Réussi';
                }else{
                    echo "Echec de la connexion";
                    print_r($result->errorInfo());
                }
        }
        
