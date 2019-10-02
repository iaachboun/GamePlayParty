<div class="card" style="width: 50%; margin: 0 auto; padding: 10px;">
  <img src="assets/img/logo.svg" class="card-img-top" alt="...">
  <div class="card-body">
  <form action='?request=login' method='post'>
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="wachtwoord" placeholder="Wachtwoord">
        <button type="submit" name="login-submit">Login</button>
    </form>
    <form action='logout.inc.php' method='post'>
        <button type="submit" name="logout-submit">Logout</button>
    </form>
    <p>Youre logged out</p>
    <p>youre logged in</p>
  </div>
</div>