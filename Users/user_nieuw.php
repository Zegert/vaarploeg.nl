<?php
require_once '../Includes/config.php';
Head(4, "Nieuwe gebruiker");
?>
<!-- <div class="container"> -->
<form action="user_nieuw_verwerk.php" method="POST">
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="text" class='form-control' name="username" placeholder="Gebruikersnaam">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="text" class='form-control' name="firstname" placeholder="Voornaam">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="text" class='form-control' name="lastname" placeholder="Achternaam">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-text">
                <input type="password" class='form-control' name="password" placeholder="Wachtwoord">
            </div>
        </div>
    </div>
    <h5>Inlog rang</h5>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="1">
                </div>
            </div>
            <input class="form-control" placeholder="Opstapper" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="2">
                </div>
            </div>
            <input class="form-control" placeholder="Onderhoudscommissie" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="3">
                </div>
            </div>
            <input class="form-control" placeholder="Schipper" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="4">
                </div>
            </div>
            <input class="form-control" placeholder="CBH-lid" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="rang" value="5">
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
                    <input type="radio" name="schipper" value="0">
                </div>
            </div>
            <input class="form-control" placeholder="Opstapper" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="1">
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 0.18" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="2">
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 0.19 & 1.29" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="3">
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 1.19 & 1.39" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="4">
                </div>
            </div>
            <input class="form-control" placeholder="Dordrecht 1.49" readonly>
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-1">
            <div class="input-group-prepend ">
                <div class="input-group-text">
                    <input type="radio" name="schipper" value="5">
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
<!-- </div> -->
</body>

</html>