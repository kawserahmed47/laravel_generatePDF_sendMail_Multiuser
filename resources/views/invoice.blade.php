@extends('master')
@section('title')
<title>USB|Invoice</title>
@endsection

@section('style')
<style>
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
@endsection
@section('content')
<nav class="navbar navbar-light bg-success text-light" >
    <a class="navbar-brand text-light" href="{{route('index')}}">
      <img src="{{asset('image/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
      USB ASIA LTD.
    </a>
    {{-- <a style="text-decoration: none;" class="text-light" href="">Application</a>
    <a style="text-decoration: none;" class="text-light" href="{{route('viewApplication')}}">View Application</a> --}}
</nav>
        

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h2 class="text-center p-3">USB Asia Invoice Form</h2>
            @if(Session::get('success'))
        <p class="text-danger">{{Session::get('success')}}</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col m-3 ">
            <div class="card">

                <div class="card-header">
                    Application 
                </div>

                <div class="card-body">
                <form action="{{route('insertInvoice')}}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Company Name and Legal
                                Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputPassword"
                                       placeholder="Enter Company Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="addresss" class="form-control" id="inputPassword" placeholder="Enter Address">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="city" id="">
                                    <option value="0">Select City</option>
                                    <option value="0">Dhaka</option>
                                    <option value="100">Comilla</option>
                                    <option value="150">Chittagong</option>
                                    <option value="200">Khulna</option>
                                    <option value="150">Barisal</option>
                                    <option value="200">Rangpur</option>
                                    <option value="150">Sylhet</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_person" class="form-control" id="inputPassword" placeholder="Enter Contact Person Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="tex" name="mobile" class="form-control" id="inputPassword" placeholder="Enter Mobile Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="tex" name="email" class="form-control" id="inputPassword" placeholder="Enter E-mail Address">
                            </div>
                        </div>

                  
                        <div class="card-header mt-5">
                            CERTIFICATION PROGRAMS
                        </div>

                        <table class="table table-bordered">           
                            <tbody>
                                <tr>
                                    <td style="width: 20%; text-align:center">
                                        <input type="checkbox" id="gots" name="programs[]" value="GOTS">
                                    </td>
                                    <td style="width: 60%">
                                        Global Organic Textile Standard (GOTS)
                                    </td>
                                    <td style="width: 20%">
                                        <div id="gots_price">
                                            <input type="text"  name="certificate_fees[]" class="form-control" value="1250">
                                        </div>
                                       
                                        <script>
                                           $(document).ready(function(){
                                            $('#gots_price').hide();
                                            $('#gots').change(function(){
                                                if(this.checked)
                                                    $('#gots_price').show();
                                                else
                                                   $('#gots_price').hide();
    
                                            });

                                        });
                                       </script>
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td style="width: 20%; text-align:center">
                                        <input id="ocs" type="checkbox" name="programs[]" value="OCS">
                                    </td>
                                    <td style="width: 60%">
                                        Organic Content Standard (OCS)
                                    </td>
                                    <td style="width: 20%">
                                        <input type="text" name="certificate_fees[]" class="form-control" id="ocs_price" value="1150">
                                    </td>
                                    <script>
                                     
                                            $('#ocs_price').hide();
                                            $('#ocs').change(function(){
                                            if(this.checked)
                                                $('#ocs_price').show();
                                            else
                                               $('#ocs_price').hide(500);

                                        });

                                      
                                      
                                   </script>
                                </tr>

                                 <tr>
                                    <td style="width: 20%; text-align:center">
                                        <input type="checkbox" id="rcs" name="programs[]" value="RCS">
                                    </td>
                                    <td style="width: 60%">
                                        TE Recycled Claim Standard (RCS)
                                    </td>
                                    <td style="width: 20%">
                                        <input type="text" id="rcs_price" name="certificate_fees[]" class="form-control" value="1150">
                                    </td>
                                    <script>
                                    
                                  
                                        $('#rcs_price').hide();
                                        $('#rcs').change(function(){
                                            if(this.checked)
                                                $('#rcs_price').show(500);
                                            else
                                               $('#rcs_price').hide(500);

                                        });
                                    
                                   </script>
                                </tr>

                                 <tr>
                                    <td style="width: 20%; text-align:center">
                                        <input id="grs" type="checkbox" name="programs[]" value="GRS">
                                    </td>
                                    <td style="width: 60%">
                                        Global Recycled Standard (GRS)
                                    </td>
                                    <td style="width: 20%">
                                        <div id="grs_price">
                                            <input type="text" name="certificate_fees[]" class="form-control"  value="1250">
                                        </div>
                                    </td>
                                    <script>
                                            $("#grs_price").hide();
                                            console.log('GRS PRice ID');
                                            $('#grs').change(function(){
                                             if(this.checked)
                                                 $('#grs_price').show(500);
                                             else
                                                $('#grs_price').hide(500);
                                         }); 
                                    </script>
                                </tr>
                            </tbody>
                        </table>


                        <div class="card-header mt-5 " style="height: 50px;">
                            <div>
                                <div class="float-left">Unit Registrant</div>
                            </div>
                        </div>


                        <table id="unittable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center">Standard</th>
                                    <th>Unit Category</th>
                                    <th>No. of Unit</th>
                                    <th>Reg. Fee</th>
                                    <th>Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <select class="form-control" id="standard0"  name="standards[]" required>
                                           <option>Select</option>
                                            <option value="GOTS">GOTS</option>
                                            <option value="OCS">OCS</option>
                                            <option value="RCS">RCS</option>
                                            <option value="GRS">GRS</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                         <select class="form-control" id="category0" name="unit_categories[]" required>
                                            <option>Select</option>
                                            <option value="Main">Main</option>
                                            <option value="Sub">Sub</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="form-control" required name="num_subunits[]" id="unit0">
                                            <option value="0">Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        {{-- <input type="number" class="form-control" id="unit0" name="num_subunits[]" required> --}}
                                    </td>
                                    <td class="text-center"><input class="form-control" type="text" class="form-control" required  id="reg_fee0" name="reg_fees[]" value="" ></td>
                                    <td class="text-center">
                                        <p id="cost0">0</p>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>


                        
                        <div class="float-left mt-2 mr-2">
                            <a class="btn btn-outline-warning add-row">Add More</a>
                        </div>
                        <div class="float-left mt-2" id="hide_div">
                            <a type="button" class="delete-row btn btn-outline-danger">Delete Selected Row</a>
                        </div>
                            <div class="float-right mt-2">
                                <button type="submit" class="btn btn-outline-success">Submit</button>
                            </div>
                        
                    </form>
                    
                </div>
               
            </div>
          
        </div>
      
    </div>
   
</div>

@endsection

@section('script')

<script>
    $(document).ready(function(){
        $('#hide_div').hide();
            var a=1;
            
        $(".add-row").click(function(){
            $('#hide_div').show()
            var markup = "<tr><td class='text-center'> <input  type='checkbox' name='record'> </td><td><select  class='form-control' id='standard"+a+"' name='standards[]'><option>Select</option><option value='GOTS'>GOTS</option><option value='OCS'>OCS</option><option value='RCS'>RCS</option><option value='GRS'>GRS</option></select> </td><td> <select name='unit_categories[]' id='category"+a+"'  required class='form-control'><option>Select</option><option value='Main'>Main</option><option value='Sub'>Sub</option></select> </td><td> <select class='form-control' id='unit"+a+"' name='num_subunits[]'><option value='0'>Select</option> <option value='1'>1</option> <option value='2'>2</option><option value='3'>3</option><option value='4'>4</option> <option value='5'>5</option> </select> </td><td> <input type='text' id='reg_fee"+a+"' name='reg_fees[]'  required class='form-control'> </td> <td class='text-center'> <p id='cost"+a+"'>0</p></td> </tr>";
            $("#unittable tbody").append(markup);
            a++;


               //For Second Row

        var reg_fee1 = 0;
        var sub_unit1 = 0;
        var selectedStandard1 ="";
        var selectedcategory1 ="";
       
        $("select#standard1").change(function(){
        selectedStandard1= $(this).children("option:selected").val();
         myFunction1();
         unitCalculate1();
        });

        $("select#category1").change(function(){
            selectedcategory1= $(this).children("option:selected").val();
            console.log(selectedcategory1);
            myFunction1();
            unitCalculate1();
            });

            $("select#unit1").change(function(){
                sub_unit1= $(this).children("option:selected").val();
                console.log(sub_unit1);
                unitCalculate1();
            });

            function myFunction1(){
                if(selectedStandard1=="GOTS" && selectedcategory1=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee1").val("190");
                    reg_fee1 =$("#reg_fee1").val();
                    console.log(reg_fee1);
                }else if(selectedStandard1=="GOTS" && selectedcategory1=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee1").val("190");
                    reg_fee1 =$("#reg_fee1").val();
                    console.log(reg_fee1);
                }else if(selectedStandard1=="OCS" && selectedcategory1=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee1").val(202.5);
                    reg_fee1 =$("#reg_fee1").val();
                    console.log(reg_fee1);
                }else if(selectedStandard1=="OCS" && selectedcategory1=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee1").val(180);
                    reg_fee1 =180;
                    console.log(reg_fee1);
                }else if(selectedStandard1=="RCS" && selectedcategory1=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee1").val(225);
                    reg_fee0 =225;
                    console.log(reg_fee1);
                }else if(selectedStandard1=="RCS" && selectedcategory1=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee1").val(202.5);
                    reg_fee1 =202.5;
                    console.log(reg_fee1);
                }else if(selectedStandard1=="GRS" && selectedcategory1=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee1").val(315);
                    reg_fee1 =315;
                    console.log(reg_fee1);
                }else if(selectedStandard1=="GRS" && selectedcategory1=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee1").val(247.5);
                    reg_fee1 =247.5;
                    console.log(reg_fee1);
                }else{
                    console.log("0");
                    $("#reg_fee1").val(0);
                }
               
            }

            function unitCalculate1(){
                var reg1 = $("#reg_fee1").val();
                var subtotal1=  sub_unit1*reg1 ;
                $("#cost1").html(subtotal1);
                console.log(subtotal1);
            }

           
                $("input#reg_fee1").keydown(function(){
                    var reg1 = $("#reg_fee1").val();
                var subtotal1=  sub_unit1*reg1 ;
                $("#cost1").html(subtotal1);
                console.log(subtotal1);
                    });

                    
                    // for 3 no row

        var reg_fee2 = 0;
        var sub_unit2 = 0;
        var selectedStandard2 ="";
        var selectedcategory2 ="";
       
        $("select#standard2").change(function(){
        selectedStandard2= $(this).children("option:selected").val();
         myFunction2();
         unitCalculate2();
        });

        $("select#category2").change(function(){
            selectedcategory2= $(this).children("option:selected").val();
            console.log(selectedcategory2);
            myFunction2();
            unitCalculate2();
            });

            $("select#unit2").change(function(){
                sub_unit2= $(this).children("option:selected").val();
                console.log(sub_unit2);
                unitCalculate2();
            });

            function myFunction2(){
                if(selectedStandard2=="GOTS" && selectedcategory2=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee2").val("190");
                    reg_fee2 =$("#reg_fee2").val();
                    console.log(reg_fee2);
                }else if(selectedStandard2=="GOTS" && selectedcategory2=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee2").val("190");
                    reg_fee2 =$("#reg_fee2").val();
                    console.log(reg_fee2);
                }else if(selectedStandard2=="OCS" && selectedcategory2=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee2").val(202.5);
                    reg_fee0 =$("#reg_fee2").val();
                    console.log(reg_fee2);
                }else if(selectedStandard2=="OCS" && selectedcategory2=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee2").val(180);
                    reg_fee2 =180;
                    console.log(reg_fee2);
                }else if(selectedStandard2=="RCS" && selectedcategory2=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee2").val(225);
                    reg_fee2 =225;
                    console.log(reg_fee2);
                }else if(selectedStandard2=="RCS" && selectedcategory2=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee2").val(202.5);
                    reg_fee2 =202.5;
                    console.log(reg_fee2);
                }else if(selectedStandard2=="GRS" && selectedcategory2=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee2").val(315);
                    reg_fee2 =315;
                    console.log(reg_fee2);
                }else if(selectedStandard2=="GRS" && selectedcategory2=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee2").val(247.5);
                    reg_fee2 =247.5;
                    console.log(reg_fee2);
                }else{
                    console.log("0");
                    $("#reg_fee2").val(0);
                }
               
            }

            function unitCalculate2(){
                var reg2 = $("#reg_fee2").val();
                var subtotal2=  sub_unit2*reg2 ;
                $("#cost2").html(subtotal2);
                console.log(subtotal2);
            }

           
                $("input#reg_fee2").keydown(function(){
                    var reg2 = $("#reg_fee2").val();
                    var subtotal2=  sub_unit2*reg2 ;
                    $("#cost2").html(subtotal2);
                    console.log(subtotal2);
                    });

                    // for 4 no row
        var reg_fee3 = 0;
        var sub_unit3 = 0;
        var selectedStandard3 ="";
        var selectedcategory3 ="";
       
        $("select#standard3").change(function(){
        selectedStandard3= $(this).children("option:selected").val();
         myFunction3();
         unitCalculate3();
        });

        $("select#category3").change(function(){
            selectedcategory3= $(this).children("option:selected").val();
            console.log(selectedcategory3);
            myFunction3();
            unitCalculate3();
            });

            $("select#unit3").change(function(){
                sub_unit3= $(this).children("option:selected").val();
                console.log(sub_unit3);
                unitCalculate3();
            });

            function myFunction3(){
                if(selectedStandard3=="GOTS" && selectedcategory3=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee3").val("190");
                    reg_fee3 =$("#reg_fee3").val();
                    console.log(reg_fee3);
                }else if(selectedStandard3=="GOTS" && selectedcategory3=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee3").val("190");
                    reg_fee3 =$("#reg_fee3").val();
                    console.log(reg_fee3);
                }else if(selectedStandard3=="OCS" && selectedcategory3=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee3").val(202.5);
                    reg_fee3 =$("#reg_fee3").val();
                    console.log(reg_fee3);
                }else if(selectedStandard3=="OCS" && selectedcategory3=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee3").val(180);
                    reg_fee3 =180;
                    console.log(reg_fee3);
                }else if(selectedStandard3=="RCS" && selectedcategory3=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee3").val(225);
                    reg_fee3 =225;
                    console.log(reg_fee3);
                }else if(selectedStandard3=="RCS" && selectedcategory3=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee3").val(202.5);
                    reg_fee3 =202.5;
                    console.log(reg_fee3);
                }else if(selectedStandard3=="GRS" && selectedcategory3=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee3").val(315);
                    reg_fee3 =315;
                    console.log(reg_fee3);
                }else if(selectedStandard3=="GRS" && selectedcategory3=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee3").val(247.5);
                    reg_fee3 =247.5;
                    console.log(reg_fee3);
                }else{
                    console.log("0");
                    $("#reg_fee3").val(0);
                }
               
            }

            function unitCalculate3(){
                var reg3 = $("#reg_fee3").val();
                var subtotal3=  sub_unit3*reg3 ;
                $("#cost3").html(subtotal3);
                console.log(subtotal3);
            }

           
                $("input#reg_fee3").keydown(function(){
                var reg3 = $("#reg_fee3").val();
                var subtotal3=  sub_unit3*reg3 ;
                $("#cost3").html(subtotal3);
                console.log(subtotal3);
                    });

                    // for  5 no row

        var reg_fee4 = 0;
        var sub_unit4 = 0;
        var selectedStandard4 ="";
        var selectedcategory4 ="";
       
        $("select#standard4").change(function(){
        selectedStandard4= $(this).children("option:selected").val();
         myFunction4();
         unitCalculate4();
        });

        $("select#category4").change(function(){
            selectedcategory4= $(this).children("option:selected").val();
            console.log(selectedcategory4);
            myFunction4();
            unitCalculate4();
            });

            $("select#unit4").change(function(){
                sub_unit4= $(this).children("option:selected").val();
                console.log(sub_unit4);
                unitCalculate4();
            });

            function myFunction4(){
                if(selectedStandard4=="GOTS" && selectedcategory4=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee4").val("190");
                    reg_fee4 =$("#reg_fee4").val();
                    console.log(reg_fee4);
                }else if(selectedStandard4=="GOTS" && selectedcategory4=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee4").val("190");
                   reg_fee4 =$("#reg_fee4").val();
                    console.log(reg_fee4);
                }else if(selectedStandard4=="OCS" && selectedcategory4=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee4").val(202.5);
                    reg_fee4 =$("#reg_fee4").val();
                    console.log(reg_fee4);
                }else if(selectedStandard4=="OCS" && selectedcategory4=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee4").val(180);
                    reg_fee4 =180;
                    console.log(reg_fee4);
                }else if(selectedStandard4=="RCS" && selectedcategory4=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee4").val(225);
                    reg_fee4 =225;
                    console.log(reg_fee4);
                }else if(selectedStandard4=="RCS" && selectedcategory4=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee4").val(202.5);
                    reg_fee4 =202.5;
                    console.log(reg_fee4);
                }else if(selectedStandard4=="GRS" && selectedcategory4=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee4").val(315);
                    reg_fee4 =315;
                    console.log(reg_fee4);
                }else if(selectedStandard4=="GRS" && selectedcategory4=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee4").val(247.5);
                    reg_fee4 =247.5;
                    console.log(reg_fee4);
                }else{
                    console.log("0");
                    $("#reg_fee4").val(0);
                }
               
            }

            function unitCalculate4(){
                var reg4 = $("#reg_fee4").val();
                var subtotal4=  sub_unit4*reg4 ;
                $("#cost4").html(subtotal4);
                console.log(subtotal4);
            }

           
                $("input#reg_fee4").keydown(function(){
                    var reg4 = $("#reg_fee4").val();
                var subtotal4=  sub_unit4*reg4 ;
                $("#cost4").html(subtotal4);
                console.log(subtotal4);
                    });

                    // for 6 no row
        var reg_fee5 = 0;
        var sub_unit5 = 0;
        var selectedStandard5 ="";
        var selectedcategory5 ="";
       
        $("select#standard5").change(function(){
        selectedStandard5= $(this).children("option:selected").val();
         myFunction5();
         unitCalculate5();
        });

        $("select#category5").change(function(){
            selectedcategory5= $(this).children("option:selected").val();
            console.log(selectedcategory5);
            myFunction5();
            unitCalculate5();
            });

            $("select#unit5").change(function(){
                sub_unit5= $(this).children("option:selected").val();
                console.log(sub_unit5);
                unitCalculate5();
            });

            function myFunction5(){
                if(selectedStandard5=="GOTS" && selectedcategory5=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee5").val("190");
                    reg_fee5 =$("#reg_fee5").val();
                    console.log(reg_fee5);
                }else if(selectedStandard5=="GOTS" && selectedcategory5=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee5").val("190");
                   reg_fee5 =$("#reg_fee5").val();
                    console.log(reg_fee5);
                }else if(selectedStandard5=="OCS" && selectedcategory5=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee5").val(202.5);
                    reg_fee5 =$("#reg_fee5").val();
                    console.log(reg_fee5);
                }else if(selectedStandard5=="OCS" && selectedcategory5=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee5").val(180);
                    reg_fee5 =180;
                    console.log(reg_fee5);
                }else if(selectedStandard5=="RCS" && selectedcategory5=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee5").val(225);
                    reg_fee5 =225;
                    console.log(reg_fee5);
                }else if(selectedStandard5=="RCS" && selectedcategory5=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee5").val(202.5);
                    reg_fee5 =202.5;
                    console.log(reg_fee5);
                }else if(selectedStandard5=="GRS" && selectedcategory5=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee5").val(315);
                    reg_fee5 =315;
                    console.log(reg_fee5);
                }else if(selectedStandard5=="GRS" && selectedcategory5=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee5").val(247.5);
                    reg_fee5 =247.5;
                    console.log(reg_fee5);
                }else{
                    console.log("0");
                    $("#reg_fee5").val(0);
                }
               
            }

            function unitCalculate5(){
                var reg5 = $("#reg_fee5").val();
                var subtotal5=  sub_unit5*reg5 ;
                $("#cost5").html(subtotal5);
                console.log(subtotal5);
            }

           
                $("input#reg_fee5").keydown(function(){
                    var reg5 = $("#reg_fee5").val();
                var subtotal5=  sub_unit5*reg5 ;
                $("#cost5").html(subtotal5);
                console.log(subtotal5);
                    });

                    // for 7 no row

        var reg_fee6 = 0;
        var sub_unit6 = 0;
        var selectedStandard6 ="";
        var selectedcategory6 ="";
       
        $("select#standard6").change(function(){
        selectedStandard6= $(this).children("option:selected").val();
         myFunction6();
         unitCalculate6();
        });

        $("select#category6").change(function(){
            selectedcategory6= $(this).children("option:selected").val();
            console.log(selectedcategory6);
            myFunction6();
            unitCalculate6();
            });

            $("select#unit6").change(function(){
                sub_unit6= $(this).children("option:selected").val();
                console.log(sub_unit6);
                unitCalculate6();
            });

            function myFunction6(){
                if(selectedStandard6=="GOTS" && selectedcategory6=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee6").val("190");
                    reg_fee6 =$("#reg_fee6").val();
                    console.log(reg_fee6);
                }else if(selectedStandard6=="GOTS" && selectedcategory6=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee6").val("190");
                   reg_fee6 =$("#reg_fee6").val();
                    console.log(reg_fee6);
                }else if(selectedStandard6=="OCS" && selectedcategory6=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee6").val(202.5);
                    reg_fee6 =$("#reg_fee6").val();
                    console.log(reg_fee6);
                }else if(selectedStandard6=="OCS" && selectedcategory6=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee6").val(180);
                    reg_fee6 =180;
                    console.log(reg_fee6);
                }else if(selectedStandard6=="RCS" && selectedcategory6=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee6").val(225);
                    reg_fee6 =225;
                    console.log(reg_fee6);
                }else if(selectedStandard6=="RCS" && selectedcategory6=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee6").val(202.5);
                    reg_fee6 =202.5;
                    console.log(reg_fee6);
                }else if(selectedStandard6=="GRS" && selectedcategory6=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee6").val(315);
                    reg_fee6 =315;
                    console.log(reg_fee6);
                }else if(selectedStandard6=="GRS" && selectedcategory6=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee6").val(247.5);
                    reg_fee6 =247.5;
                    console.log(reg_fee6);
                }else{
                    console.log("0");
                    $("#reg_fee6").val(0);
                }
               
            }

            function unitCalculate6(){
                var reg6 = $("#reg_fee6").val();
                var subtotal6=  sub_unit6*reg6 ;
                $("#cost6").html(subtotal6);
                console.log(subtotal6);
            }

           
                $("input#reg_fee6").keydown(function(){
                    var reg6 = $("#reg_fee6").val();
                var subtotal6=  sub_unit6*reg6 ;
                $("#cost6").html(subtotal6);
                console.log(subtotal6);
                    });

                    // for 8 no row

        var reg_fee7 = 0;
        var sub_unit7 = 0;
        var selectedStandard7 ="";
        var selectedcategory7 ="";
       
        $("select#standard7").change(function(){
        selectedStandard7= $(this).children("option:selected").val();
         myFunction7();
         unitCalculate7();
        });

        $("select#category7").change(function(){
            selectedcategory7= $(this).children("option:selected").val();
            console.log(selectedcategory7);
            myFunction7();
            unitCalculate7();
            });

            $("select#unit7").change(function(){
                sub_unit7= $(this).children("option:selected").val();
                console.log(sub_unit7);
                unitCalculate7();
            });

            function myFunction7(){
                if(selectedStandard7=="GOTS" && selectedcategory7=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee7").val("190");
                    reg_fee7 =$("#reg_fee7").val();
                    console.log(reg_fee7);
                }else if(selectedStandard7=="GOTS" && selectedcategory7=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee7").val("190");
                   reg_fee7 =$("#reg_fee7").val();
                    console.log(reg_fee7);
                }else if(selectedStandard7=="OCS" && selectedcategory7=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee7").val(202.5);
                    reg_fee7 =$("#reg_fee7").val();
                    console.log(reg_fee7);
                }else if(selectedStandard7=="OCS" && selectedcategory7=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee7").val(180);
                    reg_fee7 =180;
                    console.log(reg_fee7);
                }else if(selectedStandard7=="RCS" && selectedcategory7=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee7").val(225);
                    reg_fee7 =225;
                    console.log(reg_fee7);
                }else if(selectedStandard7=="RCS" && selectedcategory7=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee7").val(202.5);
                    reg_fee7 =202.5;
                    console.log(reg_fee7);
                }else if(selectedStandard7=="GRS" && selectedcategory7=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee7").val(315);
                    reg_fee7 =315;
                    console.log(reg_fee7);
                }else if(selectedStandard7=="GRS" && selectedcategory7=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee7").val(247.5);
                    reg_fee7 =247.5;
                    console.log(reg_fee7);
                }else{
                    console.log("0");
                    $("#reg_fee7").val(0);
                }
               
            }

            function unitCalculate7(){
                var reg7 = $("#reg_fee7").val();
                var subtotal7=  sub_unit7*reg7 ;
                $("#cost7").html(subtotal7);
                console.log(subtotal7);
            }

           
                $("input#reg_fee7").keydown(function(){
                    var reg7 = $("#reg_fee7").val();
                var subtotal7=  sub_unit7*reg7 ;
                $("#cost7").html(subtotal7);
                console.log(subtotal7);
                    });


        });

        //Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });

        });

        //For First Row

        var reg_fee0 = 0;
        var sub_unit0 = 0;
        var selectedStandard0 ="";
        var selectedcategory0 ="";
       
        $("select#standard0").change(function(){
        selectedStandard0= $(this).children("option:selected").val();
         myFunction0();
         unitCalculate0();
        });

        $("select#category0").change(function(){
            selectedcategory0= $(this).children("option:selected").val();
            console.log(selectedcategory0);
            myFunction0();
            unitCalculate0();
            });

            $("select#unit0").change(function(){
                sub_unit0= $(this).children("option:selected").val();
                console.log(sub_unit0);
                unitCalculate0();
            });

            function myFunction0(){
                if(selectedStandard0=="GOTS" && selectedcategory0=="Main" ){
                    console.log('GOTS MAIN');
                    $("#reg_fee0").val("190");
                    reg_fee0 =$("#reg_fee0").val();
                    console.log(reg_fee0);
                }else if(selectedStandard0=="GOTS" && selectedcategory0=="Sub" ){
                    console.log('GOTS  Sub');
                    $("#reg_fee0").val("190");
                   reg_fee =$("#reg_fee0").val();
                    console.log(reg_fee0);
                }else if(selectedStandard0=="OCS" && selectedcategory0=="Main" ){
                    console.log('OCS Main');
                    $("#reg_fee0").val(202.5);
                    reg_fee0 =$("#reg_fee").val();
                    console.log(reg_fee0);
                }else if(selectedStandard0=="OCS" && selectedcategory0=="Sub" ){
                    console.log('OCS Sub');
                    $("#reg_fee0").val(180);
                    reg_fee0 =180;
                    console.log(reg_fee0);
                }else if(selectedStandard0=="RCS" && selectedcategory0=="Main" ){
                    console.log('RCS Main');
                    $("#reg_fee0").val(225);
                    reg_fee0 =225;
                    console.log(reg_fee0);
                }else if(selectedStandard0=="RCS" && selectedcategory0=="Sub" ){
                    console.log('RCS Sub');
                    $("#reg_fee0").val(202.5);
                    reg_fee0 =202.5;
                    console.log(reg_fee0);
                }else if(selectedStandard0=="GRS" && selectedcategory0=="Main" ){
                    console.log('GRS Main');
                    $("#reg_fee0").val(315);
                    reg_fee0 =315;
                    console.log(reg_fee0);
                }else if(selectedStandard0=="GRS" && selectedcategory0=="Sub" ){
                    console.log('GRS Sub');
                    $("#reg_fee0").val(247.5);
                    reg_fee0 =247.5;
                    console.log(reg_fee0);
                }else{
                    console.log("0");
                    $("#reg_fee0").val(0);
                }
               
            }

            function unitCalculate0(){
                var reg0 = $("#reg_fee0").val();
                var subtotal0=  sub_unit0*reg0 ;
                $("#cost0").html(subtotal0);
                console.log(subtotal0);
            }

           
                $("input#reg_fee0").keydown(function(){
                    var reg0 = $("#reg_fee0").val();
                    var subtotal0=  sub_unit0*reg0 ;
                    $("#cost0").html(subtotal0);
                    console.log(subtotal0);
                    });


                 
        
 
    });
</script>


    
@endsection
