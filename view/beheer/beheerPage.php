<div class="beheer-section">
    <div class="container">
        <div class="row beheerNav-section">
            <div class="col-12 beheerNav">
                <a class="nav-link" href="?request=beheer&pagina=Home">Home</a>
                <a class="nav-link" href="?request=beheer&pagina=bioscopen">bioscopen</a>
                <a class="nav-link" href="?request=beheer&pagina=bioscopen">contact</a>
            </div>
        </div>
        <form action>
            <?php
            switch ($page) {
                case 'Home': ?>
                    <div class="home-section container">
                        <div class="row home-content">

                            <?php
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>

                                <div id="homeBeheerImg" class="col-12 col-md-6 home-content-image "></div>

                                <div class="col-12 col-md-6">
                                    <div id="homeBeheerContent" class="home-text">
                                    </div>
                                    <a href="?request=bioscopen"
                                       class="btn-custom btn-green btn-lg btn-block home-button-top-space">bekijk de
                                        bioscopen</a>
                                </div>
                                <p id="homeBeheerContent" style="display: block"><?php echo $row['content'] ?></p>

                            <?php } ?>
                        </div>
                    </div>
                    <?php break;
                case 'bioscopen':
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        $biosID = $row['biosID'];
                        $biosnaam = $row['biosnaam'];
                        $omschrijving = $row['omschrijving'];

                        if (strlen($omschrijving) > 150) {
                            $omschrijving = substr($omschrijving, 0, 150) . '...';
                        }

                        ?>
                        <div class="col-12 biscoop-container">
                            <div class="bioscoop">
                                <h2><?php echo $biosnaam; ?></h2>
                                <a href="?request=biosInfo&id=<?php echo $biosID; ?>"><img class="biosImg"
                                                                                           src="assets/img/<?php echo $biosnaam; ?>.jpg"></a>
                                <p><?php echo $omschrijving; ?></p>
                                <a href="?request=biosInfo&id=<?php echo $biosID; ?>" class="btn-custom btn-green">Meer
                                    info</a>
                                <!--                        <a href="?request=beschickbaar&id=-->
                                <?php //echo $biosID; ?><!--"><button class="btn-custom btn-green">Reseveer nu!</button></a>-->
                            </div>
                        </div>
                    <?php }
                    break;
            } ?>
        </form>
    </div>
</div>
<button id="saveBtn">Save Article</button>

