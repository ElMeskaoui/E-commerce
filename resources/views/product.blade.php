<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>

    <nav>
        <div class="nav-wrapper">

            <ul >
                <li>Hi! {{$user->name}}</li>
            </ul>

            <ul class="right">
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </div>
    </nav>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>