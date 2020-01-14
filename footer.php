<!-- Footer -->
<footer class="page-footer font-small">

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">Gameplay Party</h6>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <?php

            $servername = "localhost";
            $username = "ilias";
            $password = "12345";
            $dbname = "GamePlayParty";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM contentmanagement WHERE pagina = 'footerContent';";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<p id='contentData'>". $row['content']."</p>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();

    ?>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Navigatie</h6>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="index.php">Home</a>
                </p>
                <p>
                    <a href="?request=bioscopen">Bioscopen</a>
                </p>
                <p>
                    <a href="?request=contact">Contact</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Handige links</h6>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="?request=cookie-beleid">Cookie beleid</a>
                </p>
                <p>
                    <a href="?request=annulering-beleid">Annulering</a>
                </p>
                <p>
                    <a href="?request=algemene-voorwaarden">Privacy</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-envelope mr-3"></i> info@gameplayparty.com</p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="#"> Gameplayparty.nl</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<!--scripts for bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="assets/js/slick.min.js"></script>
<script type="text/javascript" src="assets/js/hero.js"></script>
<script type="text/javascript" src="assets/js/typed/typed.js"></script>
<script type="text/javascript" src="assets/js/wysiwyg.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

<!--<script>-->
<!--    import Typed from "assets/js/typed/typed";-->
<!---->
<!--    var typed = new Typed('#typed', {-->
<!--        strings: ["First sentence.", "Second sentence."],-->
<!--        typeSpeed: 30-->
<!--    });-->
<!--</script>-->


</body>
</html>
