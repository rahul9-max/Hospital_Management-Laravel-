<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    //
    public function show(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor=Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $doctor=Doctor::all();
            return view('user.home',compact('doctor')); 
        }  
    }
    public function appointment(Request $request){
        $data=new Appointment();
        $data->name=$request['name'];
        $data->email=$request['email'];
        $data->date=$request['date'];
        $data->number=$request['number'];
        $data->message=$request['message'];
        $data->doctor=$request['doctor'];
        $data->status='In_progress';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message','your appointment has been booked');
    }
    
    public function myAppointment(){
        if(Auth::id()){
            $userId=Auth::user()->id;
            $appoints=Appointment::where('user_id',$userId)->get();
            return view('user.myAppointment',compact('appoints'));
        }
        else{
            return redirect()->back();
        }
    }
    public function cancel($id){
        $appointment=Appointment::find($id);
        if($appointment){
            $appointment->delete();
            return redirect()->back()->with('message', 'Your appointment has been canceled.');
        }
       else {
        return redirect()->back()->with('error', 'Appointment not found.');
    }
    }
}

