<?php


class BeheerBioscopen
{

    public function makeBioscopenSelect($result)
    {

        $html = "";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";
        $html .= "<h1 style=''>Bioscopen</h1>";
        $html .= "<table id='paginas'><tbody>";
        $html .= "<tr><th>Bioscoop</th><th>Acties</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $biosID = $row['biosID'];
            $biosnaam = $row['biosnaam'];


            $html .= "<tr>";
            $html .= "<td><a href=?request=beheer&pagina=editBioscoop&biosID=" . $biosID . ">" . $biosnaam . "</a></td>";
            $html .= "</tr>";

        }
        $html .= "</tbody></table>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;

    }

}