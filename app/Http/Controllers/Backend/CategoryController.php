<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }


    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_eng' => 'required',
            'category_name_esp' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_eng.required' => 'Category Name English is required',
            'category_name_esp.required' => 'Category Name Spanish is required',
        ]);

        Category::insert([
            'category_name_eng' => $request->category_name_eng,
            'category_name_esp' => $request->category_name_esp,
            'category_slug_eng' => strtolower(str_replace(' ','-',$request->category_name_eng)),
            'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;

        $request->validate([
            'category_name_eng' => 'required',
            'category_name_esp' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_eng.required' => 'Category Name English is required',
            'category_name_esp.required' => 'Category Name Spanish is required',
        ]);

        Category::findOrFail($category_id)->update([
            'category_name_eng' => $request->category_name_eng,
            'category_name_esp' => $request->category_name_esp,
            'category_slug_eng' => strtolower(str_replace(' ','-',$request->category_name_eng)),
            'category_slug_esp' => strtolower(str_replace(' ','-',$request->category_name_esp)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
