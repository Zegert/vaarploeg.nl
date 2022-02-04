<?php   require_once('../Includes/config.php');
        include_once("../Includes/nav.php");

if ($_SESSION['rang'] >= 1) {
} else {
    header('Location: index.html');
}
?>
<html>

<head>
    <title>Evenementen</title>
    <link rel="stylesheet" type="text/css" href="../Includes/style_nav.css">
</head>

<body>
    <h1>Evenementen</h1>
    <?php if($_SESSION['rang'] >= 4){
        echo "<p>Klik <a href='schipper_nieuw.html'>hier</a> om een evenement toe te voegen.</p>";
    }?>
    <!-- <p>Klik <a href="vr_nieuw.html">hier</a> om een schipper te bekijken.</p> -->
    <!-- <p>Klik <a href="vr_nieuw.html">hier</a> om een opstapper te bekijken.</p> -->


    <?php
    $result = mysqli_query($mysqli, "SELECT * FROM evenementen");
    echo "<table>";
    //row kopjes
    echo "<tr>";

    echo "<th> ID </th>";
    echo "<th> Naam </th>";
    echo "<th> Datum </th>";
    echo "<th> Vaartuigen </th>";


    echo "</tr>";

    //while loop
    while ($row = mysqli_fetch_array($result)) {

        //row people
        echo "<tr>";

        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Naam'] . "</td>";
        echo "<td>" . $row['Datum'] . "</td>";
        echo "<td>" . $row['Vaartuigen'] . "</td>";

        if($_SESSION['rang'] >= 4){
            echo '<td><a href="evenementen_bewerk.php?ID=' . $row['ID'] . '">Updaten</a></td>';
        }
        if($_SESSION['rang'] >= 5){
            echo '<td><a href="evenementen_verwijder.php?ID=' . $row['ID'] . '"> Verwijderen</a></td>';
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>

</body>

</html>