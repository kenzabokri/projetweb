<?php
include "../../../controller/kenza/evente.php";

$e = new eventc();
$tab = $e->list();

$currentMonth = date('n');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedMonth'])) {
    $currentMonth = $_POST['selectedMonth'];
}

$eventsByDay = [];

foreach ($tab as $event) {
    $month = date('n', strtotime($event['date']));
    $dayOfMonth = date('j', strtotime($event['date']));

    if ($month == $currentMonth) {
        $eventsByDay[$dayOfMonth][] = $event['nomevent'];
    }
}

$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, date('Y'));

$firstDayOfWeek = date('w', strtotime(date("Y-$currentMonth-1")));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final avec jointure sm - Copie/model/kenza/style.css">
    <link rel="stylesheet" href="/final avec jointure sm - Copie/model/kenza/icofont.css">
    <title>Event Calendar</title>
    <style>
        body {
            background-color: #BF8DC6; 
        }
        table {
            margin: auto; 
            border-collapse: collapse;
            width: 70%;
            margin-top: 20px;
            border: 2px solid #8e44ad;
            background-color: #9b59b6;
            color: #fff; 
        }
        th, td {
            border: 2px solid #8e44ad;
            text-align: center;
            padding: 15px;
        }
        th {
            background-color: #8e44ad; 
            color: #fff; 
        }
        td {
            min-height: 100px;
        }
        td:hover {
            background-color: #674172; 
        }
        select, input {
            margin-top: 10px;
            padding: 5px;
        }
    </style>
</head>
<!--<header>
        <a href="#" class="logo"><img src="../../images/logo_2.png" alt=""></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
            <li><a href="#apropos" onclick="toggleMenu();">About</a></li>
            <li><a href="#menu" onclick="toggleMenu();">Lessons</a></li>
            <li><a href="event.php">Events</a></li>
            <li><a href="#expert" onclick="toggleMenu();">Our Art Therapists</a></li>
            <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
            <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
            <li><a href="#donation" onclick="toggleMenu();">Donation</a></li>
            <li><a href="#signup" onclick="toggleMenu();">signUp</a></li>
            <a href="#login" class="btn-reserve" onclick="toggleMenu();">Login</a>
        </ul>
    </header>-->
<body>
    <center>
        <h1>calendrier des évènements</h1>
        <form method="POST">
            <label for="selectedMonth">choisir un mois:</label>
            <select name="selectedMonth" id="selectedMonth">
                <?php
                for ($month = 1; $month <= 12; $month++) {
                    echo "<option value=\"$month\"";
                    echo $month == $currentMonth ? " selected" : "";
                    echo ">" . date("F", mktime(0, 0, 0, $month, 1)) . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="voir évènements">
        </form>
    </center>
    <table border="1" align="center">
        <tr>
            <th colspan="7"><?= date("F", mktime(0, 0, 0, $currentMonth, 1)); ?></th>
        </tr>
        <tr>
            <th>dimanche</th>
            <th>lundi</th>
            <th>mardi</th>
            <th>mercredi</th>
            <th>jeudi</th>
            <th>vendredi</th>
            <th>samedi</th>
        </tr>
        <tr>
            <?php
            $currentDay = 1;
            for ($i = 0; $i < $firstDayOfWeek; $i++) {
                echo "<td></td>";
            }

            for ($i = 1; $i <= $daysInMonth; $i++) {
                $dayOfWeek = date('w', strtotime(date("Y-$currentMonth") . "-$i"));
                $isCurrentMonth = ($i == $currentDay);

                if ($dayOfWeek == 0 && $i != 1) {
                    echo "</tr><tr>";
                }

                echo "<td";
                echo $isCurrentMonth ? " style='background-color: ;'" : "";
                echo ">";

                echo $isCurrentMonth ? "<b>$i</b>" : $i;

                if (isset($eventsByDay[$i])) {
                    echo "<ul>";
                    foreach ($eventsByDay[$i] as $eventName) {
                        echo "<li>$eventName</li>";
                    }
                    echo "</ul>";
                }

                echo "</td>";
            }
            ?>
        </tr>
    </table>
</body>
</html>
