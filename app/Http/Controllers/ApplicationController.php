<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Dompdf\Adapter\PDFLib;
use PDF;

class ApplicationController extends Controller
{
    //

    public function application(){
        return view();
    }

    public function insertApplication(Request $request){

        $programid = 1;

        foreach($request->certification_fee as $fee){
            $data2 = array();
            $data2['certification_fee']=$fee;
            $q1=DB::table('programs')->where('id', $programid++)->update($data2);
            if($q1){
                $data2['certification_fee']=NULL;
            }
        }

        
        $time = time();
        $data = array();
        $data['name']= $request->name;
        $data['addresss']= $request->addresss;
        $data['representative']= $request->representative;
        $data['contact_person']= $request->contact_person;
        $data['mobile']= $request->mobile;
        $data['email']= $request->email;
        $data['travel']= $request->travel;
        $data['programs']= json_encode($request->programs);
        $data['unit_name']= $request->unit_name;
        $data['unit_address']= $request->unit_address;
        $data['subunit_name']= json_encode($request->subunit_name);
        $data['subunit_address']= json_encode($request->subunit_address);
        $count = 0;
        foreach($request->subunit_name as $sun){
            if($sun != null){
                $count++;
            }
        }


     
        $data['num_subunit']= $count;
        $data['created_at']= date("Y-m-d H:i:s",$time);

        $query = DB::table('quotations')->insertGetId($data);
        if($query){
            $data1 = array();
            $data1['result']=DB::table('quotations')->where('id',$query)->first();
            $pdf = PDF::loadView('printInvoice', $data1);
            return $pdf->download("invoice$query.pdf");
            // Session::flash('message','Data Inserted Successful');
            // return redirect()->route('viewInvoice',$query);

        }


    }
}
