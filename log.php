<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina de Logare</title>
  <link rel="icon" href="img/lock.png" />
  <link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>

  <div class="container">
    <h1>Autentificare</h1>
    <form action="login.php" method="POST">
      <label for="username">Nume utilizator:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Parolă:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Autentificare">
    </form>
    <p>Nu aveți un cont? <a href="signup.html">Creați un cont</a></p>
  </div>

</body>
</html>
