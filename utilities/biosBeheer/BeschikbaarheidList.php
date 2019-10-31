<?php


class BeschikbaarheidList
{

    public function makeBeschikbaarhediList($result){

        $html = "";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";
        $html .= "<h1 style=''>Beschikbare reserveringen</h1>";
        $html .= "<table id='paginas'><tbody>";
        $html .= "<tr><th>Reservering</th><th>Zaal</th><th>Begin tijd</th><th>Eind tijd</th><th>Gereserveerd</th><th>Acties</th></tr>";

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $reserveringsdatum = $row['reserveringsdatum'];
            $reservering_begin_tijd = $row['reservering_begin_tijd'];
            $reservering_eind_tijd = $row['reservering_eind_tijd'];
            $gereserveerd = $row['gereserveerd'];
            $zaal = $row['zaal'];
            $reseveringsID = $row['reserveringsID'];

            $html .= "<tr>";
            $html .= "<td>$reserveringsdatum</a></td>";
            $html .= "<td>$zaal</td>";
            $html .= "<td>$reservering_begin_tijd</td>";
            $html .= "<td>$reservering_eind_tijd</td>";
            if($gereserveerd == "0") {
                $gereserveerd = "Beschikbaar";
                $html .= "<td><span style='color: green'>$gereserveerd</span></td>";
            }else{
                $gereserveerd = "Gereserveerd";
                $html .= "<td><span style='color: red'>$gereserveerd</span></td>";
            }
            $html .= "<td><a href=?request=biosbeheer&pagina=beschikbaarheden&func=verwijderDiesnt&reserveringsID=" . $reseveringsID . " onclick='return confirm(`Weet je zeker dat je deze resevering wilt verwijderen`)'>Verwijder</a></td>";
            $html .= "</tr>";

        }
        $html .= "</tbody></table>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;
    }

}