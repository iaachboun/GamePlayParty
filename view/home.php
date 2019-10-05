<div class="hero">
    <img src="./assets/img/Kinepolis%20Jaarbeurs%20Utrecht.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Almere.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Den%20Helder.jpg" class="hero">
</div>
<div style="position: relative; top: -290px;" class="banner bannerHero">
    <div style="height: 100px; position: relative;" class="heroTitle">
        <div class="typewriter">
            <h1>Gaming parties organiseren</h1>
        </div>
    </div>
</div>

<div class="home-section container">
    <div class="row home-content">

        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="col-12 col-md-6 home-content-image">
                <img src="<?php echo $row['image'] ?>" class="img-responsive" style="max-width: 100%"
                     alt="Responsive image">
            </div>

            <div class="col-12 col-md-6">
                <div id="homeContent" class="home-text">
                </div>
                <a href="?request=bioscopen"
                   class="btn-custom btn-green btn-lg btn-block home-button-top-space">bekijk de
                    bioscopen</a>
            </div>
            <p id="contentData" style="display: block"><?php echo $row['content'] ?></p>
        <?php } ?>
    </div>
</div>

<script>
    var newData = JSON.parse($('#contentData').text());

    const homeContent = new EditorJS({
        holderId: 'homeContent',
        data: newData,

    });
</script>
