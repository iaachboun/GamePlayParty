<?php


class biosDetailCreate
{

    public function createBiosDetail($result)
    {
        $html = "";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $biosnaam = $row['biosnaam'];
            $omschrijving = nl2br($row['omschrijving']);
            $biosadres = $row['biosadres'];
            $biospostcode = $row['biospostcode'];
            $biosplaats = $row['biosplaats'];
            $biosprovincie = $row['biosprovincie'];

            $html .= "<div class='col-12 col-md-6 detailImg-section'>";
            $html .= "<img class='detailImg' src='assets/img/$biosnaam.jpg' alt=''>";
            $html .= "</div>";
            $html .= "<div class='col-12 col-md-6'>";
            $html .= "<div class='detailContent'>";
            $html .= "<h3>$biosnaam</h3>";
            $html .= "<p>$omschrijving</p>";
            $html .= "<p>$biosadres<br>$biospostcode $biosplaats<br>$biosprovincie</p>";
            $html .= "</div>";
            $html .= "</div>";
        }


        return $html;
    }
}