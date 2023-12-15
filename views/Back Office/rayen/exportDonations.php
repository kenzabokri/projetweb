<?php
include '../../../controller/rayen/donC.php';
include '../../../model/rayen/don2.php';

$donC = new donC();
$tab = $donC->listdons();

function arrayToCsv($data, $delimiter = ',', $enclosure = '"', $encloseAll = true, $nullToMysqlNull = false) {
    $output = '';
    foreach ($data as $row) {
        foreach ($row as $field) {
            if ($field === null && $nullToMysqlNull) {
                $output .= 'NULL';
            } else {
                if ($encloseAll || preg_match('/[' . $delimiter . ' \n \r \t]/', $field)) {
                    $output .= $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure;
                } else {
                    $output .= $field;
                }
            }
            $output .= $delimiter;
        }
        $output = rtrim($output, $delimiter) . "\n";
    }
    return $output;
}

$csvData = arrayToCsv($tab);

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=donation_data.csv");
header("Pragma: no-cache");
header("Expires: 0");

echo $csvData;
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./styletab.css">
</head>
<body>
    <div class="background"></div>
    <div class="body-wrapper">
        <div class="panel">
            <div class="aside"> 
                <div class="seperator"></div>
                <div class="list">
                    <a href="listDon.php" class="item">DONS</a>
                    <div class="seperator"></div>
                    <a href="addDon.php" class="item">ADD DONS</a>
                    <div class="seperator"></div>
                    <a href="listDest.php" class="item">Destination</a>
                    <div class="seperator"></div>
                    <a href="addDest.php" class="item">ADD DES</a>
                    <div class="seperator"></div>
                    <a href="statDon.php" class="item">STAT</a>
                    <div class="seperator"></div>
                    <a href="exportDonations.php" class="button">Download CSV</a>
                    <div class="seperator"></div>
                </div>
            </div>
            <div class="view">
                <div class="sub-title">RAYEN'S PANEL</div>
                <div class="main-title">Export Donations Data</div>
                <div class="seperator"></div>

                <p>Data has been exported to CSV. Click the button below to download.</p>
                <a href="exportDonations.php" class="button">Download CSV</a>
            </div>
        </div>
    </div>
</body>
</html>
