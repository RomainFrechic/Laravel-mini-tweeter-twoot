<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Twotter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="jumbotron col-12">
                <h1 class="display-3">Twotter</h1>
                <hr class="my-4">


                <a href="#">About</a>


            </div>
        </div>

        <form action="{{ url('/twoots') }}" method="POST" class="row">
            <input type="text" name="text" class="col-sm-12 col-md-8 form-control">
            <button type="submit" class="btn btn-primary col-sm-12 col-md-3 offset-md-1">Twoot !</button>
        </form>

        @foreach($twoots as $twoot)
            <div class="row card text-center mt-3">

                <div class="card-block">


                    <!-- Ici, on a accès à la variable $twoot ! -->
                    <h4 class="card-title">{{ $twoot->text }}</h4>


                    <form action="{{ url("/twoots/$twoot->id") }}" method="POST">
                        <button class="btn btn-danger">Supprimer</button>
                        {{ method_field('DELETE') }}
                    </form>
                </div>
                <div class="card-footer text-muted">
                   <h5>Poster il y a {{ $twoot->created_at->diffInMinutes()  }} min</h5>
                   <h5>{{ $twoot->created_at->diffForHumans()  }}</h5>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>