<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
// use Notification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MyFirstNotification;

class AdminController extends Controller
{
    //
    public function addView(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
    }
    public function store(Request $request){
        $doctor=new Doctor();
        $image=$request->file('doctor_image');
        $fileName=time().'-'.$image->getClientOriginalExtension();
        $image->move('doctorImage',$fileName);

        $doctor->image=$fileName;
        $doctor->name=$request['name'];
        $doctor->phone=$request['phone'];
        $doctor->room=$request['room'];
        $doctor->speciality=$request['speciality'];
        $doctor->save();
        return redirect()->back()->with('message','Doctor added successfully');
    }
    public function showAppoint(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=Appointment::all();
                return view('admin.showAppoint',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
        
    }
    public function approveAppoint($id){
        $userId=Appointment::find($id);
            $userId->status="Approved";
            $userId->save();
            return redirect()->back();
    }
    public function cancelAppoint($id){
        $userId=Appointment::find($id);
            $userId->status="cancelled";
            $userId->save();
            return redirect()->back();
    }
    public function showDoctor(){
        $doctors=Doctor::all();
        return view('admin.showDoctor',compact('doctors'));
    }
    public function deleteDoc($id){
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->back();
    }
    public function updateDoc($id){
        $doctors=Doctor::find($id);
        return view('admin.updateDoc',compact('doctors'));
    }
    public function editDoc(Request $request,$id){
        $doctor=Doctor::find($id);
        $doctor->name=$request['name'];
        $doctor->phone=$request['phone'];
        $doctor->speciality=$request['speciality'];
        $doctor->room=$request['room_no'];
        $image=$request->file('image');
        if($image){
            $fileImage=time().'-'.$image->getClientOriginalExtension();
            $image->move('doctorImage',$fileImage);
            $doctor->image=$fileImage;
            // $doctor->save();
        }
        // else{
            $doctor->save();
            return redirect()->back()->with('message','doctor has been updated successfully');
        // }
    }
    public function viewEmail($id){
        $data=Appointment::find($id);
        return view('admin.sendEmail',compact('data'));
    }
    public function sendEmail(Request $request,$id){
        $data=Appointment::find($id);
        $details=[
            'greeting'=>$request['greeting'],
            'body'=>$request['body'],
            'actiontext'=>$request['actiontext'],
            'actionurl'=>$request['actionurl'],
            'endpart'=>$request['endpart'],
        ];
        Notification::send($data,new MyFirstNotification($details));
        
        return redirect()->back();
    }
}
