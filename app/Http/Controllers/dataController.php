<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Course;
use App\Models\Note;
use App\Models\Repository;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;
use Illuminate\Http\Request;

class dataController extends Controller
{
    //
    public function sendMessage($id){
        Conversation::create([
            'recepient_id'=>$id,
            'sender_id'=>Auth()->user()->id,
            'message'=>request()->message,
        ]);
        return redirect()->back();
    }

    public function uploadresource(Request $data){
        //get just ext
        $extension = request()->file('file')->getClientOriginalExtension();
        //file name only
        $filename = request()->filename;
        //File name to store
        $filenametostore = $filename . '.' . $extension;
        //upload
        request()->file('file')->storeAs('public/resources', $filenametostore);
        if(request()->isPublic==1){
            $sp=1;
        }
        else{
            $sp=0;
        }
        Repository::create([
            'user_id'=>Auth()->user()->id,
            'file_name'=>$data['filename'],
            'file_path'=>$filenametostore,
            'category'=>$data['category'],
            'isPublic'=>$sp,
        ]);
        return redirect()->back();
    }
    function generatePDF($name){
        $course=Course::where(['course_name'=>$name])->first();
        $notes=Note::where('course_id','=',$course->id)->orderBy('chapter', 'asc')->get();
        $data=['notes'=>$notes, 'course'=>$course];
        $pdf = FacadePdf::loadView('notes', $data);
        return $pdf->download($name.'.pdf');
    }
    function text($message, $phone){
        $curl = curl_init();
        $data= json_encode(array(
        "mobile"=>$phone,
        "response_type"=> "json",
        "sender_name"=> "23107",
        "service_id"=> 0,
        "message"=>$message));
        curl_setopt_array(
            $curl, array(
                CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data),
                CURLOPT_HTTPHEADER => array(
                    'h_api_key: b123e31006efde04f74addb39db9604ebcf9e3f972743e1d47df0d4ef52b1078',
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        return redirect()->back();
    }
}
