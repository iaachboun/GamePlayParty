<div class="reseveer-form">
    <div class="container col-6">
        <br>
        <br>
        <br>
        <?php
        $datum = $data['datum'];
        $begin_tijd = $data['begin_tijd'];
        $eind_tijd = $data['eind_tijd'];
        $zaal = $data['zaal'];
        $console = $data['console'];
        $aantal_plaatsen = $data['aantal_plaatsen'];
        $rolstoeplaatsen = $data['rolStoelPlaatsen'];
        $schermgrootte = $data['schermgrootte'];
        $reserveringsID = $data['reserveringsID'];
        if (isset($data)) {
            echo "<table >" .
                "<tr>" .
                "<th><h3>$datum</h3></th>" .
                "</tr>" .
                "<tr>" .
                "<td>Tijd:</td>" .
                "<td>$begin_tijd - $eind_tijd</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Plaatsen:</td>" .
                "<td>$aantal_plaatsen</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Zaal:</td><td>$zaal</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Console:</td><td>$console</td>" .
                "</tr>" .
                "<tr><td>Schermgroote: </td><td>$schermgrootte</td></tr>" .
                "<tr><td>Rolstoelplaatsen: </td><td>$rolstoeplaatsen</td></tr>" .
                "</table>";
        }?>
        <br>
        <br>
        <br>
        <form method="post" action="?request=reseveerNOW">
            <input type="hidden" name="reserveringsID" value="<?php echo $reserveringsID ?>">
            <div class="form-group">
                <label for="exampleInputPassword1">Voornaam</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Voornaam">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Achternaam</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Achternaam">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <button type="submit" class="btn btn-primary">Reseveer nu!</button>
        </form>
    </div>
</div>
