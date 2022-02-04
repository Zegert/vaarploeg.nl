<?php
require_once '../Includes/config.php';
Head(1, "Account bewerken");
$row = SelectWhere("users", "ID", ID())->fetch();
?>
<form action="./account_bewerk_verwerk.php" method="POST">
    <input type="text" name="ID" value="<?php echo $row['ID']; ?>" placeholder="UserID" hidden>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="text" class='form-control' name="username" value="<?php echo $row['username']; ?>"
                    placeholder=" Gebruikersnaam">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="text" class='form-control' name="firstname" value="<?php echo $row['firstname']; ?>"
                    placeholder="Voornaam">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="text" class='form-control' name="lastname" value="<?php echo $row['lastname']; ?>"
                    placeholder="Achternaam">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="password" class='form-control' name="password" placeholder="Wachtwoord" value="">
            </div>
        </div>
    </div>
    <h5>Inlog rang</h5>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="1" disabled <?php
if ($row['rang'] == 1) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Opstapper" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="2" disabled <?php
if ($row['rang'] == 2) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Onderhoudscommissie" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="3" disabled <?php
if ($row['rang'] == 3) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Schipper" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="4" disabled <?php
if ($row['rang'] == 4) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="CBH-lid" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="5" disabled <?php
if ($row['rang'] == 5) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Admin" readonly>
        </div>
    </div>
    <!-- Schipper -->
    <h5>Schipper rang</h5>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="0" disabled <?php
if ($row['schipper'] == 0) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Opstapper" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="1" disabled <?php
if ($row['schipper'] == 1) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 0.18" disabled readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="2" disabled <?php
if ($row['schipper'] == 2) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 0.19 & 1.29" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="3" disabled <?php
if ($row['schipper'] == 3) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 1.19 & 1.39" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="4" disabled <?php
if ($row['schipper'] == 4) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 1.49" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="5" disabled <?php
if ($row['schipper'] == 5) {
    echo "checked";
}
?>>
                </div>
            </div>
            <input class="form-control" placeholder="Admin" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <input type="submit" value="Verzenden" class="btn btn-primary">
        </div>
    </div>
</form>
</body>

</html>