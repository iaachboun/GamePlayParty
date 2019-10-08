<?php


class AddBeschikbaarheidFormulier
{
    public function makeAddBeschikbaarheidFormulier($zaalSelect, $consoleSelect)
    {
        $biosID = $_SESSION['biosID'];

        $html = "";

        $html .= "        
        <form action='?request=biosbeheer&pagina=addBeschikbaarheid&biosID=$biosID&func=addNewBeschikbaarheid' method='POST'>
  <div class='form-group'>
    <label for='date'>Datum</label>
    <input type='date' class='form-control' name='date' id='date' placeholder='Datum'>
  </div>
  <div class='form-group'>
    <label for='begintijd'>Begin tijd</label>
    <input type='time' class='form-control' name='begintijd' id='begintijd' placeholder='Begin tijd'>
  </div>
  <div class='form-group'>
    <label for='biospostcode'>Eind tijd</label>
    <input type='time' class='form-control' name='eindtijd' id='eindtijd' placeholder='Eind tijd'>
  </div>
  <div class='form-group'>
    <label for='zaal'>zaal</label>
    $zaalSelect
  </div>
  <div class='form-group'>
    <label for='console'>Console</label>
    $consoleSelect
  </div>
      
  <button type='submit' class='btn-custom btn-green'>Opslaan</button>
</form>";

        return $html;
    }

}