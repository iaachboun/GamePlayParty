<?php


class ZaalSelect
{

    public function makeZaalSelect($zaalSelectSQLResult){

        $html = "";

        $html .= "<select id='zaal' name='zaal' class='form-control'>";

        while($row = $zaalSelectSQLResult->fetch(PDO::FETCH_ASSOC)){
            $zaal = $row['zaal'];
            $zaal_id = $row['zaal_id'];

            $html .= "<option value='$zaal_id'>$zaal</option>";
        }
        
        $html .= "</select>";

        return $html;

    }

}