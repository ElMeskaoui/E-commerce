<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

    <nav>
        <div class="nav-wrapper">

            <ul >
                <li><a href="{{ route('register')}}">Sing up</a></li>
            </ul>

            <ul class="right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <form class="card-panel" method="POST" action="{{route('login')}}">
            @csrf

                <div class="row">
                    <div class="input-field col s12 section">
                        <input name="email" placeholder="Email" id="email" type="text" class="validate">
                        <label for="email">Email</label>
                    </div>
                
                    <div class="divider"></div>
                    <div class="input-field col s12 section left">
                        <input name="password" placeholder="Password" id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn">Log in</button>
                </div>
    
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>