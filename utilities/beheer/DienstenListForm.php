<?php


class DienstenListForm
{
    public function makeDienstenList($result)
    {

        $html = "";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";
        $html .= "<h1 style=''>Diensten</h1>";
        $html .= "<table id='paginas'><tbody>";
        $html .= "<tr><th>Dienst</th><th>Prijs</th><th>test</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $dienstID = $row['dienstID'];
            $biosId = $row['biosID'];
            $dienst = $row['dienst'];
            $tarief = $row['tarief'];

            $html .= "<tr>";
            $html .= "<td><a href=?request=beheer&pagina=editGebruiker&biosID=" . $biosID . ">" . $dienst . "</a></td>";
            $html .= "<td>€$tarief</td>";
            $html .= "</tr>";
        }

        $html .= "</tbody></table>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;

    }
}