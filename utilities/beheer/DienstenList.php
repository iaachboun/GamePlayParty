<?php


class DienstenList
{
    public function makeDienstenList($result)
    {

        $html = "";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";
        $html .= "<h1 style=''>Diensten</h1>";
        $html .= "<table id='paginas'><tbody>";
        $html .= "<tr><th>Dienst</th><th>Prijs</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $dienstID = $row['dienstID'];
            $biosId = $row['biosID'];
            $diesnt = $row['dienst'];
            $tarief = $row['tarief'];

            $html .= "<tr>";
            $html .= "<td><a href=?request=beheer&pagina=editGebruiker&userID=" . $dienstID . ">" . $biosId . "</a></td>";
            $html .= "<td>$dients</td>";
            $html .= "<td>$tarief</td>";
            $html .= "</tr>";
        }

        $html .= "</tbody></table>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;

    }
}