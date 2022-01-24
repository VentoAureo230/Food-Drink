<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Food & Drink</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="reset.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="FrontEnd.css">
        <link rel="icon" type="image/svg+xml" href="food-and-drink.svg" class="favicon">
    </head>
    <header id="header">
        <nav class="navbar navbar-expand-sm fixed-top" style="min-height: 8vh; background-color: #212529;">
            <a href="#" class="navbar-brand"><img width="60" src="food-and-drink.svg" style="height: fit-content;"></a>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a href="#menu" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#prod" class="nav-link">Valeurs et Producteurs</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#notice" class="nav-link">Avis</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <body id="container">
        <?php
        $user = 'root';
        $password = 'root';
        $dbh = new PDO ('mysql:host=localhost;dbname=food and drink',$user, $password);
        
        $sqlQuery = 'SELECT * FROM menu';
        
        $take = $dbh->prepare($sqlQuery);
        $take->execute();
        $recups = $take->fetchAll();
        ?>
        <section id="menu">
            <?php
                    $sqlQuery = "Select * FROM menu WHERE `EnCours`=1 AND `cacher`=1";
                    
                    $take = $dbh->prepare($sqlQuery);
                    $take->execute();
                    $recups = $take->fetchAll();
                    ?>
                <div class="table-responsive-sm">
                    <table class='table'>
                        <thead class="tab-menu">
                            <h1> Food & Drink</h1>
                            <h2 class="title">Nos Menus</h2>
                            <tr>
                                <td scope="col">Nom du menu</td>
                                <td scope="col">Entrée</td>
                                <td scope="col">Plat</td>
                                <td scope="col">Dessert</td>
                                <td scope="col">Boissons</td>
                                <td scope="col">Tarif</td>
                            </tr>
                        </thead>
                        <tbody class="tab-menu">
                            <?php
                                foreach ($recups as $recup){
                                    echo("<tr>");
                                    echo ("<th scope='row'>". $recup['nom']."</th>\n");  
                                    echo ("<td>". $recup['entree']."</td>\n");
                                    echo ("<td>". $recup['plat']."</td>\n");
                                    echo ("<td>". $recup['dessert']."</td>\n");
                                    echo ("<td>". $recup['boissons']."</td>\n");
                                    echo ("<td>". $recup['tarif']."</td>\n");
                                }
                            ?><br>
                        </tbody>
                    </table>
                </div>
                <div class="photo-menu">
                    <?php
                        $photo = "";
                        foreach ($recups as $recup){
                            echo("<div class='photo-container'>");
                                echo("<img class='photo' src=".$recup['photo']."></img>");
                            echo("</div>");
                        }
                    ?><br>
                </div>    
            
        </section>
        <section id="prod">
            <div class="prod-container">
                <h2>Les valeurs Food & Drink</h2>
                <p class="text-value">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum venenatis magna, et faucibus ante porta et. Donec malesuada nibh at mattis dictum. Pellentesque faucibus pulvinar est at lobortis. Curabitur pretium fermentum tortor, et imperdiet tellus tincidunt et. Aliquam laoreet, mi eget facilisis iaculis, velit nibh tristique tortor, et pulvinar nulla eros fermentum nunc. Aenean vel aliquam ligula. Ut et mauris nec dolor ultricies pharetra.
                </p>
                <h2>Nos colaborateurs</h2>
                <div class="refsite-img-1">
                    <a href="https://www.amisdelaferme.fr/"><img class="refsite-photo" src="https://www.amisdelaferme.fr/img/les-amis-de-la-ferme-logo-1607704136.jpg"/></a><br></br>
                    <a href="https://www.cueillette-bio-rennes.fr/"><img class="refsite-photo" src="https://pbs.twimg.com/media/FJ0ydP3XwAAf2hy?format=jpg&name=240x240"/></a><br></br>
                    <a href="https://www.maisongesbert.com"><img class="refsite-photo" src="https://www.mairie-labouexiere.fr/wp-content/uploads/sites/4/2019/08/boucherie-gesbert.jpg"/></a><br></br>
                </div>
            </div>
        </section>
        <section id="notice">
            <div>
                <h2>Ils parlent de nous !</h2>
                    <div class="refsite-img">
                        <a href="https://guide.michelin.com/fr/fr/bretagne/rennes/restaurant/la-fontaine-aux-perles"><img class="refsite-photo" src="https://pbs.twimg.com/profile_images/1110924847205543936/M6_lEWtg_400x400.png" alt="Logo Guide Michelin"/></a>
                        <a href="https://www.tripadvisor.fr/Restaurant_Review-g187103-d2178028-Reviews-La_Fontaine_aux_Perles-Rennes_Ille_et_Vilaine_Brittany.html"><img class="refsite-photo" src="https://pbs.twimg.com/profile_images/1222454962103427073/Yz9RUJRm_400x400.jpg" alt="Logo Trip Advisor"/></a>
                        <a href="https://fr.gaultmillau.com/restaurants/la-fontaine-aux-perles"><img class="refsite-photo" src="https://pbs.twimg.com/profile_images/1352580896692580357/h_AALoLI_400x400.jpg" atl="Logo Gault Millau"/></a>
                    </div>
            </div>
        </section>
        <section id="contact">
            <div>
                <div class="gmap">
                    <div class="contact-info">
                        <p>Numéro de téléphone : 02 42 58 78 96</p>
                        <p>5 Rue de la Michardière</p>
                        <p>35785 Bolon</p>
                    </div>
                    <div class="contact-info">
                        <p>Nos horaires d'ouverture :</p>
                        <p>Du Lundi au Vendredi de 12h à 14h</p>
                        <p>Et tout les soirs à partir de 18h</p>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252797.71242954797!2d-35.16714414320145!3d-8.105121897172953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab1f2b37566bb1%3A0x2a2153f1c78383e!2sFood%20%26%20Drinks!5e0!3m2!1sfr!2sfr!4v1641998165337!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="gmap"></iframe>
                    </div>
                </div>
                <form>
                    <div class="contact-container">
                        <div class="d-flex justify-content-center">
                            <div class="col-8 m-4">
                                <form action="contact.php" method="POST">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <h2>Contactez-nous ! </h2>
                                        </div>
                                        <div class="d-flex">
                                            <input type="text" name="surname" placeholder="Nom" autocomplete="off" class="form-control"/>
                                            <input type="text" name="firstname" placeholder="Prénom" autocomplete="off" class="form-control"/>
                                        </div>
                                        <br/>
                                        <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control"/>
                                        <br/>
                                        <textarea rows="10" name="message" placeholder="Votre message" class="form-control"></textarea>
                                        <br/>
                                        <button type="submit" class="btn btn-lg btn-primary">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    <footer class="footer">
        <ul class="nav-footer">
        <li class="nav-item"><a href="#menu" class="nav-link text-muted">Home</a></li>
        <li class="nav-item"><a class="nav-link text-muted">Mentions légales</a></li>
        <li class="nav-item"><a class="nav-link text-muted">Politique de confidentialité</a></li>
        </ul>
        <p class="text-center text-muted">© 2022 Food & Drink, Inc</p>
  </footer>
</html>



