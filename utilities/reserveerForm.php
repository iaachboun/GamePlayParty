<?php


class reserveerForm
{

    public function makeReserveerForm($result, $data){
        var_dump($result);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $dienstID = $row['dienstID'];
            $dienst = $row['dienst'];
            $tarief = $row['tarief'];
        }

        $reserveringsID = $data['reserveringsID'];
        $html = "";
        $html .= "<form method='post' action='?request=reseveerNOW'>
            <input type='hidden' name='reserveringsID' value='<?php echo $reserveringsID ?>'>
            <div class='form-group'>
                <label for='naam'>Naam</label>
                <input type='text' class='form-control' name='naam' id='naam' placeholder='Naam'>
            </div>
            <div class='form-group'>
                <label for='exampleInputPassword1'>Achternaam</label>
                <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Achternaam'>
            </div>
            <div class='form-group'>
                <label for='exampleInputEmail1'>Email address</label>
                <input type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'
                       placeholder='Enter email'>
                <small id='emailHelp' class='form-text text-muted'>We'll never share your email with anyone
                    else.</small>
            </div>
            <button type='submit' class='btn btn-primary'>Reseveer nu!</button>
        </form>";


        return $html;
    }


}