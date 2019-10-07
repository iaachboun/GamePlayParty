<div class="card" style="width: 50%; margin: 0 auto; padding: 10px;">
    <img src="assets/img/logo.svg" class="card-img-top" alt="...">
    <div class="card-body">
<!--        <form action='?request=login' method='post'>-->
<!--            <label for="loginemail"/>-->
<!--            <input type="text" id="loginemail" name="email" placeholder="E-mail">-->
<!--            <label for="loginpassword"/>-->
<!--            <input type="password" id="loginpassword" name="wachtwoord" placeholder="Wachtwoord">-->
<!--            <button type="submit" name="login-submit" class="btn-custom btn-green">Login</button>-->
<!--        </form>-->
        <form action='?request=login' method='POST'>
            <div class="form-group">
                <label for="LoginEmail">Email addres</label>
                <input type="text" class="form-control" id="LoginEmail" name="email" aria-describedby="emailHelp"
                       placeholder="email">
<!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone-->
<!--                    else.</small>-->
            </div>
            <div class="form-group">
                <label for="LoginPassword">Wachtwoord</label>
                <input type="password" class="form-control" id="LoginPassword" name="wachtwoord" placeholder="Password">
            </div>
            <button type="submit" name="login-submit" class="btn-custom btn-green">Login</button>
        </form>
    </div>
</div>