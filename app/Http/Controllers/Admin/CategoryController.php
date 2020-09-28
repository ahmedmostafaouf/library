<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
      $categories=Category::paginate('5');
      return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryRequest $request)
    {
        try {
            $categories = Category::create($request->all());
            return redirect()->route('category.index')->with(['success' => 'Successfully Added']);
        } catch (\Exception $ex){
            return redirect()->route('category.index')->with(['error' => 'Sorry Something went wrong']);

        }
    }



    public function edit($id)
    {
      $categories=Category::findOrFail($id);
      if(!$categories){
          return redirect()->route('category.index')->with(['error' => 'Sorry This item Not Found']);
      }
      return view('admin.category.edit',compact('categories'));
    }


    public function update(CategoryRequest $request, $id)
    {
        try {
            $categories=Category::findOrFail($id);
            if(!$categories){
                return redirect()->route('category.index')->with(['error' => 'Sorry This item Not Found']);
            }
            $categories->update($request->all());
            return redirect()->route('category.index')->with(['success' => 'Successfully Edit']);

        }catch (\Exception $ex){
            return redirect()->route('category.index')->with(['error' => 'Sorry Something went wrong']);
        }
    }


    public function destroy($id)
    {
        try {
            $categories=Category::findOrFail($id);
            if(!$categories){
                return redirect()->route('category.index')->with(['error' => 'Sorry This item Not Found']);
            }
            $categories->delete();
            return redirect()->route('category.index')->with(['success' => 'Successfully Deleted']);

        }catch (\Exception $ex){
            return redirect()->route('category.index')->with(['error' => 'Sorry Something went wrong']);

        }
    }
}
