<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Book;
use App\Models\BorrowRequest;
use Illuminate\Http\Request;

class BorrowRequestController extends Controller
{

    public function index(Request $request)
    {
      $borrowRequests=BorrowRequest::where(function ($q) use($request){
          if($request->has('user_id')||$request->has('book_id')||$request->has('search')){
            return $q->where('user_id',$request->user_id)
                ->orwhere('book_id',$request->book_id);
          }

      })->paginate('20');
      return view('admin.borrow.index',compact('borrowRequests'));
    }


    public function destroy($id)
    {
        $borrowRequests=BorrowRequest::findOrFAil($id);
        if(!$borrowRequests){
            return redirect()->route('borrowRequest.index')->with(['error' => 'Sorry This item Not Found']);
        }
        $borrowRequests->delete();
        return redirect()->route('borrowRequest.index')->with(['success'=>"Delete Successfully"]);
    }
    public function changeAccept($ID)
    {
        try {
            $borrowBooks = BorrowRequest::findOrFail($ID);
            if (!$borrowBooks) {
                return redirect()->route('borrowRequest.index')->with(['error' => 'Sorry This item Not Found']);
            }
            if ($borrowBooks->status == 1) {
                $borrowBooks->update([
                    'status' => 0,
                ]);
                return redirect()->route('borrowRequest.index')->with(['success' => "Change Successfully"]);
            }
            if ($borrowBooks->status == 0) {
                $borrowBooks->update([
                    'status' => 1,
                ]);
                return redirect()->route('borrowRequest.index')->with(['success' => "Change Successfully"]);

            }

        } catch (\Exception $ex) {
            return redirect()->route('borrowRequest.index')->with(['error' => 'Sorry Something went wrong']);
        }
    }
    public function changeRoof($ID)
    {
        try {
            $Books = Book::findOrFail($ID);
            if (!$Books) {
                return redirect()->route('borrowRequest.index')->with(['error' => 'Sorry This item Not Found']);
            }
            if ($Books->found == 1) {
                $Books->update([
                    'found' => 0
                ]);
                return redirect()->route('borrowRequest.index')->with(['success' => "Change Successfully"]);
            }
            if ($Books->found == 0) {
                $Books->update([
                    'found' => 1
                ]);
                return redirect()->route('borrowRequest.index')->with(['success' => "Change Successfully"]);
            }

        } catch (\Exception $ex) {
            return redirect()->route('borrowRequest.index')->with(['error' => 'Sorry Something went wrong']);
        }
    }

}
