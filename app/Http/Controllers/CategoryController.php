<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){
        // $category=DB::table('categories')
        // ->join('users','categories.user_id','users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);

        $category=Category::latest()->paginate(5);
        $trasShoft=Category::onlyTrashed()->latest()->paginate(3);

        // $category=DB::table('categories')->latest()->paginate(5);

        return view('admin.category.index',compact('category','trasShoft'));
    }

    public function AddCategory(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please fillup category name',
            'category_name.max' => 'Category name less than 255 charecter',
        ]);


        // Category::insert([
        //     "category_name"=>$request->category_name,
        //     "user_id"=>Auth::user()->id,
        //     "created_at"=>Carbon::now()
        // ]);

        $categoryName= new Category();
        $categoryName->category_name=$request->category_name;
        $categoryName->user_id=Auth::user()->id;
        $categoryName->save();

        // query builder
        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);

        return redirect()->back()->with('success','Category successfully updated');

    }



    public function EditCategory($id){
        // $category=Category::find($id);
        $category=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));

    }
    public function UpdateCategory(Request $request ,$id){
        $validated = $request->validate([
            'category_name' => 'required|max:255',
        ],
        [
            'category_name.required' => 'Please fillup category name',
            'category_name.max' => 'Category name less than 255 charecter',
        ]);

        // $category=Category::find($id);
        // $category->category_name=$request->category_name;
        // $category->user_id=Auth::user()->id;
        // $category->save();

        $category=array();
        $category['category_name']=$request->category_name;
        $category['user_id']=Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($category);


        return redirect('/category/all')->with('success','successfully updated');


    }



    public function Trashcategory($id){

        $trash=Category::find($id);
        $trash->delete();
        return redirect()->back()->with('success','successfully soft deleted and stored trashed area!');
    }

    public function Restore($id){
        $RestoreData=Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success','successfully Restore Category!');


    }

    public function Delete($id){
        $deleteCategory=Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success','successfully Parmanet Delete Category!');

    }
}
