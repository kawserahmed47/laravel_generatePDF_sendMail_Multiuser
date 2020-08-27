<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Dompdf\Adapter\PDFLib;
use PDF;

class MailController extends Controller
{
    public function sendMail(){

         //$email = 'kawserahmed47@gmail.com';//if single email
         $emails= array("kawserahmed47@gmail.com", "atikhasan2811@gmail.com"); //if multiple email use array;

         $details = [
             
             'from' => 'This is for testing email using smtp From USB',
             'name'=>'This is name',
             'message'=>'This is Message'
         ];
 
         $subject ="USB Invoice Generate";
         foreach($emails as $email){
             \Mail::to($email)->send(new \App\Mail\USBmail($details, $subject));
         }
        
         dd("Email is Sent.");

    }

    public function createMail(Request $request){
        return view('createMail');
    }

    public function sendM(Request $request){
        $data["email"]=$request->email;
        $data["client_name"]=$request->client_name;
        $data["subject"]=$request->subject;

        $pdf = PDF::loadView('mails.mail', $data);
       
        try{
            Mail::send('mails.mail', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
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
       //return response()->json(compact('this'));
         return $pdf->download("invoice.pdf");
 }
}
