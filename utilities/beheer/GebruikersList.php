<?php


class GebruikersList
{
    public function makeGebruikersList($result)
    {

        $html = "";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";
        $html .= "<h1 style=''>Gebruikers</h1>";
        $html .= "<table id='paginas'><tbody>";
        $html .= "<tr><th>Gebruiker</th><th>Rol</th><th>Bioscoop</th><th>Acties</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $userID = $row['userID'];
            $username = $row['username'];
            $rol = $row['rol'];
            $biosnaam = $row['biosnaam'];

            if($biosnaam == "" || $biosnaam == null){
                $biosnaam = "n.v.t.";
            }

            switch ($rol) {
                case '0':
                    $rol = "beheerder";
                    break;
                case '1':
                    $rol = "bioscoop beheerder";
                    break;
                case '2':
                    $rol = "toeschouwer";
                    break;
            }

            $html .= "<tr>";
            $html .= "<td><a href=?request=beheer&pagina=editGebruiker&userID=" . $userID . ">" . $username . "</a></td>";
            $html .= "<td>$rol</td>";
            $html .= "<td>$biosnaam</td>";
            $html .= "<td><a href=?request=beheer&pagina=paginas&func=verwijderUser&userID=" . $userID . " onclick='return confirm(`Weet je zeker dat je deze gebruiker wilt verwijderen`)'>Verwijderen</a></td>";
            $html .= "</tr>";
        }

        $html .= "</tbody></table>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;

    }
}