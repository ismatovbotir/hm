<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">HM report</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form action="/report" class="d-flex" role="search" method="GET">




                        <select class="form-select" aria-label="Default select example" name="shop">
                            <option value="0" {{$shopId ==0 ? 'selected':''}}>All</option>
                            @forelse ($shops as $shop)
                            <option value="{{$shop->id}}" {{ $shopId ==$shop->id?'selected':''}}>{{$shop->name}}</option>
                            @empty
                           
                            @endforelse
                           
                          
                        </select>






                        <input class="form-control me-2" type="date" value="{{$repDate}}" name="repDate" />
                        <button class="btn btn-outline-success" type="submit">Report</button>
                        
                    </form>
                </div>
            </div>
        </nav>

        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                     
                        <th scope="col">Mark</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">ShortName</th>
                        <th scope="col">Partner</th>
                        <th scope="col">Status</th>
                        <th scope="col">Stock_Qty</th>
                        <th scope="col">Stock_Total</th>
                        <th scope="col">Sell_Qty</th>
                        <th scope="col">Sell_Total</th>
                        <th scope="col">Sell_Cost</th>
                        <th scope="col">Discount</th>

                    </tr>
                </thead>
                <tbody>
                   
                    @forelse ($data as $row)
                    <tr>
                      
                        <td>{{$row->mark}}</td>
                        <td>{{$row->category?$row->category->name:''}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->shoerName}}</td>
                        <td>{{$row->partner?$row->partner->name:''}}</td>
                        <td>{{$row->status==0?'Blocked':'Active'}}</td>
                        <td>{{$row->stock_qty}}</td>
                        <td>{{$row->stock_total}}</td>
                        <td>{{$row->sell_qty}}</td>
                        <td>{{$row->sell_total}}</td>
                        <td>{{$row->sell_cost}}</td>
                        <td>{{$row->stock_discount}}</td>

                    </tr>
                            @empty
                           
                            @endforelse
                </tbody>
            </table>
            @if(count($data)>0)
            {{$data->links()}}
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>