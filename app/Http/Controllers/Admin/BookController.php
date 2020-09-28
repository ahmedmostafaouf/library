<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Book;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookController extends Controller
{
    use General;


    public function index()
    {
        $books=Book::paginate('20');
        return view('admin.book.index',compact('books'));
    }

    public function create()
    {
       return view('admin.book.create');
    }

    public function store(BookRequest $request)
    {
        try {
            if (!$request->has('found')) {
                $request->request->add(['found' => 0]);
            } else {
                $request->request->add(['found' => 1]);
            }
            $path='';
            if($request->has('photo')){
                $path=$this->SaveImages($request->photo,'assests/images/books');
            }
            $request_data=$request->except(['photo']);
            $request_data['photo']=$path;

            $books=Book::create($request_data);
            return redirect()->route('book.index')->with(['success'=>"Add Successfully"]);
        }catch (\Exception $ex){
            return redirect()->route('book.index')->with(['error' => 'Sorry Something went wrong']);
        }

    }

    public function edit($id)
    {
        try {
            $books=Book::findOrFail($id);
            if (!$books){
                return redirect()->route('book.index')->with(['error' => 'Sorry This item Not Found']);
            }
            return view('admin.book.edit',compact('books'));
        }catch (\Exception $ex){
            return redirect()->route('book.index')->with(['error' => 'Sorry Something went wrong']);
        }

    }

    public function update(BookRequest $request, $id)
    {
        try {
            $books=Book::findOrFail($id);
            if (!$books){
                return redirect()->route('book.index')->with(['error' => 'Sorry This item Not Found']);
            }
            if (!$request->has('found')) {
                $request->request->add(['found' => 0]);
            } else {
                $request->request->add(['found' => 1]);
            }
            DB::beginTransaction();
            if($request ->has('photo')){
                $path=$this->SaveImages($request->photo,'assests/images/books');
                Book::where('id',$id)->update(['photo'=>$path]);
            }

            Book::where('id',$id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'found'=>$request->found
            ]);
            DB::commit();
            return redirect()->route('book.index')->with(['success'=>"Edit Successfully"]);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->route('book.index')->with(['error' => 'Sorry Something went wrong']);
        }
    }

    public function destroy($id)
    {
        try {
            $books=Book::findOrFail($id);
            if(!$books){
                return redirect()->route('book.index')->with(['error' => 'Sorry This item Not Found']);
            }
            $photo=Str::after($books->photo,'assests/');
             $photo=base_path('public/assests/'.$photo);
            unlink($photo);
            $books->delete();

            return redirect()->route('book.index')->with(['success'=>"Delete Successfully"]);
        }catch (\Exception $ex){
            return redirect()->route('book.index')->with(['error' => 'Sorry Something went wrong']);
        }
    }
    public function changeStatus($ID)
    {
        try {
            $books=Book::findOrFail($ID);
            if (!$books){
                return redirect()->route('book.index')->with(['error' => 'Sorry This item Not Found']);
            }
            if($books->found == 1){
                $books->update([
                   'found'=>0
               ]);

                return redirect()->route('book.index')->with(['success'=>"Change Successfully"]);
            }
            if($books->found == 0){
                $books->update([
                    'found'=>1
                ]);
                return redirect()->route('book.index')->with(['success'=>"Change Successfully"]);
            }

        }catch (\Exception $ex){
            return redirect()->route('book.index')->with(['error' => 'Sorry Something went wrong']);
        }
    }
    public function studentRequest($id){
        $book=Book::findOrFail($id);
        $books=$book->borrowRequests;
        return view('admin.book.showStudentReq',compact('books'));
    }
}
