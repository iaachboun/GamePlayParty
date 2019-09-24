<div class="biosDetails-section">
    <div class="container">
        <div class="row">
			<?php
			while ( $row = $result->fetch( PDO::FETCH_ASSOC ) ) { ?>
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
			<?php
			while ( $row = $vrije_plaatsen->fetch( PDO::FETCH_ASSOC ) ) { ?>
                <div class="col-12 col-md-6">
                    <div class="vrijePlaatsen">
                        <table>
                            <tr>
                                <th><h3><?= $row['datum']; ?></h3></th>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>Tijd:</td>
                                <td><?= $row['begin_tijd']; ?> - <?= $row['eind_tijd']; ?></td>
                            </tr>
                            <tr>
                                <td>Plaatsen:</td>
                                <td><?= $row['aantal_plaatsen']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>
</div>