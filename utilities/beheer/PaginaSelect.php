<?php


class PaginaSelect
{

    public function makePaginaSelect($result){

        $html = "";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";
        $html .= "<h1 style=''>Pagina's</h1>";
        $html .= "<table id='paginas'><tbody>";
        $html .= "<tr><th>Pagina</th><th>Eigenaar</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $paginaID = $row['paginaID'];
            $pagina = $row['pagina'];
            $owner = $row['owner'];


            $html .= "<tr>";
            $html .= "<td><a href=?request=beheer&pagina=editContent&paginaID=" . $paginaID . ">" . $pagina . "</a></td>";
            $html .= "<td>$owner</td>";
            $html .= "</tr>";

        }
        $html .= "</tbody></table>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;

    }

}