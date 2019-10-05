<div class="beschickbaar-section">
    <div class="container">
        <div class="row">
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="detailImg-section">
<!--                    <img class="detailImg" src="assets/img/--><?php //echo $row['biosnaam'] ?><!--.jpg">-->
                </div>
                <div class="info">
                    <p>In elke zaal passen is er genoeg plaats voor 30 mensen</p>
                    <p>Aantal zalen beschickbaar <?php echo $row['zalen']?></p>
                </div>
            <?php } ?>
        </div>
    </div></div>
