<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
class ProgramsController extends Controller
{
    public function programs(){
        $data = array();
        $data['results'] = DB::table('programs')->get();

        // dd($data);
        return view('program.programs', $data);
    }

    public function insertProgram(Request $request){
       
        $data = array();
        $data['name']=$request->name;
        $data['certification_fee']=$request->certification_fee;
        $data['mainunit_fee']=$request->mainunit_fee;
        $data['subunit_fee']=$request->subunit_fee;
        $data['status']=1;

        $query = DB::table('programs')->insert($data);
        if($query){
            Session::flash('message', 'Data Inserted Successful');
            return redirect()->route('programs');
        }
       
    }

    public function editProgram($id){
        $result = DB::table('programs')->where('id',$id)->first();
        return view('program.editProgram')->with('result',$result);
    }

    public function updateProgram(Request $request, $id){
       
        $data = array();
        $data['name']=$request->name;
        $data['certification_fee']=$request->certification_fee;
        $data['mainunit_fee']=$request->mainunit_fee;
        $data['subunit_fee']=$request->subunit_fee;

        $query = DB::table('programs')->where('id',$id)->update($data);
        if($query){
            Session::flash('message', 'Data Updated Successful');
            return redirect()->route('programs');
        }
       
    }

    public function changeStatus($id){
        //print_r('getting');
         $data = array();
         $query = DB::table('programs')->where('id',$id)->first();
         if($query->status==1){
             $data['status']=0;
             $query2 = DB::table('programs')->where('id',$id)->update($data);
             if($query2){
                 Session::flash('message', 'Status Changed Successful');
                 return redirect()->route('programs');
             }

         }else{
             $data['status']=1;
             $query2 = DB::table('programs')->where('id',$id)->update($data);
             if($query2){
                 Session::flash('message', 'Status Changed Successful');
                 return redirect()->route('programs');
             }

         }

    }

    public function deleteProgram($id){
        $query = DB::table('programs')->where('id',$id)->delete();
        if($query){
            Session::flash('message', 'Data Deleted Successful');
            return redirect()->route('programs');

        }


    }
}
