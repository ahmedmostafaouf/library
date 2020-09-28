<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MainController extends Controller
{

    public function home(){
        $books=Book::where('found',1)->get();
        return view('front.home',compact('books'));
    }
    public function books(){
        $books=Book::where('found',1)->get();
        return view('front.books',compact('books'));
    }
    public function booksDetails($id){
        $books=Book::findOrFail($id);
        return view('front.BooksDetails',compact('books'));
    }
    public function borrow_request($id){
        $books=Book::findOrFail($id);
        return view('front.borrow',compact('books'));
    }
    public function pushBorrow(Request $request){
        try {
            $borrowRequest=BorrowRequest::create([
                'user_id'=>$request->user()->id,
                'book_id'=>$request->book_id,
                'number_of_days'=>$request->number_of_days,
                'Too'=>$request->Too,
                'book_name'=>$request->book_name,
                'user_name'=>$request->user()->name
            ]);
            return redirect()->route('client-home')->with(['success'=>"BorrowsRequest Success"]);
        }catch (\Exception $ex){
          return 'error';
        }

    }
    public function student_borrow_request(Request $request){
        $borrowRequest=BorrowRequest::where('user_id',$request->user()->id)->get();
        return view('front.studentBorrowBook',compact('borrowRequest'));
    }
    public function getProfile(){
      return view('front.profile');
    }
    public function editProfile(Request $request){
        try {
            $rules=[
                'phone' => Rule::unique('users','phone')->ignore($request->user()->id),
                'email' => Rule::unique('users','email')->ignore($request->user()->id),
            ];
            //$validator=validator($request->all(),$rules);
            $request->validate($rules);
            $student=$request->user();
            $student->update($request->all());
            return redirect()->route('get.student.profile')->with(['success'=>'Edit Successfully']);
        }catch (\Exception $ex){
            return redirect()->route('get.student.profile')->with(['error'=>'Something Wring']);
        }


    }
    public function getEdtPass(){
        return view('front.changePass');
    }
    public function editPass(Request $request){
        if(!(Hash::check($request->get('oldPassword'),auth()->user()->password))){
            return redirect()->route('get.student.EditPass')->with(['error'=>'كلمه السر القديمه حطأ']);
        }
        if(strcmp($request->get('oldPassword'),$request->get('newPassword'))==0){
            return redirect()->route('get.student.EditPass')->with(['error'=>'لايجوز ان تكون كلمه السر الجديد تساوي كلمه السر القديمه']);
        }
        $validatedData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:6|confirmed',
        ]);
        $user=auth()->user();
        $request_data=$request->except(['password']);
        $request_data['password']=bcrypt($request->newPassword);
        $user->update($request_data);
        return redirect()->route('get.student.EditPass')->with(['success'=>'تم التحديث بنجاح']);

    }
    public function about(){
        return view('front.about');
    }
    public function getContact(){
        return view('front.contact');
    }
}
