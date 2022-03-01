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
        <div class="col-4 pt-1">
        </div>
        <div class="col-4 text-center">
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="btn btn-sm btn-outline-secondary" href="portfolio.php">Home</a>
        </div>
      </div>
    </header>
   <main class="container">
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <!--opdracht/blogposts ophalen-->
            <?php
            $id = $_GET['id'];
            $dataid = $pdo->prepare("SELECT * FROM blogposts WHERE id = ?");
            $dataid->execute([$id]);
        foreach ($dataid as $row) {
            echo
          '<h1 class="display-4 fst-italic">' . $row["titel"] . '</h1>
          <p class="lead my-3">' . $row["opdracht_omschrijving"] . '</p>
          <p class="lead mb-0" class="text-white fw-bold"><b>Technieken:</b> ' . $row["technieken"] . '</p>
        </div>
      </div>
      <!--opdrachtuitwerking-->
      <div class="uitwerking">';
      if ($id == 6) {
      echo '<img width="100%" src="data:image/jpeg;base64, '.base64_encode($row["extra images"]) .'" />';
      };
      echo $row['uitwerking'] . '</div>';
        }
        ?>
        <!--schaakbord opdracht-->
        <?php
        if ($id == 2) {
        // for loop schaakbord zwart/wit kleuren
        echo "<table class='schaakbord'>";
        for ($rij = 0; $rij < 8; $rij++) {
            echo "<tr></tr>";
            for ($cel = 0; $cel < 8; $cel++) {
                if (($rij % 2) == 0) {
                    if (($cel % 2) == 0) {
                        echo "<td class='wit'></td>";
                    } else {
                        echo "<td class='zwart'></td>";
                    }
                } else {
                    if (($cel % 2) == 0) {
                        echo "<td class='zwart'></td>";
                    } else {
                        echo "<td class='wit'></td>";
                    }
                }
            }
        }
        ?>
        <style type="text/css">
        .uitwerking {
          display: none;
        }
        .schaakbord {
            border-spacing: 0;
            border: 1px solid darkgrey;
            margin: 3rem auto 5rem;
            align-content: center;

        }
        td {
            width: 50px;
            height: 50px;
            border: 1px solid darkgrey;
            margin: 0;
            padding: 0;
        }
        tr {
            margin: 0;
        }
        .wit {
            background-color: white;
        }
        .zwart {
            background-color: black;
        }
    </style>
     </table>
     <?php
    };
    // code calculator
      if ($id == 5) {
        echo
        '<div class="calculator"><h1>Calculator</h1>
        <form method="post" action="">
            <input type="text" name="first_number" id="first_number">
            <label for="first_number">First Number</label>
            <br><br>
            <input type="text" name="second_number" id="second_number">
            <label for="second_number">Second Number</label>
            <br><br>';
            $operator = $_POST;
            if (isset($_POST["first_number"]) && isset($_POST["second_number"])) {
              if (is_numeric($_POST["first_number"]) && is_numeric($_POST["second_number"])) {
                  $first_number = $_POST['first_number'];
                  $second_number = $_POST['second_number'];
            switch ($operator) {
                case (isset($_POST['add']) == true):
                    $antwoord = ($first_number) + ($second_number);
                    echo $antwoord;
                    break;
                case (isset($_POST['substract']) == true):
                    $antwoord = intval($_POST['first_number']) - intval($_POST['second_number']);
                    echo $antwoord;
                    break;
                case (isset($_POST['multiply']) == true):
                    $antwoord = intval($_POST['first_number']) * intval($_POST['second_number']);
                    echo $antwoord;
                    break;
                case (isset($_POST['divide']) == true):
                    $antwoord = intval($_POST['first_number']) / intval($_POST['second_number']);
                    echo $antwoord;
                    break;
                case (isset($_POST['modulo']) == true):
                    $antwoord = intval($_POST['first_number']) % intval($_POST['second_number']);
                    echo $antwoord;
                    break;
            }
          } else {
            echo "Graag een geldig getal invoeren.";
        }
    };
            echo '<br><br>
            <input type="submit" value="Add" name="add">
            <input type="submit" value="Substract" name="substract">
            <input type="submit" value="Multiply" name="multiply">
            <input type="submit" value="Divide" name="divide">
            <input type="submit" value="Modulo" name="modulo">
        </form></div>
      
        <style type="text/css">
        .uitwerking {
          display: none;
        }

        .calculator {
          align-content: center;
          margin: 3rem auto 5rem;
          width: fit-content;
        }
        </style>';

      };
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
  <p>Copyright© 2022 Donna Nieuwland <a href="blogposts.php">Terug naar boven</a></p>
</footer>
</body>
</html>