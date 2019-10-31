<script src="https://www.google.com/recaptcha/api.js?render=6LcPpbwUAAAAAPe9vDJ-aoNn47pGg0oeA2rEG5yp"></script>

<div class="hero">
    <img src="./assets/img/hero/download.jpeg" class="hero">

</div>

<div class="contact-section container">
    <div class="row">

        <div class="col-12 col-md-6">
            <div class="contact-text col-md-6 col-12">
            <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>


            <p id="contentData" style="display: block"><?php echo $row['content'] ?></p>
        <?php } ?>

            </div>
        </div>

        <div class="col-12 col-md-6 contact-form-container">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="InputName">Naam</label>
                    <input type="text" class="form-control" name="naam" id="InputName" placeholder="Uw Naam" required>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Uw Email" required>
                </div>
                <div class="form-group">
                    <label for="InputPhone">Telefoon</label>
                    <input type="text" class="form-control" name="telefoon" id="InputPhone" placeholder="Telefoon">
                </div>
                <div class="form-group">
                    <label for="InputSubject">Onderwerp</label>
                    <input type="text" class="form-control" name="onderwerp" id="InputSubject" placeholder="Onderwerp" required>
                </div>
                <div class="form-group">
                    <label for="FormControlTextarea">Bericht</label>
                    <textarea class="form-control" name="bericht" id="FormControlTextarea" rows="3" placeholder="Uw bericht"
                              required></textarea>
                </div>
                <button type="submit" name="contactsubmit" class="btn-custom btn-green">Verzend</button>
            </form>
        </div>

    </div>
</div>
