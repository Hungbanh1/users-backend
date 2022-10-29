<?php

namespace App\Http\Controllers;

use App\Page;
use App\Product;
use App\Products_folders;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }
    

    function add()
    {
        // return "ok";


        $list_title = [
            'iphone' => 'Iphone',
            'samsung' => 'SamSung',
            'watch' => 'AppleWatch',
        ];
       
        $list_cat_id = [
            '1' => 'Iphone',
            '2' => 'SamSung',
            '3' => 'Laptop',        
        ];
        return view('admin.product.add', compact('list_title','list_cat_id' ));
    }

    function store(Request $request)
    {
        // dd($request->all());
        
        $request->validate(
            [
               
                'product_name' => ['required', 'string', 'max:255'],
                'product_desc' => ['required', 'string', 'max:10000'],
                'product_content' => ['required', 'string', 'max:10000'],
                'price' => ['required', 'string', 'max:255'],
                'old_price' => ['required', 'string', 'max:255'],
                'cat_title' => ['required', 'string', 'max:255'],
            ],
            [
                'required' => ':attribute không được để trống !!!',
                'max' => ':attribute có độ dài tối đa :max kí tự !!!',
                'min' => ':attribute có độ dài tối thiểu :min kí tự !!!',
                'confirmed' => 'Xác nhận mật khẩu không thành công , vui lòng check lại !!!'
            ],

            [
                'product_name' => 'Tên sản phẩm',
                'product_desc' => 'Mô tả sản phẩm',
                'product_content' => 'Chi tiết sản phẩm',
                'price' => 'Giá sản phẩm',
                'old_price' => 'Giá sản phẩm',
                'cat_title' => 'Danh mục sản phẩm'
            ]
        );

        

        if($request->hasFile('file')){
            // echo "có file";
            $file = $request->file;
            // dd($file->getClientOriginalName());

            // $file_name =  $file->getClientOriginalName();
            // // echo $file->getClientOriginalExtension();


            // $path = $file->move('public/uploads' , $file->getClientOriginalName());

            $thumb= $file->move('public/uploads/products' , $request->file->getClientOriginalName());

        }
        // $thumb ='http://localhost/PHP%20Master/project/ismart.com/MVC/public/uploads/products/'.$request->file->getClientOriginalName();

        // dd($request->all());
        $product = new Product;
        $product->product_thumb = $thumb;
        $product->product_name = $request->input('product_name');
        $product->product_desc = $request->input('product_desc');
        $product->product_content = $request->input('product_content');
        $product->price = $request->input('price');
        $product->old_price = $request->input('old_price');
        $product->cat_id = $request->input('cat_id');
        $product->cat_title = $request->input('cat_title');
        $product->slug = $request->input('slug');
        $product->save();

    

        return redirect('admin/product/list')->with('status', 'Đã thêm sản phẩm thành công !!!');
    }


    //Cập nhật
    function update(Request $request, $id)
    {
        $request->validate(
            [
       
                'product_name' => ['required', 'string', 'max:255'],
                'product_desc' => ['required', 'string', 'max:10000'],
                'product_content' => ['required', 'string', 'max:10000'],
                'price' => ['required', 'string', 'max:255'],
                'cat_title' => ['required', 'string', 'max:255'],
            ],

    
            [
                'required' => ':attribute không được để trống !!!',
                'max' => ':attribute có độ dài tối đa :max kí tự !!!',
                'min' => ':attribute có độ dài tối thiểu :min kí tự !!!',
                'confirmed' => 'Xác nhận mật khẩu không thành công , vui lòng check lại !!!'
            ],

            [
                'product_name' => 'Tên sản phẩm',
                'product_desc' => 'Mô tả sản phẩm',
                'product_content' => 'Chi tiết sản phẩm',
                'price' => 'Giá sản phẩm',
                'cat_title' => 'Danh mục sản phẩm'
            ]
        );
        if($request->hasFile('file')){
            // echo "có file";
            $file = $request->file;
            // $file_name =  $file->getClientOriginalName();
            // echo $file->getClientOriginalExtension();


            // $path = $file->move('public/uploads' , $file->getClientOriginalName());
            $thumb= $file->move('public/uploads/products' , $file->getClientOriginalName());


        }
        
        // $thumb ='http://localhost/PHP%20Master/project/ismart.com/MVC/public/uploads/products/'.$request->file->getClientOriginalName();

        Product::where('id', $id)->update([
            'product_name' => $request->input('product_name'),
            'product_thumb' => $thumb,
            'product_desc' => $request->input('product_desc'),
            'product_content' => $request->input('product_content'),
            'price' => $request->input('price'),
            'cat_title' => $request->input('cat_title'),
        ]);

        return redirect('admin/product/list')->with('status', 'Đã cập nhật sản phẩm thành công !!!');
    }

    function delete($id)
    {
        // return $id;

        $users = Product::find($id)
        ->delete();
        return redirect('admin/product/list')->with('status', 'Bạn đã xóa sản phẩm thành công !!!');
    }

    function list(Request $request)
    {
        


        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa tạm thời'
        ];
        if($status == 'trash'){
            $list_act = [
                'force_delete' => 'Xóa vĩnh viễn',
                'restore' =>'Khôi phục',
            ];
            $products = Product::onlyTrashed()->paginate(10);
            
        }else{
            $keyword = '';
            if($request->input('keyword')){
                $keyword = $request->input('keyword');
            }
            $products = Product::orderBy('updated_at','desc')->where('product_name' , 'LIKE' , "%$keyword%")->paginate(10);
        }

        $count_active = Product::Count()->count();
        $count_trash = Product::onlyTrashed()->count();

        // $products = Product::orderBy('updated_at','desc')->paginate(10);



        $count = [$count_active,$count_trash];



       


    
        return view('admin.product.list' , compact('products' , 'count' , 'list_act' , 'status'));
    }

    function cat()
    {
        $folder = Products_folders::all();

        $list_folder = [
            'phone' => "Điện thoại",
            'iphone' => "--Iphone",
            'samsung' => "--SamSung",
            'plug'=> "---Cáp sạc",
            'laptop' => "Máy tính bảng",
            'macbook' => "--MacBook",
            'dell' => "--Laptop Dell",
            'headphone' => "Tai nghe",
            'airpods' => "--Airpods Pro",
            'watch' => "Đồng hồ",
            'applewatch' => "--AppleWatch",
             
        ];
        return view('admin.product.cat' , compact('list_folder' , 'folder'));
    }


    function edit($id)
    {
    
        $list_title = [
            'iphone' => 'Iphone',
            'samsung' => 'SamSung',
            'watch' => 'AppleWatch',
   
        ];

        $list_cat_id = [
            '1' => 'Iphone',
            '2' => 'SamSung',
            '3' => 'Laptop',

        ];

        $products = Product::find($id);
        return view('admin.product.edit', compact('products', 'list_title' , 'list_cat_id'));
    }


    function action(Request $request){
      

        $list_check = $request->input('list_check');

      

        if($list_check){
           
            if(!empty($list_check)){
                $act = $request->input('act');
                // dd($act);

                if($act == 'delete'){
                  
                    Product::destroy($list_check);
                    return redirect('admin/product/list')->with('status' ,'Đã xóa sản phẩm thành công !!!');
                }
                if($act == 'restore'){
                    Product::withTrashed()
                    ->whereIn('id' ,$list_check)
                    ->restore();
                    return redirect('admin/product/list')->with('status' ,'Đã khôi phục sản phẩm thành công !!!');

                }

                if($act == 'force_delete'){
                    Product::withTrashed()
                    ->whereIn('id' , $list_check)
                    ->forceDelete();
                    return redirect('admin/product/list')->with('status' ,'Đã xóa vĩnh viễn sản phẩm thành công !!!');

                }
                return redirect('admin/product/list')->with('status' ,'Bạn phải chọn 1 trong những thao tác trên');
                
            }
           
        }
        else{
            return redirect('admin/product/list')->with('status' ,'Mời bạn chọn lại !!!');
        }
       

    }

    function add_folder(Request $request){

        Products_folders::create([
            'folder_name' => $request->input('folder_name'),
            'folder_parent' => $request->input('folder_parent'),
            'slug' => $request->input('slug'),
           
        ]);

        return redirect('admin/product/list/cat')->with('status', 'Đã thêm danh mục thành công !!!');


    }

    function edit_folder_product($id){
        $list_folder = [
            'phone' => "Điện thoại",
            'laptop' => "Máy tính bảng",
            'headphone' => "Tai nghe",
            'plug' => "Cắm sạc điện thoại",
            'watch' => "Đồng hồ",
             
        ];

        $folder = Products_folders::find($id);
        return view('admin.product.edit_folder_product' , compact('list_folder' ,'folder'));
    }

    function update_folder_product($id , Request $request){

        Products_folders::where('id', $id)->update([
            'folder_name' => $request->input('folder_name'),
            'folder_parent' => $request->input('folder_parent'),
            'slug' => $request->input('slug'),
           
        ]);

        return redirect('admin/product/list/cat')->with('status', 'Đã cập nhật danh mục thành công !!!');

    }

    function delete_folder_product($id){
        $folder = Products_folders::find($id)
        ->delete();

        return redirect('admin/product/list/cat')->with('status', 'Đã xóa danh mục thành công !!!');


    }

    function detail($id){
        return view('admin.product.detail' , compact('id'));
    }


    function detail_product($id){
        $products = Product::find($id);

        return view('admin.product.detail_product' , compact('products'));
    }

    
}
