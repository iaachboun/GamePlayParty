<div class="hero">
    <img src="./assets/img/Kinepolis%20Jaarbeurs%20Utrecht.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Almere.jpg" class="hero">
    <img src="./assets/img/Kinepolis%20Den%20Helder.jpg" class="hero">
</div>
<div style="position: relative; top: -290px;" class="banner bannerHero">
    <div style="height: 100px; position: relative;" class="heroTitle">
        <div class="typewriter">
            <h1 class="typing">Gaming parties organiseren</h1>
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
                <div class="home-text">
                    <h2>Title</h2>
                    <p>
                        <?php echo nl2br($row['content']) ?>
                    </p>
                </div>
                <a href="?request=bioscopen" class="btn-custom btn-green btn-lg btn-block home-button-top-space">Bekijk de bioscopen</a>
            </div>
            <p>Dingen die je moet weten</p>
            <p>Er is geen minimum voor groepen, maar het wordt aanbevolen dat de groepsgrootte tussen de 8 en 12 personen is. Dit zal de speeltijd voor elke speler maximaliseren.
                Voel je vrij om je eigen Xbox-spel mee te nemen om te spelen (persoonlijke spelconsoles of spellen voor andere spelconsoles zijn niet toegestaan).
                Er is geen leeftijdsgrens voor videospelletjes op Xbox, maar de ouders moeten wel zelf kunnen beslissen over de spelbeoordeling van oudere gamers (d.w.z., titels met een 'M'-rating).
                Feesten kunnen maximaal 6 weken voor de datum van uw voorkeur worden aangevraagd en zijn niet gegarandeerd tot de datum is bevestigd en geboekt door het theater.
                Voor elke partij kan een aanbetaling van $50 worden gevraagd en kan op elk moment voor de partij aan de kassa worden betaald. De boeking kan pas worden gereserveerd na ontvangst van de aanbetaling.
                Annuleringen met een opzegtermijn van minder dan 24 uur kunnen leiden tot een niet-terugvorderbare aanbetaling.
                Buiten eten en drinken is niet toegestaan in de theatercomplexen, maar als u een verjaardag viert, kunt u uw eigen verjaardagstaart meenemen! Wij zorgen voor de borden, servetten en bestek.
                Feesten kunnen op elk moment buiten de openingsuren geboekt worden. Een voorbeeldboeking is zaterdag 10.00 - 12.00 uur of eender welke nacht na 22.30 uur, in afwachting van beschikbaarheid in bepaalde theaters en kan rechtstreeks bij het theater worden bevestigd.
                Cadeaubonnen, alle belangrijke creditcards en debetkaarten worden geaccepteerd als betaalmiddel.
                Het is mogelijk dat er op sommige locaties doordeweeks geen partyboekingen beschikbaar zijn.</p>
        <?php } ?>
    </div>
</div>
