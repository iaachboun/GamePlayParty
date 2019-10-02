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
            <form method="post">
                <!--                            --><?php
                //                            $done = false;
                //                            $content = "";
                //                            $allIDS = [];
                //                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                //                                if ($page == 'bioscopen') {
                //                                    array_push($allIDS, $row['biosID']);
                //                                    foreach ($row as $key => $value) {
                //                                        if (in_array($value, $allIDS)) {
                //                                            $id = rand(1, 999999);
                //                                            echo "<textarea class='beheerContent $id' name='beheerContent'>" . $row['biosnaam'] . "</textarea>";
                //                                            $id1 = rand(1, 999999);
                //                                            echo "<textarea class='beheerContent $id1' name='beheerContent'>" . $row['omschrijving'] . "</textarea><br>";
                //                                        }
                //                                    }
                //                                } else {
                //                                    foreach ($row as $key => $value) {
                //                                        $id = rand(1, 999999);
                //                                        $content .= "<textarea class='beheerContent $id' name='beheerContent'>" . $value . "</textarea>";
                //                                    }
                //                                }
                //                                echo $content;
                //                            } ?>
                <!--                            <input type="submit">-->
            </form>
        </div>
        <?php var_dump($page);
        switch ($page) {
            case 'Home': ?>
                <div class="home-section container">
                    <div class="row home-content">

                        <?php
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>

                            <div id="homeBeheerImg" class="col-12 col-md-6 home-content-image ">
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="homeBeheerContent" class="home-text">
                                </div>
                                <a href="?request=bioscopen"
                                   class="btn-custom btn-green btn-lg btn-block home-button-top-space">bekijk de
                                    bioscopen</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php break;
            case 'bioscopen':
                var_dump($allCinemas);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $biosID = $row['biosID'];
                $biosnaam = $row['biosnaam'];
                $omschrijving = $row['omschrijving'];

                if(strlen($omschrijving)>150){
                    $omschrijving=substr($omschrijving,0,150).'...';
                }

                ?>
        <div class="col-12 biscoop-container">
            <div class="bioscoop">
                <h2><?php echo $biosnaam; ?></h2>
                <a href="?request=biosInfo&id=<?php echo $biosID; ?>"><img class="biosImg"
                                                                           src="assets/img/<?php echo $biosnaam; ?>.jpg"></a>
                <p><?php echo $omschrijving; ?></p>
                <a href="?request=biosInfo&id=<?php echo $biosID; ?>" class="btn-custom btn-green">Meer info</a>
                <!--                        <a href="?request=beschickbaar&id=--><?php //echo $biosID; ?><!--"><button class="btn-custom btn-green">Reseveer nu!</button></a>-->
            </div>
        </div>
        <?php } break;} ?>

    </div>
</div>
<button id="saveBtn">Save Article</button>
