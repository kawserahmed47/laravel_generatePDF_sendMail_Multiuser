
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>USB|VIEW APPLICATION</title>
</head>
<body style="background-color: #59bdb75c">
    <nav class="navbar navbar-light bg-success">
        <a class="navbar-brand text-light" href="{{route('index')}}">
          <img src="{{asset('image/logo.png')}}" width="30" height="30" class="d-inline-block align-top " alt="">
          USB ASIA LTD.
        </a>
    <a  style="text-decoration: none;" class="text-light" href="{{route('index')}}">Application</a>
    {{-- <a href="{{route('viewApplication')}}">Admin</a> --}}
    <a  style="text-decoration: none;" class="text-light" href="{{route('adminLogout')}}">Logout</a>
    
    </nav>

<div class="container">
    <div class="row">
        <div class="col mt-5 ">

            <div class="card">
                <div class="card-header">
                    All Applications
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            @if (!empty($results))
                            
                                @foreach ($results as $key=>$result)
                              
                            <tr>
                            <td>{{++$key}}</td>
                            <td>{{$result->name}}</td>
                                <td>{{$result->addresss}}</td>
                                <td>{{$result->mobile}}</td>
                                <td>{{$result->created_at}}</td>
                                <td> 
                                    
                                    <a class="badge badge-info" href="{{URL::to('/viewInvoice',$result->id)}}" target="_balnk">View Invoice</a>
                                    <a class="badge badge-success" href="{{URL::to('/printInvoice',$result->id)}}"  target="_balnk">Print Invoice</a>
                                    {{-- <a class="badge badge-primary" href="{{URL::to('/genrateExcel')}}" >Excel File</a> --}}

                                </td>
                            </tr>
                                  
                                @endforeach
                            @else
                       
                            {{-- <tr>
                                <td colspan="5" style="text-align: center"> No Data Found!!! </td>
                            </tr> --}}
                                   
                            @endif
                        </tbody>


                    </table>


                </div>
            </div>
        </div>
    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
