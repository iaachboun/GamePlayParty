<div class="bioscopen-section">
    <div class="container">
        <div class="row">
            <div class="slick-bios">
                <?php
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-12 biscoop-container">
                        <div class="bioscoop">
                            <h2><?php echo $row['biosnaam']; ?></h2>
                            <img class="biosImg" src="assets/img/<?php echo $row['biosnaam']; ?>.jpg">
                            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is
                                de
                                zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>