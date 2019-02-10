<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }
    </style>
</head>
<body>


@yield('content')

<footer class="container-fluid text-center">
    <p class="copyright">
        Copyright 2019 <a href="https://jquery.org/team/">Arish</a>.
        <span class="sponsor-line"><a href="https://www.digitalocean.com" class="do-link">LinkedIn</a> | <a href="https://www.stackpath.com" class="sp-link">Facebook</a></span>
    </p>
</footer>

</body>
</html>
