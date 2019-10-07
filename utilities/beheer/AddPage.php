<?php


class AddPage
{

    public function paginaToevoegen(){
        $html ="";

        $html .= "<div class='col-12 pagina-select-container'>";
        $html .= "<div class='container'>";

        $html .= "<h1>Pagina toevoegen</h1>";
        $html .= "<form action='?request=beheer&pagina=addPage&func=addPage' method='post'>";
        $html .= "<input type='text' name='paginatitel' placeholder='Titel'>";
        $html .= "<br>";
        $html .= "<br>";
        $html .= "<textarea id='mytextarea' name='mytextarea' placeholder='Content toevoegen'></textarea>";
        $html .= "<input type='submit' class='btn-custom btn-green btn-lg submit-wysiwyg' value='Toevoegen'>";
        $html .= "</form>";
        $html .= "</div>";
        $html .= "</div>";


        return $html;
    }

}