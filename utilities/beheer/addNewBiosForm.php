<?php

class addNewBiosForm
{

    public function newBios()
    {

        $html = "<div class='container'>";

        $html .= "<h1>Bioscoop toevoegen</h1>";


        $html .= "
        <form action='?request=beheer&pagina=addBioscoop&func=addBios' method='post'>
  <div class='form-group'>
    <label for='biosnaam'>Bioscoop naam</label>
    <input type='text' class='form-control' name='biosnaam' id='biosnaam'>
  </div>
  <div class='form-group'>
    <label for='biosadres'>Bioscoop adres</label>
    <input type='text' class='form-control' name='biosadres' id='biosadres' >
  </div>
  <div class='form-group'>
    <label for='biospostcode'>Bioscoop postcode</label>
    <input type='text' class='form-control' name='biospostcode' id='biospostcode' >
  </div>
  <div class='form-group'>
    <label for='biosplaats'>Bioscoop plaats</label>
    <input type='text' class='form-control' name='biosplaats' id='biosplaats' >
  </div>
  <div class='form-group'>
    <label for='biosprovincie'>Bioscoop provincie</label>
    <input type='text' class='form-control' name='biosprovincie' id='biosprovincie' >
  </div>
  <div class='form-group'>
    <label for='aantal-zalen'>Omschrijving</label>
    <input type='text' class='form-control' name='omschrijving' id='aantal-zalen' >
  </div>
  
    <div class='form-group'>
    <label for='aantal-zalen'>beschickbaarheid auto</label>
    <input type='text' class='form-control' name='beschickbaarheid_auto' id='aantal-zalen' >
  </div>
    <div class='form-group'>
    <label for='aantal-zalen'>beschickbaarheid fiets</label>
    <input type='text' class='form-control' name='beschickbaarheid_fiets' id='aantal-zalen' >
  </div>
    <div class='form-group'>
    <label for='aantal-zalen'>beschickbaarheid OV</label>
    <input type='text' class='form-control' name='beschickbaarheid_OV' id='aantal-zalen' >
  </div>
  
  <div class='form-group'>
    <label for='aantal-zalen'>Aantal zalen</label>
    <input type='text' class='form-control' name='aantal_zalen' id='aantal-zalen' >
  </div>
  <div class='form-group'>
    <label for='biosID'>Bioscoop ID</label>
    <input type='text' class='form-control' name='biosID' id='BiosID-zalen' disabled>
  </div>
  
  <button type='submit' class='btn-custom btn-green'>Opslaan</button>
</form>";


        return $html;
    }

}