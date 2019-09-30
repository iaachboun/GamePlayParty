<div class="beheer-section">
    <div class="container">
        <div class="row beheerNav-section">
            <div class="col-12 beheerNav">
                <a class="nav-link" href="?request=beheer&pagina=Home">Home</a>
                <a class="nav-link" href="?request=beheer&pagina=footerContent">footerContent</a>
                <a class="nav-link" href="?request=beheer&pagina=bioscopen">bioscopen</a>
                <a class="nav-link" href="?request=beheer&pagina=bioscopen">contact</a>
            </div>
        </div>
        <div class="row">
            <form method="post">
                <?php
                $done = false;
                $content = "";
                $allIDS = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if ($page == 'bioscopen') {
                        array_push($allIDS, $row['biosID']);
                        foreach ($row as $key => $value) {
                            if (in_array($value, $allIDS)) {
                                $id = rand(1, 999999);
                                echo "<textarea class='beheerContent $id' name='beheerContent'>" . $row['biosnaam'] . "</textarea>";
                                $id1 = rand(1, 999999);
                                echo "<textarea class='beheerContent $id1' name='beheerContent'>" . $row['omschrijving'] . "</textarea><br>";
                            }
                        }
                    } else {
                        foreach ($row as $key => $value) {
                            $id = rand(1, 999999);
                            $content .= "<textarea class='beheerContent $id' name='beheerContent'>" . $value . "</textarea>";
                        }
                    }
                    echo $content;
                } ?>
                <input type="submit">
            </form>
        </div>
    </div>
</div>