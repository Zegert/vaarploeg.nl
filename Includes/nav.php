<nav>
    <table class="nav_table">
        <tr>
            <?php
echo "<th class='nav_item'><a href='./home.php'>Vaarploeg.nl</a></th>";
echo '<th class="nav_item"><a href="./Account/home.php">Account</a></th>';
//echo $rang;
if ($_SESSION['rang'] >= 5) {
    echo "<th class='nav_item'><a href='./Users/user.php'>Gebruikers</a></th>";
}
if ($_SESSION['rang'] >= 2) {
    echo "<th class='nav_item'><a href='./Schade/schade.php'>Schaderapporten<a/></th>";
}
if ($_SESSION['rang'] >= 3) {
    echo "<th class='nav_item'><a href='./Schipper/schipper.php'>Schippers</a></th>";
    echo "<th class='nav_item'><a href='./Opstapper/opstapper.php'>Opstappers</a></th>";
}
?>
            <th class='nav_item'><a href="./Vaarrapporten/vr_nieuw.php">Vaarrapporten</a></th>
            <th class='nav_item'><a href="./Training/home.php">Trainingen</a></th>
            <th class='nav_item'><a href='./uitlog.php'>Uitloggen</a></th>
        </tr>
    </table>
</nav>