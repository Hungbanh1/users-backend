<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' => 'page']);
            return $next($request);
        });
    }
    function add(){
        // return "ok";
        return view('admin.page.add');
    }

    function store(Request $request)
    {

        // return "ok";
        // $request -> input('cat_title');

        // return $request;
        $request->validate(
            [
                // tạo điều kiện
                'cat_title' => ['required', 'string', 'max:255'],
                'page_content' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                
            ],

            //chú thích key word
            [
                'required' => ':attribute không được để trống !!!',
                'max' => ':attribute có độ dài tối đa :max kí tự !!!',
                'min' => ':attribute có độ dài tối thiểu :min kí tự !!!',
                'confirmed' => 'Xác nhận mật khẩu không thành công , vui lòng check lại !!!'
            ],

            [
                'cat_title' => 'Tiêu đề trang',
                'page_content' => 'Ảnh trang',
                'slug' => 'Slug',
              
            ]
        );
        if($request->hasFile('file')){
            // echo "có file";
            $file = $request->file;
            // dd($file);



            $thumb= $file->move('public/uploads/pages',$file->getClientOriginalName());
            // dd($thumb);
            
            // dd($thumb1);
            
            
            // // $path = $file->move('public/uploads' , $file->getClientOriginalName());
            
        }
        // dd($request->all());
        // $page = Page::all();
        // dd($page);
        $page = new Page;
        $page->page_thumb = $thumb;
        $page->cat_title = $request->input('cat_title');
        $page->slug = $request->input('slug');
        $page->page_content = $request->input('page_content');

        $page->save();

        return redirect('admin/page/list')->with('status', 'Đã thêm trang thành công !!!');
    }

        function list(Request $request)
        {
            
            $pages = page::all();
    
    
            $status = $request->input('status');
    
            $list_act = [
                'delete' => 'Xóa tạm thời'
            ];
            // dd($status);
            if($status == 'trash'){
                $list_act = [
                    'force_delete' => 'Xóa vĩnh viễn',
                    'restore' =>'Khôi phục',
                ];
                $pages = page::onlyTrashed()->paginate(10);
                
            }else{
                $keyword = '';
                if($request->input('keyword')){
                    $keyword = $request->input('keyword');
                }
                $pages = page::orderBy('updated_at','desc')->where('cat_title' , 'LIKE' , "%$keyword%")->paginate(10);
            }
    
            $count_active = page::Count()->count();
            $count_trash = page::onlyTrashed()->count();
    
            $count = [$count_active,$count_trash];
            return view('admin.page.list' , compact('pages' , 'count' , 'list_act' , 'status'));
        }

    function cat(){
        return view('admin.page.list');

    }

    function delete($id){
        $pages = Page::find($id)
        ->delete();

        return redirect('admin/page/list')->with('status', 'Bạn đã xóa thành công !!!');

    }

    function edit($id)
    {
        

        $pages = page::find($id);
        return view('admin.page.edit', compact('pages'));
    }


    function update(Request $request, $id){
        $request->validate(
            [
                // tạo điều kiện
                'cat_title' => ['required', 'string', 'max:255'],
                'page_content' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                
            ],

            //chú thích key word
            [
                'required' => ':attribute không được để trống !!!',
                'max' => ':attribute có độ dài tối đa :max kí tự !!!',
                'min' => ':attribute có độ dài tối thiểu :min kí tự !!!',
                'confirmed' => 'Xác nhận mật khẩu không thành công , vui lòng check lại !!!'
            ],

            [
                'cat_title' => 'Tiêu đề trang',
                'page_content' => 'Ảnh trang',
                'slug' => 'Slug',
              
            ]
        );

        if($request->hasFile('file')){
            // echo "có file";
            $file = $request->file;
            // $file_name =  $file->getClientOriginalName();
            // // echo $file->getClientOriginalExtension();

            $thumb= $file->move('public/uploads/pages',$file->getClientOriginalName());

            // $path = $file->move('public/uploads' , $file->getClientOriginalName());

            // $thumb ='http://localhost/PHP%20Master/project/ismart.com/MVC/public/uploads/'.$file_name;
        }
        // $thumb = 'http://localhost/PHP%20Master/project/ismart.com/MVC/public/uploads/pages/'.$request->file;


        Page::where('id' , $id)->update([
            'page_thumb' => $thumb,
            'cat_title' => $request->input('cat_title'),
            'page_content' => $request->input('page_content'),
            'slug' => $request->input('slug'),
        ]);

        return redirect('admin/page/list')->with('status', 'Đã thêm trang thành công !!!');

    }

    function action(Request $request){
      

        $list_check = $request->input('list_check');

      

        if($list_check){
           
            if(!empty($list_check)){
                $act = $request->input('act');
                // dd($act);

                if($act == 'delete'){
                  
                    page::destroy($list_check);
                    return redirect('admin/page/list')->with('status' ,'Đã xóa  thành công !!!');
                }
                if($act == 'restore'){
                    page::withTrashed()
                    ->whereIn('id' ,$list_check)
                    ->restore();
                    return redirect('admin/page/list')->with('status' ,'Đã khôi phục thành công !!!');

                }

                if($act == 'force_delete'){
                    page::withTrashed()
                    ->whereIn('id' , $list_check)
                  ->forceDelete();
                    return redirect('admin/page/list')->with('status' ,'Đã xóa vĩnh viễn thành công !!!');

                }
                return redirect('admin/page/list')->with('status' ,'Bạn phải chọn 1 trong những thao tác trên');
                
            }
           
        }
        else{
            return redirect('admin/page/list')->with('status' ,'Mời bạn chọn lại !!!');
        }
       

    }

    function detail($id){

        $page = Page::find($id);
        return view('admin.page.detail' ,compact('page'));
    }
}
