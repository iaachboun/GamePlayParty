<div class="bioscopen-section">
    <div class="container">
        <div class="row">
            <?php
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
                        <a href="?request=biosInfo&id=<?php echo $biosID; ?>"><button class="btn-custom btn-green">Meer info</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>