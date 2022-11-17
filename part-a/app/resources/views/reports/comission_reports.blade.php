<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="heading text-center">Transaction Report</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <form action="{{ route('sreach') }}" method="GET">
                            <label for="">Distributor</label>
                            <input type="text" name="name" autocomplete="on">
                            <br>
                            <br>
                            <div class="row">
                                <label for="">From Date</label>
                                <div class="col-md-3">
                                    <div class="input-group date" id="datepicker">
                                        <input type="text" name="from_date" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                To
                                <div class="col-md-3">
                                    <div class="input-group date" id="datepicker2">
                                        <input type="text" name="to_date" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                        <div class="float-right">
                            <h4>Total Comission: $22</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="dataTable">
                                <thead class="table-primary mt-2">
                                    <tr>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Purchaser</th>
                                        <th scope="col">Distributor</th>
                                        <th scope="col">Referred Distributors</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Order Total</th>
                                        <th scope="col">Parcentage</th>
                                        <th scope="col">Comission</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($query as $report)
                                        <tr>
                                            <td>{{ $report->invoice_number }}</td>
                                            <td>{{ $report->purchaser->full_name }}</td>
                                            <td>{{ optional(optional($report->purchaser->referrer)->category)->category_id == 1 ? $report->purchaser->referrer->full_name : '' }}
                                            </td>
                                            <td>{{ optional($report->purchaser->referrer)->customers_count ? $report->purchaser->referrer->customers_count : '' }}
                                            </td>
                                            <td>{{ $report->order_date }}</td>
                                            <td>incomplete</td>
                                            <td>incomplete</td>
                                            <td>incomplete</td>

                                            <td>
                                                <button type="button" class="btn btn-primary viewItem"
                                                    data-bs-toggle="modal" data-id={{ $report->id }}
                                                    data-bs-target="#exampleModal">
                                                    view
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{$top_distributor->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice: <span class="invoice"></span> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover" id="">
                        <thead class="table-primary mt-2">
                            <tr>
                                <th scope="col">SKU</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="product">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                ordering: false,
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });
        });
        $(function() {
            $('#datepicker2').datepicker({
                format: 'yyyy-mm-dd',
            });
        });
    </script>
    <script>
        $(document).on('click', '.viewItem', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: "{{ url('get-item') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    $('.invoice').html(data.data[0].invoice_number)
                    let html = '';
                    $.each(data, function(index, item) {
                        html += '<tr>';
                        html += '<td>' + item[0].items[0].product.sku + '</td>';
                        html += '<td>' + item[0].items[0].product.name + '</td>';
                        html += '<td>' + item[0].items[0].product.price + '</td>';
                        html += '<td>' + item[0].items[0].qantity + '</td>';
                        html += '<td>' + (item[0].items[0].qantity) * (item[0].items[0].product.price) + '</td>';
                        html += '</tr>';
                    });
                    $('#product').html(html);
                }
            });

        })
    </script>
</body>

</html>
