@extends('master')

@section('title')
<title>USB|VIEW INVOICE</title>
@endsection

@section('style')
<style>


    /*.table td, #aaa {*/
    /*    padding: -0.25rem;*/
    /*    vertical-align: top;*/
    /*    border-top: 1px solid #dee2e6;*/
    /*}*/

    /*#color{*/
    /*    color: chartreuse;*/
    /*}*/

    .table td, .table th {
        padding: .25rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .border {
        border: 0px solid #dee2e6 !important;
    }
    .clearfix{
        overflow: auto;
    }
    li {
        margin-left: 24px;
    }

</style>

@endsection

@section('content')
<div class="container-fluid">
    <div class="section">
     <div class="row " >
        <div class="col-sm-12 col-md-12">
                    {{-- Heading --}}
                    <div >
                        <div class="float-left" style="width: 20%;">
                            <a href="#" alt="">
                                <img src="{{asset('image/logo.png')}}" alt="not found" style="height: 100px; width: 100px; background-color: #ffffff; border-radius: 50%; margin: 10px;">
                            </a>
                        </div>
                        <div class="float-right text-center" style="width: 80%; margin-top:24px;             margin-left: -80px;">
                            <h2 style="font-size: 15px;color: #9a1e29; font-weight: bold;" >USB ASIA LTD </h2>
                            <p style="background-color: #9a1e29; font-size:12px; color: #fff; margin-bottom: 2px;padding-bottom: 0px;">UPGRADE SUSTAIN BENEFIT</p>
                            <p style="margin: 0px;padding: 0px; font-size:8px;">Housh #35, Road #2A, Block #E, Sector #15, Uttora,Dhaka-1230 Bangladesh</p>
                            <h4 class="text-center" style="color: #0070C0; font-size:10px;">Organic & Recycled Standard Certification </h4>
                            <h5 class="text-center  mb-2" style="color: #3399ff; font-size:10px;">PROFORMA INVOICE </h5>

                        </div>

                    </div>


         </div>
    </div>
    </div>
     {{-- PHP --}}
     @php
        $subject = json_decode($result->programs, true);
        $date=date('d/m/Y');
        $count=0;
        $row_count=0;
        $certificate_total=0;
        $discount10=0;
        $certificate_cost=0;
        $mainunit_total=0;
        $subunit_total=0;
        $main_sub_total=0;
        $reg_certi_total=0;
        $vat15 = 0;
        $after_vat =0;
        $travel=0;
        $eurototal=0;
        $bdttotal=0;

    @endphp

{{-- Invoice Company Information --}}


    <div class="section" style="position: absolute;top: 120px; left: 16px;right: 0px;">
     <div class="row mt-5 mt-5">
        <div class="col-sm-12 col-md-12">
                <table class="table mt-3 border" style="font-size: 8px; padding:0; margin:0;  " id="color">
                    <tbody style="">
                        <tr>
                            <td style="width: 25%;" id="aaa">Date</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;">{{$date}}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">Refe</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;">USB-BD-20200604-GOTS & GRS-RCS-301</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">Factory Address</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;">{{$result->addresss}}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">Subject</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;">
                                @foreach ($subject as $sub)
                                    @if ($sub==1)
                                    <span class="badge badge-secondary">GOTS </span>

                                    @elseif($sub==2)
                                    <span class="badge badge-secondary"> OCS </span>

                                    @elseif($sub==3)
                                    <span class="badge badge-secondary"> RCS </span>

                                    @elseif($sub==4)
                                    <span class="badge badge-secondary"> GRS </span>

                                    @endif

                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 20%; color: #000000">Kind Attention</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">Name</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;">{{$result->representative}}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">Mobile</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;">{{$result->mobile}}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">E-mail</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;"><a href="{{$result->email}}">{{$result->email}}</a>  </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



        {{-- Calculation Part --}}
<div class="section " style="position: relative ;top: 300px; left: 0px;right: 0px;" >
        <div class="row mb-1 ">
            <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header text-center" style="background-color:#9a1e29; line-height: 20px; padding: 0px; " ><strong style="color: #fff;line-height: 20px;;">Service Fees</strong></div>
                    </div>
                        <div class="">
                            <table class="table table-bordered"  style="font-size: 8px; padding:0; margin:0;  " >
{{--                                 calculation table heading--}}

                                <thead>
                                    <tr>
                                        <th style="text-align: center" scope="col">SL. No</th>
                                        <th scope="col">Certification Scope</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">No. of Unit</th>
                                        <th scope="col">Rate per Unit</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

{{--                                 Certificate Info--}}
                                 @foreach ($subject as $key=>$sub)
                                    <tr>
                                        <th style="text-align: center" scope="row">{{++$key}}</th>
                                        <td>
                                            @if ($sub==1)
                                            <p><strong>GOTS </strong> Audit & Certificate fee</p> 

                                            @elseif($sub==2)
                                            <p><strong> OCS </strong> Audit & Certificate fee</p> 

                                            @elseif($sub==3)
                                            <p><strong> RCS </strong> Audit & Certificate fee</p> 

                                            @elseif($sub==4)
                                            <p><strong> GRS </strong> Audit & Certificate fee</p> 

                                            @endif
                                            {{-- <span>Audit & Certificate fee</span> --}}
                                        </td>
                                        <td>CRT.</td>
                                        <td style="text-align: center">1</td>
                                            @php
                                                $count++;
                                                $certificate_query = DB::table('programs')->where('id',$sub)->first();
                                                $certificate_total= $certificate_total + $certificate_query->certification_fee;
                                                $certificate_cost= $certificate_total;
                                            @endphp
                                        <td><span> &euro; </span> {{$certificate_query->certification_fee}}</td>
                                        <td><span> &euro; </span> {{$certificate_query->certification_fee}}</td>
                                    </tr>
                                @endforeach

{{--                                 Certificate Total--}}
                                <tr>
                                    <td style="text-align: right" colspan="5">Audit & Certificate Total: </td>
                                    <td><span> &euro; </span> {{$certificate_total}}</td>
                                </tr>

{{--                                 IF Count greater then 1 and for 10% discount--}}
                                @if($count>1)
                                    <tr>
                                        @php
                                        $discount10 = ($certificate_total * 10) / 100;
                                        $certificate_cost=$certificate_total - $discount10;
                                        @endphp
                                        <td style="text-align: right" colspan="5">After Applicable 10% Discount</td>
                                        <td><span> &euro; </span> {{$certificate_cost}}</td>
                                    </tr>
                                @endif

{{--                                 Registration Calculation--}}
                                @foreach ($subject as $sub)
                                    <tr>
                                    <th style="text-align: center" scope="row">{{ ++$row_count}}</th>
                                        <td>
                                            @if ($sub==1)
                                            <p><strong> GOTS </strong> Registration Fee Main Unit</p>  

                                            @elseif($sub==2)
                                            <p><strong> OCS </strong> Registration Fee Main Unit</p>  

                                            @elseif($sub==3)
                                            <p> <strong> RCS </strong> Registration Fee Main Unit</p>  

                                            @elseif($sub==4)
                                            <p> <strong> GRS </strong> Registration Fee Main Unit</p>  

                                            @endif
                                           {{-- <span>  Registration Fee Main Unit </span> --}}
                                            
                                        </td>
                                        <td>Reg.</td>
                                        <td style="text-align: center">1</td>
                                            @php
                                                $mainunit_query = DB::table('programs')->where('id',$sub)->first();
                                                $mainunit_total =$mainunit_total + $mainunit_query->mainunit_fee;
                                            @endphp
                                        <td><span> &euro; </span> {{$mainunit_query->mainunit_fee}}</td>
                                        <td><span> &euro; </span> {{$mainunit_query->mainunit_fee}}</td>
                                    </tr>

                                    @if($result->num_subunit>0)
                                        <tr>
                                                <th style="text-align: center" scope="row">{{ ++$row_count}}</th>
                                                <td>
                                                    @if ($sub==1)
                                                    <p><strong> GOTS </strong> Registration Fee Sub Unit</p> 

                                                    @elseif($sub==2)
                                                    <p> <strong> OCS </strong> Registration Fee Sub Unit</p> 

                                                    @elseif($sub==3)
                                                    <p> <strong> RCS </strong> Registration Fee Sub Unit</p> 

                                                    @elseif($sub==4)
                                                    <p> <strong> GRS </strong> Registration Fee Sub Unit</p> 

                                                    @endif
                                                   
                                                </td>
                                                <td>Reg.</td>
                                                <td style="text-align: center">{{$result->num_subunit}}</td>
                                                    @php
                                                        $subunit_query = DB::table('programs')->where('id',$sub)->first();
                                                        $subunit_total = $subunit_total + ($subunit_query->subunit_fee * $result->num_subunit);
                                                    @endphp
                                                <td><span> &euro; </span> {{$subunit_query->subunit_fee}}</td>
                                                <td><span> &euro; </span> {{$subunit_query->subunit_fee * $result->num_subunit}}</td>
                                        </tr>
                                    @endif

                                @endforeach


{{--                                 Registration Total--}}
                                <tr>
                                    @php
                                        $main_sub_total=$mainunit_total + $subunit_total;
                                    @endphp
                                    <td style="text-align: right" colspan="5">Total Registration Fee: </td>
                                    <td><span> &euro; </span> {{$main_sub_total}}</td>
                                </tr>

{{--                                 Audit Certificate Registration Total Fee--}}
                                <tr>
                                    @php
                                        $reg_certi_total=$certificate_cost + $main_sub_total;
                                    @endphp
                                    <td style="text-align: right" colspan="5">Total Audit,Certification and Registration Fee : </td>
                                    <td><span> &euro; </span> {{ $reg_certi_total}}</td>
                                </tr>

{{--                                 Vat 15%--}}
                                <tr>
                                    @php
                                    $vat15 = ($reg_certi_total * 15) / 100;
                                    $after_vat = $reg_certi_total + $vat15 ;
                                    @endphp
                                    <td style="text-align: right" colspan="5">After Applicable 15% Vat</td>
                                    <td><span> &euro; </span> {{$after_vat}}</td>
                                </tr>

{{--                                 If Travel And Accomodation--}}
                                @if($result->travel != NULL)
                                    <tr>
                                        @php
                                           $travel = 150;
                                        @endphp
                                        <td style="text-align: right" colspan="5">Travell & Accomodation Fee : </td>
                                        <td><span> &euro; </span> {{$travel}}</td>
                                    </tr>
                                @endif
{{--                                 ALL Total Cost in EURO--}}
                                <tr>
                                    @php
                                         $eurototal=$after_vat + $travel ;
                                    @endphp
                                    <td style="text-align: right" colspan="5">All Total Amount In EURO </td>
                                    <td><span>BDT</span> {{$eurototal}}</td>
                                </tr>

{{--                                 All Total Cost in BDT--}}
                                <tr>
                                    @php
                                         $bdttotal= $eurototal * 98;
                                    @endphp
                                    <td style="text-align: right" colspan="5">All Total Amount In BDT </td>
                                    <td><span>BDT</span> {{$bdttotal}}</td>
                                </tr>



                                </tbody>

{{--                                 Simple Text EURO TO BDT--}}
                                <tr>
                                    <td style="text-align: center; color:blueviolet" colspan="6">Conversion Rate EURO to BDT: 1 EURO = 98 BDT</td>
                                </tr>
                            </table>
                        </div>



                </div>
            </div>



<div class="clearfix"></div>

    {{-- USB Account Info --}}

    <div class="section mt-5" style="position: absolute; left: 0px;right: 0px;">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="" style="background-color: #9a1e29; height: 20px; margin: 0px;"></div>
                <table class="table  border" style="font-size: 8px; padding:0; margin:0px;">
                    <tbody style="background-color: #A6A6A6">
                    <tr>
                        <td style="width: 25%; border-top-style: none;">Beneficiary's Name</td>
                        <td style="width: 2%; border-top-style: none;">:</td>
                        <td style="width: 73%; border-top-style: none;">USB ASIA LTD</td>
                    </tr>
                    <tr>
                        <td style="width: 20%; border-top-style: none;">Beneficiary's Bank</td>
                        <td style="width: 2%; border-top-style: none;">:</td>
                        <td style="width: 73%; border-top-style: none;">PRIME BANK LTD</td>
                    </tr>
                    <tr>
                        <td style="width: 20%; border-top-style: none;">Bank Address</td>
                        <td style="width: 2%; border-top-style: none;">:</td>
                        <td style="width: 73%; border-top-style: none;">Garib E Newaj Avenue, Uttora Dhaka,Bangladesh</td>
                    </tr>
                    <tr>
                        <td style="width: 20%; border-top-style: none;">Beneficiary's A/C#</td>
                        <td style="width: 2%; border-top-style: none;">:</td>
                        <td style="width: 73%; border-top-style: none;">2170111016804  &nbsp;&nbsp;&nbsp;&nbsp;*Swift Code: PRBL BDDH</td>
                    </tr>
                    </tbody>

                </table>


            </div>
        </div>
        <div class="clearfix"></div>
        <div class="section" style="position: absolute; left: 0px;right: 0px;">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="" style="background-color: #9a1e29; height: 20px;"></div>
                    <table class="table  border" style="font-size: 8px; padding:0; margin:0px;">
                        <tbody>

                        <tr>
                            <td  class="text-center pt-4" style="width: 20%; border-right: 1px solid #000; ">Terms & Conditions</td>
                            <td>
                                <li>Cash cheque / Account / Payee Cheque in Favor to the above mentioned account</li>
                                <li>All prices are included VAT & TAX</li>
                                <li>This offer would be valid for 15 days from the data of submit</li>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <p class="text-center mb-2" style="font-size: 8px;">
                                    Thanks you for give us the opportunity to provide proposal for your consideration.If you have any query or require any additional information, plase feel free to contact me in blow bumbers at anytime
                                </p>

                                <p style="margin-bottom: 5px;">On be half USB ASIA LTD</p>
                                <img src="{{asset('image/signature1.png')}}" alt="SIGNATURE" style="height: 50px;width: 80px;">
                                <p style="margin-bottom:0px; padding-bottom: 0px;">Engr.MD Hasnat Kabir</p>
                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><strong style="margin-bottom: 0px;padding-bottom: 0px;">USB ASIA LTD</strong></p>
                                <p>Phone:  +8801723612748</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    {{-- Signature Info  --}}











</div>
























</div>
@endsection
@section('script')

@endsection
