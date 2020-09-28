<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorrowRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $students=User::where(function ($q) use($request){
            if($request->input('search')){
                return $q ->where('name','like','%'.$request->search.'%');
            }})->get();
        return view('admin.student.index',compact('students'));
    }


    public function destroy($id)
    {
       $students=User::findOrFAil($id);
       if(!$students){
           return redirect()->route('student.index')->with(['error' => 'Sorry This item Not Found']);
       }
       /* $photo=Str::after($students->photo,'assests/');
        $photo=base_path('public/assests/'.$photo);
        unlink($photo);*/
        $students->delete();
        return redirect()->route('student.index')->with(['success'=>"Delete Successfully"]);

    }
    public function bookRequest($id){
        $student=User::findOrFail($id);
         $students= $student->borrowRequests;
        return view('admin.student.showBookReq',compact('students'));
    }
}
