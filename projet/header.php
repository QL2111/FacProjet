<?php




?>
<!--HEADER DE LA PAGE-->
<header>
    <div class="wrap">
        <h1><a href="index.php"><img src="#" alt="index"></a></h1>


        <nav>
            <ul>
                <li><a href="index.php">accueil</a></li>
                <li><a href="login.php">login</a></li>
                <li><a href="creer_compte.php">créer compte</a></li>
                <li><a href="panier.php">panier</a></li>

            </ul>
        </nav>

        <form id="search" action="recherche.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="searchText">Rechercher :</label>
                <input id="searchText" name="query" type="text" value="" />
                <input id ="searchBtn" type="submit" class="bouton" value="OK" />
            </p>
        </form>


        <nav id="menu-categorie">
            <ul>
                <li><a href="#">tous les produits</a></li>
                <li><a href="#">Agenda</a></li>
                <li><a href="#">Reservations</a></li>

            </ul>
        </nav>
    </div>
</header>
