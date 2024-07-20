<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Fitness Tracker</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Fitness Inc</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/signup.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" href="../logout.php">Logout</a>
                </li>
                <div class="audio-player">
        <audio id="audio" controls>
            <source id="audio-source" src="../audio/1.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <div class="audio-controls">
            <button id="prev">Previous</button>
            <button id="next">Next</button>
        </div>
    </div>

            </ul>
        </div>
    </nav>
   

    <script src="../js/audioplayer.js"></script>
</body>
</html>
