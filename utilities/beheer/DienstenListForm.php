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
        $html .= "<tr><th>Dienst</th><th>Prijs</th><th>Acties</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $dienstID = $row['dienstID'];
            $biosID = $row['biosID'];
            $dienst = $row['dienst'];
            $tarief = $row['tarief'];

            $html .= "<tr>";
            $html .= "<td><a href=?request=beheer&pagina=editDienst&biosID=" . $biosID . ">" . $dienst . "</a></td>";
            $html .= "<td>€$tarief</td>";
            $html .= "<td><a href=?request=beheer&pagina=diensten&func=verwijderDiesnt&diesntID=" . $dienstID . " onclick='return confirm(`Weet je zeker dat je deze dienst wilt verwijderen`)'>Verwijder</a></td>";
            $html .= "</tr>";
        }

        $html .= "</tbody></table>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;

    }
}