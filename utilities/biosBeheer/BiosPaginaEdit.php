<?php


class BiosPaginaEdit
{

    public function paginaEditCreate($result)
    {
        $html ="";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $paginaID = $row['paginaID'];
            $pagina = $row['pagina'];
            $content = $row['content'];
        }

        $html .= "<h1>$pagina</h1>";
        $html .= "<form action='?request=beheer&pagina=editContent&paginaID=$paginaID&func=update' method='post'>";
        $html .= "<textarea id='mytextarea' name='mytextarea'>$content</textarea>";
        $html .= "<input type='submit' class='btn-custom btn-green btn-lg submit-wysiwyg' value='Opslaan'>";
        $html .= "</form>";
        $html .= "</div>";
        $html .= "</div>";


        return $html;

    }


}