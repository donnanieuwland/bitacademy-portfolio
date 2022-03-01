<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bit-Academy Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
 <!-- Custom styles for this template -->
 <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet" type="text/css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  
<?php
$host = '127.0.0.1';
$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
$db = 'portfolio_bitacademy';

$dsn = "mysql:host=$servername;dbname=$db";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);

} catch (\PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>
</head>

<body>

  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
      </div>
    </header>
    <main class="container">
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">Bit-Academy Portfolio</h1>
          <p class="lead my-3">
          Eind 2021 ben ik begonnen aan de opleiding Full Stack Web developer aan de Bit Academy. Deze 10 weken durende opleiding stond in het kader van het leren van HTML, CSS, Javascript(extra module), omgaan met een Command Line Terminal, PHP en Database PDO(extra module).
          Om een idee te krijgen welke kennis ik heb opgedaan tijdens de opleiding, heb ik een aantal opdrachten van de opleiding uitgekozen om weer te geven in dit portfolio. Per opdracht is de opdrachtomschrijving, gebruikte technieken en uitwerking weergegeven. De data hiervan wordt opgehaald uit een MySQL database.
        </p>
        </div>
      </div>
      <!--blogposts-->
      <div class="blogposts">
              <?php
              $data = $pdo->query('SELECT * FROM blogposts');
              foreach ($data as $row) {
                echo 
                '<div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">' . $row["hoofdtechniek"] . '</strong>
                <h3 class="mb-0">' . $row["titel"] . '</h3>
                <p class="card-text mb-auto">' . $row["samenvatting"] . '</p>
                <a class="stretched-link" href="blogposts.php?id=' . $row['id'] . '">Lees meer</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                <img alt="blog-image" class="bd-placeholder-img" width="250px" height="auto" src="data:image/jpeg;base64, '.base64_encode($row["images"]) .'" />
                </div>
              </div>
              </div>';
              }
                ?>
        </div>
    </main>
  </div>
  <!--footer-->
<footer class="footer">
<div class="contact-footer">
  <h3 class="mb-0">CONTACT: </h3>
    <a href="https://www.linkedin.com/in/donna-nieuwland-21240883/" target="_blank"><img alt="linkedin-logo" src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png"/></a>
    <a href="mailto: donnanieuwland@gmail.com" class="intern"><img alt="email-logo" src="https://img.icons8.com/ios-filled/50/ffffff/email-open.png"/></a>
          </div>         
  <p>Copyright© 2022 Donna Nieuwland <a href="portfolio.php">Terug naar boven</a></p>
</footer>
</body>
</html>