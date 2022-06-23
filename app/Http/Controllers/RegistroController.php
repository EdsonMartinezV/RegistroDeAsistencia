<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registrarAsistencia(Request $request){
        
        Event::where('id',$id)->update(['event_date'=>$request->date,'price'=>$request->price]);
        $bookings = Event::where('id',$id)->get();
       
        return redirect()->route('client.add.image',$id);
    }
}
