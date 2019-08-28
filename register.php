<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Music Player - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>

<body>
    <div id="inputContainer">

        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to Your account</h2>
            <p>
                <label for="loginUsername">Username:</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="Your username" required>
            </p>
            <p>
                <label for="loginPassword">Password:</label>
                <input id="loginPassword" name="loginPassword" type="password" required>
            </p>

        <button type="submit" name="loginButton">LOG IN</button>

        </form>

    </div>
</body>

</html>