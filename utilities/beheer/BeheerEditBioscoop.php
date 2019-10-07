<?php


class BeheerEditBioscoop
{

    public function makeBeheerEditBioscoopForm($result)
    {

        $html = "";
        $html .= "<div class='container'>";

        $html .= "<h1>Bioscoop aanpassen</h1>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $biosID = $row['biosID'];
            $biosnaam = $row['biosnaam'];
            $biosadres = $row['biosadres'];
            $biospostcode = $row['biospostcode'];
            $biosplaats = $row['biosplaats'];
            $biosprovincie = $row['biosprovincie'];
            $aantal_zalen = $row['aantal_zalen'];
        }

        $html .= "
        <form action='?request=beheer&pagina=editBioscoop&biosID=$biosID&func=updateBioscoop' method='POST'>
  <div class='form-group'>
    <label for='biosnaam'>Bioscoop naam</label>
    <input type='text' class='form-control' name='biosnaam' id='biosnaam' value='" . $biosnaam . "'>
  </div>
  <div class='form-group'>
    <label for='biosadres'>Bioscoop adres</label>
    <input type='text' class='form-control' name='biosadres' id='biosadres' placeholder='Password' value='" . $biosadres ."'>
  </div>
  <div class='form-group'>
    <label for='biospostcode'>Bioscoop postcode</label>
    <input type='text' class='form-control' name='biospostcode' id='biospostcode' placeholder='Password' value='" . $biospostcode ."'>
  </div>
  <div class='form-group'>
    <label for='biosplaats'>Bioscoop plaats</label>
    <input type='text' class='form-control' name='biosplaats' id='biosplaats' placeholder='Password' value='" . $biosplaats ."'>
  </div>
  <div class='form-group'>
    <label for='biosprovincie'>Bioscoop provincie</label>
    <input type='text' class='form-control' name='biosprovincie' id='biosprovincie' placeholder='Password' value='" . $biosprovincie ."'>
  </div>
  <div class='form-group'>
    <label for='aantal-zalen'>Aantal zalen</label>
    <input type='text' class='form-control' name='aantal_zalen' id='aantal-zalen' placeholder='Password' value='" . $aantal_zalen ."'>
  </div>
  <div class='form-group'>
    <label for='biosID'>Bioscoop ID</label>
    <input type='text' class='form-control' name='biosID' id='BiosID-zalen' placeholder='Password' value='" . $biosID ."' disabled>
  </div>
  
  <button type='submit' class='btn-custom btn-green'>Opslaan</button>
</form>";

        $html .= "</div>";


        return $html;

    }

}