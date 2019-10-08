<?php


class ConsoleSelect
{

    public function makeConsoleSelect($consoleSelectSQLResult){

        $html = "";

        $html .= "<select id='console' name='console' class='form-control'>";

        while($row = $consoleSelectSQLResult->fetch(PDO::FETCH_ASSOC)){
            $console = $row['console'];
            $console_id = $row['console_id'];

            $html .= "<option value='$console_id'>$console</option>";
        }

        $html .= "</select>";

        return $html;

    }

}