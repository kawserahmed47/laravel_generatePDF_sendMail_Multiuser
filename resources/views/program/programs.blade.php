@extends('master')
@section('title')
<title>USB|ADD PROGRAM</title>
    
@endsection

@section('style')
    
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-header mt-5 " style="height: 50px;">
                <div>
                    <div class="float-left">Certification Programs</div>
                </div>
            </div>

        <form action="{{route('insertProgram')}}" method="POST">
        @csrf
       
            <table id="unittable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Certification Fee</th>
                        <th>Main Unit Fee</th>
                        <th>Sub Unit Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:40% " ><input type="text" class="form-control" required name="name" placeholder="Certification Programs"></td>
                        <td style="width:20% " ><input type="text" class="form-control" name="certification_fee" placeholder="Certification Fee"></td>
                        <td style="width:20% " ><input type="text" class="form-control" name="mainunit_fee" placeholder="Main Unit Reg Fee"></td>
                        <td style="width:20% " ><input type="text" class="form-control" name="subunit_fee" placeholder="Sub Unit Reg Fee"></td>
                    </tr>

                    
                </tbody>
                <tfoot>
                    <tr> 
                        <td colspan="4"><button class="btn btn-outline-success float-right" type="submit">SUBMIT</button></td>     
                    </tr>
                </tfoot>
                
            </table>
        </form>
         
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-header mt-5 " style="height: 50px;">
                <div>
                    <div class="float-left">Certification Programs List</div>
                </div>
            </div>

            @if (Session::get('message'))
            <p class="text-center text-success">{{Session::get('message')}}</p>
                
            @endif
            <table id="unittable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Certification Fee</th>
                        <th>Main Unit Fee</th>
                        <th>Sub Unit Fee</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($results!=NULL)
                        @foreach ($results as $key=>$result)
                        <tr>
                        <td style="width:5% "  >{{++$key}}</td>
                        <td style="width:25% " >{{$result->name}}</td>
                            <td style="width:15% " >{{$result->certification_fee}}</td>
                            <td style="width:15% " >{{$result->mainunit_fee}}</td>
                            <td style="width:15% " >{{$result->subunit_fee}}</td>
                            <td style="width:10% " >
                                @if ($result->status==1)
                            <a class="badge badge-success" href="{{route('changeStatus',$result->id)}}">Published</a>
                                @else
                                <a class="badge badge-warning" href="{{route('changeStatus',$result->id)}}">Unpublished</a>
                                @endif
                            
                            </td>
                            <td style="width:15% " >
                            <a class="badge badge-info" href="{{route('editProgram',$result->id)}}">EDIT</a>
                            <a class="badge badge-danger" href="{{route('deleteProgram',$result->id)}}">DELETE</a>
                            </td> 
                        </tr>
                            
                        @endforeach
                    
                    @else 

                    <tr>
                        <td colspan="7" class="text-center">Empty List</td>
                    </tr>
                        
                    @endif
                 

                    
                </tbody>
            </table>

        </div>

    </div>


</div>

    
@endsection

@section('script')
    
@endsection