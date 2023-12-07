<?php
require("../../config.php");
$pdo = config::getConnexion();

$query1 = $pdo->prepare("SELECT * FROM oeuvre");
$query1->execute();
$results = $query1->fetchAll(PDO::FETCH_ASSOC);

$query3 = $pdo->prepare("SELECT * FROM categorie");
$query3->execute();
$results2 = $query3->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="icofont.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ART THERAPY</title>
</head>

<body>
    <header>
        <a href="#" class="logo"><img src=""></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <div class="nav-item">
                <input type="text" id="searchInput" placeholder="Search" class="btn-reserve">
            </div>
            <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
            <li><a href="#Oeuvres" onclick="toggleMenu();">Oeuvres</a></li>
        </ul>
    </header>

    <section class="banniere" id="banniere">
        <div class="contenu">
            <h2>Discover the transformative power of creativity, healing, and self-expression through the art of therapy.</h2>
        </div>
    </section>

    <section>
        <div class="Oeuvres" id="Oeuvres">
            <div class="container">
                <div class="titre">
                    <h2 class="titre-texte">Our <span>A</span>rt Pieces</h2>
                    <p>Here's just a glimpse of our clients' Work</p>
                </div>
                <table>
                    <tr>
                        <?php
                        foreach ($results as $t) {
                            $pat = $t['user'];
                            $query2 = $pdo->prepare("SELECT * FROM user WHERE id_user = :id_user");
                            $query2->bindParam(':id_user', $pat, PDO::PARAM_INT);
                            $query2->execute();
                            $res2 = $query2->fetch(PDO::FETCH_ASSOC);

                            echo "
                            <th>
                                <div class='imbox'>
                                    <img src='./images/{$t['url']}' alt='Image'>
                                    <p>Prenom : {$res2['first_name']}</p>
                                    <p>Nom : {$res2['last_name']}</p>
                                    <p>ID Categorie : {$t['categorie']}</p>
                                    <button onclick=\"downloadImage('./images/{$t['url']}', '{$res2['first_name']}', '{$res2['last_name']}', '{$t['categorie']}')\">
                                        Download Image
                                    </button>
                                </div>
                            </th>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <div class="single-footer"></div>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script type="text/javascript">
        function downloadImage(imageUrl, firstName, lastName, categoryId) {
            var link = document.createElement('a');
            link.href = imageUrl;
            link.download = `Artwork_${firstName}_${lastName}_Category${categoryId}.jpg`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>

    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0);
        });

        function toggleMenu() {
            const menuToggle = document.querySelector('.menuToggle');
            const navbar = document.querySelector('.navbar');
            navbar.classList.toggle('active');
            menuToggle.classList.toggle('active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');

            function handleSearch(event) {
                if (event.key === 'Enter') {
                    const searchTerm = searchInput.value.trim();
                    const found = searchForText(searchTerm);

                    if (found) {
                        alert(`TEXT "${searchTerm}" FOUND.`);
                    } else {
                        alert(`TEXT "${searchTerm}" NOT FOUND.`);
                    }
                }
            }

            function searchForText(text) {
                const pageText = document.body.innerText;
                return pageText.includes(text);
            }

            searchInput.addEventListener('keydown', handleSearch);
        });
    </script>
    <script src="main.js"></script>
</body>

</html>
