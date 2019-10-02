<?php


class BiosVrijePlaatsen
{

    public function biosCreateVrijePlaatsen($result)
    {
        $html = "";

        $html .= "
            <div class='col-12'>
                <h2>Beschikbare tijden: </h2>
            </div>
            <div class='col-12 beschikbare-tijden-container'>
            <div class='col-12'>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $datum = $row["DATE_FORMAT(`datum`, '%d-%m-%Y')"];
            $begin_tijd = $row['TIME_FORMAT(`begin_tijd`, \'%h:%i\')'];;
            $eind_tijd = $row['TIME_FORMAT(`eind_tijd`, \'%h:%i\')'];
            $zaal = $row['zaal'];
            $aantal_plaatsen = $row['aantal_plaatsen'];

            $html .= "<div class='vrijePlaatsen'>" .
                "<table>" .
                "<tr>" .
                "<th><h3>$datum</h3></th>" .
                "</tr>" .
                "<tr></tr>" .
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
                "</table>" .
                "</div>";

        }

        $html .= "</div></div>";

        return $html;
    }

}