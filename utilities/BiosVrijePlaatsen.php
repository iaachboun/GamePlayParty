<?php


class BiosVrijePlaatsen
{

    public function BiosCreateVrijePlaatsen($result)
    {
        $html = "";

        $html .= "
            <div class='col-12'>
                <h2>Beschikbare tijden: </h2>
            </div>
            <div class='col-12 beschikbare-tijden-container'>
            <div class='col-12'>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $reserveringsID = $row['reserveringsID'];
            $datum = $row["DATE_FORMAT(`reserveringsdatum`, '%d-%m-%Y')"];
            $begin_tijd = $row['TIME_FORMAT(`reservering_begin_tijd`, \'%h:%i\')'];;
            $eind_tijd = $row['TIME_FORMAT(`reservering_eind_tijd`, \'%h:%i\')'];
            $zaal = $row['zaal'];
            $console = $row['console'];
            $aantal_plaatsen = $row['aantal_stoelen'];
            $rolstoeplaatsen = $row['rolstoelplaatsen'];
            $schermgrootte = $row['schermgrootte'];


            $html .= "<form class='vrijePlaatsen' method='post' action='?request=reseveerForm'>" .
                "<input type='hidden' name='datum' value='$datum'>" .
                "<input type='hidden' name='begin_tijd' value='$begin_tijd'>" .
                "<input type='hidden' name='eind_tijd' value='$eind_tijd'>" .
                "<input type='hidden' name='zaal' value='$zaal'>" .
                "<input type='hidden' name='console' value='$console'>" .
                "<input type='hidden' name='aantal_plaatsen' value='$aantal_plaatsen'>" .
                "<input type='hidden' name='rolStoelPlaatsen' value='$rolstoeplaatsen'>" .
                "<input type='hidden' name='schermgrootte' value='$schermgrootte'>" .
                "<input type='hidden' name='reserveringsID' value='$reserveringsID'>" .
                "<table>" .
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
                "</tr>".
                "<tr>".
                "<td>Console:</td><td>$console</td>".
                "</tr>".
                "<tr><td>Schermgroote: </td><td>$schermgrootte</td></tr>".
                "<tr><td>Rolstoelplaatsen: </td><td>$rolstoeplaatsen</td></tr>".
                "</table>" .
                "<input type='submit' value='Reseveer deze zaal' class='btn btn-green'>" .
                "</form>";

        }

        $html .= "</div></div>";

        return $html;
    }

}
