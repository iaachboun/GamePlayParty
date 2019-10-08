
<div class="hero">
    <img src="./assets/img/Kinepolis%20Jaarbeurs%20Utrecht.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Almere.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Den%20Helder.jpg" class="hero">

</div>

<a href="#contentData" class='pijl'>
    <i class="fas fa-arrow-circle-down"></i>
</a>
<div style="position: relative; top: -290px;" class="banner bannerHero">
    <div style="height: 100px; position: relative;" class="heroTitle">
        <div class="typewriter">
            <h1 id="typewritten">Gaming parties organiseren</h1>
        </div>
    </div>
</div>

<div class="home-section container">
    <div class="row home-content">

        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="col-12 col-md-12">
                <div id="homeContent" class="home-text">
                <p id="contentData" style="display: block"><?php echo $row['content'] ?></p>
                </div>
                <a href="?request=bioscopen"
                   class="btn-custom btn-green btn-lg btn-block home-button-top-space">bekijk de
                    bioscopen</a>
            
            </div>

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

