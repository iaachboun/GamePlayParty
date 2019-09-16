<div class="biosDetails-section">
    <div class="container">
        <div class="row">
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-12 col-md-6 detailImg-section">
                    <img class="detailImg" src="assets/img/<?php echo $row['biosnaam'] ?>.jpg">
                </div>
                <div class="col-12 col-md-6">
                    <div class="detailContent">
                        <h3><?php echo $row['biosnaam'] ?></h3>
                        <p>
                            <?= $row['omschrijving']; ?>
                        </p>
                        <p>
                            <?php echo $row['biosadres'] ?><br>
                            <?php echo $row['biospostcode'] ?>
                            <?php echo $row['biosplaats'] ?><br>
                            <?php echo $row['biosprovincie'] ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>