<div class="hero">
    <img src="./assets/img/Kinepolis%20Jaarbeurs%20Utrecht.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Almere.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Den%20Helder.jpg" class="hero">
</div>
<div style="position: absolute; left: 50%; top: 300px;" class="banner">
    <div style="position: relative; left: -50%;" class="typed_wrap">
        <h1 class="heroTitle"><span class="typed" id="typed"></span></h1>
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
                <div class="home-text">
                    <h2>Title</h2>
                    <p>
                        <?php echo $row['content'] ?>
                    </p>
                </div>
                <a href="?request=bioscopen" class="btn-custom btn-green btn-lg btn-block home-button-top-space">Check
                    de bioscopen</a>
            </div>
        <?php } ?>
    </div>
</div>
