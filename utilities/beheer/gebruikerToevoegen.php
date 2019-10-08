<?php


class gebruikerToevoegen
{

    public function addUserForm($result)
    {

        $html = "<div class='container'>";

        $html .= "<h1>Gebruiker toevoegen</h1>";

        $html .= "<form action='?request=beheer&pagina=addGebruiker&func=addUser' method='POST'>
<div class='form-group'>
    <label for='username'>Gebruikersnaam</label>
    <input type='text' class='form-control' name='username' id='username' >
  </div>
  <div class='form-group'>
    <label for='email'>Email</label>
    <input type='text' class='form-control' name='email' id='email' >
  </div>
  <div class='form-group'>
    <label for='wachtwoord'>Wachtwoord</label>
    <input type='text' class='form-control' name='wachtwoord' id='wachtwoord' >
  </div>
  <div class='form-group'>
        <label for='Rol'>Type gebruiker</label>
    <select id='userSelectClass' class='form-control' name='rol'>
    <option>Website beheerder</option>
    <option>Biscoop beheerder</option>
    <option>Toeschouwer</option>
    </select>
  </div>
  <div id='userSelectBiosGroup' class='form-group' style='display: none'>
        <label for='Rol'>Bioscoop</label>
    <select id='userSelectBios' class='form-control' name='bioscoop'>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<option>";
            $html .= $row['biosnaam'];
            $html .= "</option>";
        }

        $html .= "</select>
  </div>
  
  <div class='form-group'>
    <input type='hidden' class='form-control' name='userID' id='userID' disabled>
  </div>
 <button type='submit' class='btn-custom btn-green'>Opslaan</button>
 </form>
 </div>";


        return $html;
    }

}?>

