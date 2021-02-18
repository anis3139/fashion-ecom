<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\NewFile;
use Illuminate\Support\Facades\Session;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
        $this->middleware('SellerChecker');
    }

    public function categoryIndex()
    {
        $allCategory = category::all();
        return view('dashbord.pages.allcates', compact('allCategory'));
    }

    public function categorySave(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:3|max:190',
            'page_title' => 'required|min:3|max:190',
            'image' => 'required',
            'description_title' => 'nullable|min:2|max:190',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $main_photo = $request->image;
            $imagename = "category-" . uniqid() . "." . $main_photo->getClientOriginalExtension();
            Image::make($main_photo)->resize(330, 319)->save(base_path('public/upload/category/' . $imagename));
        } else {
            $imagename = "No Data Upload";
        }

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->category_name);

        $addCategory = new category();
        $addCategory->category_name = $request->category_name;
        $addCategory->page_title = $request->page_title;
        $addCategory->image = $imagename;
        $addCategory->slug = $slug;
        $addCategory->description_title = $request->description_title;
        $addCategory->description= $request->description;
        $addCategory->created_at = Carbon::now();
        $addCategory->updated_at = Carbon::now();
        $addCategory->save();

        Session::flash('success', 'Category added successfully!');
        return redirect('/allcates');
    }

    public function categoryEdit($id)
    {
        return category::where('id', $id)->first();
    }

    public function categoryUpdate(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|min:3|max:190',
            'page_title' => 'required|min:3|max:190',
            'description_title' => 'nullable|min:2|max:190',
            'description' => 'nullable',
        ]);

        $categoryid = $request->categoryid;

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->categoryName);

        $addCategory = category::where('id', $categoryid)->first();

        if ($request->hasFile('image')) {
            $main_photo = $request->image;
            $imagename = "product-" . uniqid() . "." . $main_photo->getClientOriginalExtension();
            Image::make($main_photo)->resize(330, 319)->save(base_path('public/upload/category/' . $imagename));
            $addCategory->image = $imagename;
        } else {
            $addCategory->image = $addCategory->image;
        }
        $addCategory->category_name = $request->categoryName;
        $addCategory->page_title = $request->page_title;
        $addCategory->description_title = $request->description_title;
        $addCategory->description= $request->description;
        $addCategory->slug = $slug;
        $addCategory->updated_at = Carbon::now();
        $addCategory->save();

        Session::flash('success', 'Category updated successfully!');
        return redirect('/allcates');
    }

    public function categoryDelete($id)
    {
        category::where('id', $id)->delete();
        subCategory::where('category_id', $id)->delete();
        thirdCategory::where('category_id', $id)->delete();
        // category::findOrFail($id)->delete();
    }

    public function subCategory($id)
    {
        $category = category::findOrFail($id);
        $allsubCategory = subCategory::where('category_id', $id)->get();
        return view('dashbord.pages.subcates', compact('category', 'allsubCategory'));
    }

    public function subCategorySave(Request $request)
    {
        $request->validate([
            'subCategory_name' => 'required|min:3|max:190',
            'page_title' => 'required|min:3|max:190',
            'description_title' => 'nullable|min:2|max:190',
            'description' => 'nullable',
        ]);

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->subCategory_name);

        $addCategory = new subCategory();
        $addCategory->category_id = $request->category_id;
        $addCategory->subCategory_name = $request->subCategory_name;
        $addCategory->page_title = $request->page_title;
        $addCategory->slug = $slug;
        $addCategory->description_title = $request->description_title;
        $addCategory->description= $request->description;
        $addCategory->created_at = Carbon::now();
        $addCategory->updated_at = Carbon::now();
        $addCategory->save();

        Session::flash('success', 'Sub category added successfully!');
        return back();
    }

    public function subCategorySaveee()
    {
        $category = category::truncate();
        $subCategory = subCategory::truncate();
        $thirdCategory = thirdCategory::truncate();
        $product = product::truncate();
        return back();
    }

    public function subCategoryEdit($id)
    {
        return subCategory::where('id', $id)->first();
    }

    public function subCategoryUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'subCategoryName' => 'required|min:3|max:190',
            'page_title' => 'required|min:3|max:190',
            'description_title' => 'nullable|min:2|max:190',
            'description' => 'nullable',
        ]);

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->subCategoryName);
        $addCategory = subCategory::where('id', $id)->first();

        $addCategory->category_id = $request->category_id;
        $addCategory->subCategory_name = $request->subCategoryName;
        $addCategory->page_title = $request->page_title;
        $addCategory->slug = $slug;
        $addCategory->description_title = $request->description_title;
        $addCategory->description= $request->description;
        $addCategory->updated_at = Carbon::now();
        $addCategory->save();

        Session::flash('success', 'Sub category updated successfully!');
        return back();
    }

    public function subCategoryDelete($id)
    {
        subCategory::where('id', $id)->delete();
        thirdCategory::where('sub_category_id', $id)->delete();
    }

    /////third Sub Category name

    public function thirdCategory($id)
    {
        $allThirdCategory = thirdCategory::where('sub_category_id', $id)->get();
        $allsubCategory = subCategory::where('id', $id)->first();
        return view('dashbord.pages.thirdCategory', compact('allsubCategory', 'allThirdCategory'));
    }

    public function thirdCategorySave(Request $request)
    {
        $request->validate([
            'thirdCategoryName' => 'required|min:3|max:190',
            'page_title' => 'required|min:3|max:190',
            'description_title' => 'nullable|min:2|max:190',
            'description' => 'nullable',
        ]);

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->thirdCategoryName);

        $addCategory = new thirdCategory();
        $addCategory->category_id = $request->category_id;
        $addCategory->sub_category_id = $request->sub_category_id;
        $addCategory->thirdCategoryName = $request->thirdCategoryName;
        $addCategory->page_title = $request->page_title;
        $addCategory->slug = $slug;
        $addCategory->description_title = $request->description_title;
        $addCategory->description= $request->description;
        $addCategory->created_at = Carbon::now();
        $addCategory->updated_at = Carbon::now();
        $addCategory->save();

        Session::flash('success', 'Third category added successfully!');
        return back();
    }

    public function thirdCategoryEdit($id)
    {
        return thirdCategory::where('id', $id)->first();
    }


    public function thirdCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'thirdCategory_Name' => 'required|min:3|max:190',
            'page_title' => 'required|min:3|max:190',
            'description_title' => 'nullable|min:2|max:190',
            'description' => 'nullable',
        ]);

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->thirdCategory_Name);
        $addCategory = thirdCategory::where('id', $id)->first();

        $addCategory->category_id = $request->categoryId;
        $addCategory->sub_category_id = $request->sub_categoryId;
        $addCategory->thirdCategoryName = $request->thirdCategory_Name;
        $addCategory->page_title = $request->page_title;
        $addCategory->slug = $slug;
        $addCategory->description_title = $request->description_title;
        $addCategory->description= $request->description;
        $addCategory->updated_at = Carbon::now();
        $addCategory->save();

        Session::flash('success', 'Third category updated successfully!');
        return back();
    }

    public function thirdCategoryDelete($id)
    {
        thirdCategory::where('id', $id)->delete();
    }

    ///////////////////////////////////subCategory

    public function categoryTosub(Request $request)
    {
        $category_id = $request->category_id;
        $allsubCategory = subCategory::where('category_id', $category_id)->get();
        $stringToSend = "<option value=''>--Sub Category Name--</option>";
        foreach ($allsubCategory as $value) {
            $stringToSend .= "<option value='" . $value->id . "'>" . $value->subCategory_name . "</option>";
        }
        echo $stringToSend;

    }

    function subCategoryTothird(Request $request)
    {
        $subCategory_id = $request->subCategory_id;
        $allsubCategory = thirdCategory::where('sub_category_id', $subCategory_id)->get();
        $stringToSend = "<option>--Third Category Name--</option>";
        foreach ($allsubCategory as $value) {
            $stringToSend .= "<option value='" . $value->id . "'>" . $value->thirdCategoryName . "</option>";
        }
        echo $stringToSend;
    }

}
