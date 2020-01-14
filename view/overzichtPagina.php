<div class="overzichtpagina">
    <div class="container">
        <?php
        $totaal = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $datum = $row["reserveringsdatum"];
            $begin_tijd = $row["reservering_begin_tijd"];
            $eind_tijd = $row["reservering_eind_tijd"];
            $datum = $row["reserveringsdatum"];
            $totaal = $totaal + 1;
            echo "<table >" .
                "<tr>" .
                "<th><h3>$datum</h3></th>" .
                "</tr>" .
                "<tr>" .
                "<td>Tijd:</td>" .
                "<td>$begin_tijd - $eind_tijd</td>" .
                "</tr>" .
                "</table>";

        }
        echo "Totaal aantal reserveringen " . $totaal;
        ?>
    </div>
</div>
