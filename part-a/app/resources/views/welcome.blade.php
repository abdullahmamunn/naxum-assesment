<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles -->
</head>

<body>
    <div class="container">
        <h1 class="heading text-center"></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome!</h1>
                    <p class="lead">This is a simple page, I put the <b>Rank</b> and <b>Comission</b> Report link here</p>
                    <hr class="my-4">
                    <a class="btn btn-primary btn-lg" href="{{route('rank.report')}}" role="button">Rank Report</a>
                    <a class="btn btn-primary btn-lg" href="{{route('comission.report')}}" role="button">Comission Report</a>
                  </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
