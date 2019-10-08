<?php

class addNewDienstForm
{

    public function makeNewDienstForm()
    {

        $html = "<div class='container'>";

        $html .= "<h1>Dienst toevoegen</h1>";


        $html .= "
        <form action='?request=beheer&pagina=addDiensten&func=addDienst' method='post'>
  <div class='form-group'>
    <label for='dienst'>Dienst naam</label>
    <input type='text' class='form-control' name='dienst' id='dienst'>
  </div>
  <div class='form-group'>
    <label for='tarief'>Dienst tarief</label>
    <input type='text' class='form-control' name='tarief' id='tarief' >
  </div>
  <button type='submit' class='btn-custom btn-green'>Opslaan</button>
</form>";


        return $html;
    }

}