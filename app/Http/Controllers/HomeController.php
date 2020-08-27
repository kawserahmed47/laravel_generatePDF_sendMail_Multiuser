<?php

namespace App\Http\Controllers;
use Dompdf\Adapter\PDFLib;
use PDF;
use Mail;
use App\Exports\QuotationExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function invoice(){
        return view('invoice');
    }

    public function insertInvoice(Request $request){
        $time = time();
        $data = array();
        $data['name']= $request->name;
        $data['addresss']= $request->addresss;
        $data['city']= $request->city;
        $data['representative']= $request->representative;
        $data['contact_person']= $request->contact_person;
        $data['mobile']= $request->mobile;
        $data['email']= $request->email;
        $data['programs']= json_encode($request->programs);
        $data['certificate_fees']= json_encode($request->certificate_fees);
        $data['standards']= json_encode($request->standards);
        $data['unit_categories']= json_encode($request->unit_categories);
        $data['num_subunits']= json_encode($request->num_subunits);
        $data['reg_fees']= json_encode($request->reg_fees);
        $data['created_at']= date('Y-m-d',$time);
        $query = DB::table('invoice')->insertGetId($data);
        if($query){
            $data2 = array();
            $data2['result']=DB::table('invoice')->where('id',$query)->first();
            // return view('printInvoice1',$data);
            $data3 = array();
            $data3['name']= $request->contact_person;
            $emails=array("kawserahmed47@gmail.com", "$request->email", "engr.kawserahmed@gmail.com","atikhasan2811@gmail.com");
            $subject = "PROFORMA INVOICE FOR ".$request->name;
            $pdf = PDF::loadView('printInvoice1', $data2);
            foreach($emails as $email){
            try{
                Mail::send('mails.mail', $data3, function($message)use($data3,$email,$subject,$pdf) {
                $message->to($email)
                ->subject($subject)
                ->attachData($pdf->output(), "invoice.pdf");
                });
            }catch(JWTException $exception){
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
            if (Mail::failures()) {
                 $this->statusdesc  =   "Error sending mail";
                 $this->statuscode  =   "0";
    
            }else{
    
               $this->statusdesc  =   "Message sent Succesfully";
               $this->statuscode  =   "1";
            }

                 
        }



            return $pdf->download("invoice$query.pdf");
            }
    }

    public function index(){
        $data = array();
        $data['programs']=DB::table('programs')->get();
        return view('applications.application',$data);
    }

    public function viewApplication(){
        $data = array();
        $data['results']=DB::table('quotations')->orderBy('id', 'desc')->get();
        return view('viewApplication',$data);
    }

    public function viewInvoice($id){
        $data = array();
        $data['result']=DB::table('quotations')->where('id',$id)->first();
        return view('viewInvoice',$data);
    }

    public function printInvoice($id){
        $data = array();
        $data['result']=DB::table('quotations')->where('id',$id)->first();
        // return view('printInvoice',$data);
        $pdf = PDF::loadView('printInvoice', $data);
        return $pdf->download("invoice$id.pdf");
    }
    public function printInvoiceCopy($id){
        $data = array();
        $data['result']=DB::table('invoice')->where('id',$id)->first();
        // return view('printInvoice1',$data);
        $pdf = PDF::loadView('printInvoice1', $data);
        return $pdf->download("invoice$id.pdf");
    }

    public function genrateExcel(){
        return Excel::download(new QuotationExport, 'quotation.xlsx');
        // return view('excelGenerate');
    }
}