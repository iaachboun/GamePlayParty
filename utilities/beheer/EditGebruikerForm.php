<?php


class EditGebruikerForm
{

    public function makeEditGebruikerForm($result){

        $html = "<div class='container'>";

        $html .= "<h1>Gebruiker aanpassen</h1>";

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $userID = $row['userID'];
            $username = $row['username'];
            $email = $row['email'];
            $wachtwoord = $row['wachtwoord'];
        }

        $html .= "<form action='?request=beheer&pagina=editGebruiker&userID=$userID&func=updateGebruiker' method='POST'>
<div class='form-group'>
    <label for='username'>Gebruikersnaam</label>
    <input type='text' class='form-control' name='username' id='username' value='" . $username . "'>
  </div>
  <div class='form-group'>
    <label for='email'>Email</label>
    <input type='text' class='form-control' name='email' id='email' value='" . $email . "'>
  </div>
  <div class='form-group'>
    <label for='wachtwoord'>Wachtwoord</label>
    <input type='text' class='form-control' name='wachtwoord' id='wachtwoord' value='" . $wachtwoord . "'>
  </div>
  <div class='form-group'>
    <label for='userID'>UserID</label>
    <input type='text' class='form-control' name='userID' id='userID' value='" . $userID . "' disabled>
  </div>
 <button type='submit' class='btn-custom btn-green'>Opslaan</button>
 </form>
 </div>";


        return $html;
    }

}