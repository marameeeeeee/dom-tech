<?php
include "../controller/PacksC.php";

$c = new PackC();
$tab = $c->ListPack();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des types d'instruments</title>

</head>
<body>
    
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Liste des packs</h1>
        <h2>
            <a href="addpack.php">Ajouter un pack</a>
        </h2>
<main>
    <section class="ms-news-area pb-40 pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                <div class="ms-news-sidebar mb-70">
                                <div class="ms-news-widget">
                                    <div class="ms-input2-box p-relative">
                                        <input type="text" placeholder="Search Here . . .">
                                        <button class="ms-input2-search" type="submit"><i
                                                class="flaticon-loupe"></i></button>
                                    </div>
                                </div>
                                <div class="ms-news-widget ms-dot-none">
                                    <h3 class="ms-news-widget-title"> Pack Premium </h3>
                                    <ul>
                                        <li><a href="ideas-advice-details.html"> Tous Nos Instruments  </a>
                                        <li><a href="ideas-advice-details.html"> 5 Instruments A votre Choix </a>
                                        <li><a href="ideas-advice-details.html"> 3 Instruments A votre Choix  </a>
                                        
                                    </ul>
                                </div>
                                <div class="ms-news-widget ms-dot-none">
                                    <h3 class="ms-news-widget-title"> Pack Normal </h3>
                                    <ul>
                                        <li><a href="ideas-advice-details.html"> Piano + Guitare </a></li>
                                        <li><a href="ideas-advice-details.html"> Violon + Piano </a></li>
                                        <li><a href="ideas-advice-details.html"> Piano + Darbouka </a></li>
                                        <li><a href="ideas-advice-details.html"> Violon + Guitare </a></li>
                                        <li><a href="ideas-advice-details.html"> Guitare + Darbouka </a></li>
                                        <li><a href="ideas-advice-details.html"> Violon + Darbouka </a></li>
                                        
                                    </ul>
                                </div>
                                <div class="ms-news-widget ms-dot-none">
                                    <h3 class="ms-news-widget-title"> Pack Gratuit </h3>
                                    <ul>
                                        <li><a href="ideas-advice-details.html"> Initiation Piano </a></li>
                                        <li><a href="ideas-advice-details.html"> Initiation Violon </a></li>
                                        <li><a href="ideas-advice-details.html"> Initiation Guitare </a></li>
                                        <li><a href="ideas-advice-details.html"> Initiation Darbouka </a></li>
                                    </ul>
                                </div>
                                
                            </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="ms-ideas-item-wrap mb-70">
                        <div class="ms-ideas-item-grid mb-65">
                            <!-- Your PHP loop for pack display -->
                            <?php foreach ($tab as $pack) : ?>
                                <div class="ms-ideas-item">
                                    <!-- Replace with actual image source -->
                                    <div class="ms-ideas-img w-img ms-br-15 mb-30">
                                         <?php
                                                 if (!empty($pack['image'])) {
                                                 $imagePath = '../uploads/' . $pack['image']; // Assuming your images are stored in the 'uploads' folder
                                                 echo '<a href="ideas-advice-details.html"><img src="' . $imagePath . '" alt="ideas advice image"></a>';
                                                 } else {
                                                 echo 'Image not found';
                                                  }
                                         ?>
                                    </div>
                                    <!-- Display pack information -->
                                    <h3 class="ms-title3 white-text">
                                        <a href="ideas-advice-details.html"><?= $pack['nom']; ?></a>
                                    </h3>
                                    <p>Types: <?= $pack['types']; ?></p>
                                    <p>Price: <?= $pack['prix']; ?></p>
                                    <p>Description: <?= $pack['description']; ?></p>
                                    <!-- Add Update and Delete options here -->
                                
                                </div>
                            <?php endforeach; ?>
                            <!-- End of PHP loop -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

</div>
    <?php include 'footer.php'; ?>
</body>
</html>