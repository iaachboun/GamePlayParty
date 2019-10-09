<?php


class BiosDetailCreate
{

    public function createBiosDetail($result)
    {
        $html = "";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $content = $row['content'];

            $html .= "<div class='col-12 col-md-6'>";
            $html .= "<div class='detailContent'>";
            $html .= "<p id='contentData' style='display: block'>$content</p>";
            $html .= "</div>";
            $html .= "</div>";
        }


        return $html;
    }
}
