<div class="beheer-section">
    <div class="container">
        <div class="row beheerNav-section">
            <div class="col-12 beheerNav">
                <a class="nav-link" href="?request=beheer&pagina=Home">Home</a>
                <a class="nav-link" href="?request=beheer&pagina=bioscopen">bioscopen</a>
                <a class="nav-link" href="?request=beheer&pagina=bioscopen">contact</a>
            </div>
        </div>
        <div class="row">
            <form method="get" action="?request=updateData">
                <?php
                $done = false;
                $content = "";
                $allIDS = [];
                $titleId = [];
                $omschrijvingId = [];

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if ($page == 'bioscopen') {
                        $id = rand(1, 999999);
                        array_push($allIDS, $row['biosID']);
                        foreach ($row as $key => $value) {
                            if (in_array($value, $allIDS)) {
                                echo "<input type='hidden' name='id' value='$id'>";
                                echo "<textarea class='beheerContent $id' name='beheerTitle$id'>" . $row['biosnaam'] . "</textarea>";
                                $id1 = rand(1, 999999);
                                array_push($omschrijvingId, $id1);
                                echo "<textarea class='beheerContent $id1' name='beheerContent$id'>" . $row['omschrijving'] . "</textarea><br>";
                            }
                        }
                    } else {
                        foreach ($row as $key => $value) {
                            $id = rand(1, 999999);
                            $content .= "<textarea class='beheerContent $id' name='beheerContent$id'>" . $value . "</textarea>";
                        }
                    }
                    echo $content;
                } ?>
                <input type="submit" name="submit">
                <input type="hidden" name="request" value="updateData">
            </form>
        </div>
    </div>
</div>
<?php


