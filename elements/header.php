<html>

<head>
    <title>Lekker Chatten</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</head>

<body>

    <!-- Logo & Nav toggler -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php?">
            <img src="https://cdn.discordapp.com/attachments/428982026822221835/778065225512910898/logo.png" width=""
                height="20" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav items -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=contact">Contact</a>
                </li>
                <!-- Non-logged in users -->
                <?php if (!isset($_SESSION['user'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=login">Inloggen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=register">Registreren</a>
                </li>
                <?php } ?>

                <!-- Logged in users only -->
                <?php if (isset($_SESSION['user'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=userpage">Chatbox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?&logout=true">Uitloggen</a>
                </li>
                <?php } ?>

                <!-- Admin only -->
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=admin">Beheerderspaneel</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>