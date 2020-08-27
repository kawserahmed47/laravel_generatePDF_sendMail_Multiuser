@extends('master')
@section('title')
<title>USB|EDIT PROGRAM</title>
    
@endsection

@section('style')
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-header mt-5 " style="height: 50px;">
                <div>
                    <div class="float-left">Update Certification Programs</div>
                </div>
            </div>

        <form action="{{route('updateProgram',$result->id)}}" method="POST">
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
                    <td style="width:40% " ><input type="text" class="form-control" required name="name" value="{{$result->name}}" placeholder="Certification Programs"></td>
                        <td style="width:20% " ><input type="text" class="form-control" name="certification_fee" value="{{$result->certification_fee}}" placeholder="Certification Fee"></td>
                        <td style="width:20% " ><input type="text" class="form-control" name="mainunit_fee" value="{{$result->mainunit_fee}}" placeholder="Main Unit Reg Fee"></td>
                        <td style="width:20% " ><input type="text" class="form-control" name="subunit_fee" value="{{$result->subunit_fee}}" placeholder="Sub Unit Reg Fee"></td>
                        {{-- <td><input type="text" class="form-control" id="ex3" name="unit_name" placeholder="Unit Name"></td> --}} 
                    </tr>

                    
                </tbody>
                <tfoot>
                    <tr> 
                        <td colspan="4"><button class="btn btn-outline-success float-right" type="submit">UPDATE</button></td>     
                    </tr>
                </tfoot>
                
            </table>
        </form>
         
        </div>

    </div>


</div>
    
@endsection

@section('script')
    
@endsection