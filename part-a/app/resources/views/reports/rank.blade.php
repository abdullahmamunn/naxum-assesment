<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h1 class="heading text-center">Top 100 Distributor</h1>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">Top</th>
                                    <th scope="col">Distributor Name</th>
                                    <th scope="col">Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $temp = $top_distributor[0]->total_sale;
                                    $top = 1;
                                @endphp
                                {{-- {{$top_distributor[0]->total_sale}} --}}
                                @foreach ($top_distributor as $key=> $distributor)

                                    <tr>
                                        @if ($temp == $distributor->total_sale)
                                            @php
                                                $temp = $distributor->total_sale;
                                            @endphp
                                            <td>{{$top}}</td>
                                        @else
                                        <td>{{++$top}}</td>

                                            @php
                                                $temp = $distributor->total_sale;
                                            @endphp

                                        @endif
                                        <td>{{$distributor->first_name}} {{$distributor->last_name}}</td>
                                        <td>{{$distributor->total_sale}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               </div>
          </div>
        </div>

    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">

    </script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable({
                ordering: false,
            });
        } );
    </script>
</body>

</html>
