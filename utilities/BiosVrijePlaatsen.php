<?php


class BiosVrijePlaatsen
{

    public function BiosCreateVrijePlaatsen($result)
    {
        $html = "";

        $html .= "<div class='col-12'>
                <h2>Beschikbare tijden: </h2>
            </div>
            <div class='col-12 col-md-6'>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $datum = $row["DATE_FORMAT(`datum`, '%d %M %Y')"];
            $begin_tijd = $row['begin_tijd'];;
            $eind_tijd = $row['eind_tijd'];
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
                "</table>" .
                "</div>";

        }

        $html .= "</div>";

        return $html;
    }

}
