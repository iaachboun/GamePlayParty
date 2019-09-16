<div class="bioscopen-section">
    <div class="container">
        <div class="row">
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-12 biscoop-container">
                    <div class="bioscoop">
                        <h2><?php echo $row['biosnaam']; ?></h2>
                        <a href="?request=biosInfo&id=<?php echo $row['biosID'] ?>"><img class="biosImg"
                                                                                         src="assets/img/<?php echo $row['biosnaam']; ?>.jpg"></a>
                        <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is
                            de
                            zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
                        <a href="?request=biosInfo&id=<?php echo $row['biosID'] ?>"><button>Meer info</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>