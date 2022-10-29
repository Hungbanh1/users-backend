<?php

namespace App\Http\Controllers;

use App\Post;
use App\Posts_folders;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'post']);
            return $next($request);
        });
    }
    function add()
    {
        // return "ok";
        $list_cat_post = [
            'world' => 'Thế giới',
            'sport' => 'Thể thao',
            'life' => 'Đời sống',
            'technology' => 'Công nghệ',
            'funny' => 'Ăn và chơi'

        ];
        return view('admin.post.add', compact('list_cat_post'));
    }

    function list(Request $request)
    {

        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa tạm thời'
        ];
        // dd($status);
        if ($status == 'trash') {
            $list_act = [
                'force_delete' => 'Xóa vĩnh viễn',
                'restore' => 'Khôi phục',
            ];
            $posts = post::onlyTrashed()->paginate(10);
        } else {
            $keyword = '';
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            $posts = post::orderBy('updated_at', 'desc')->where('page_title', 'LIKE', "%$keyword%")->paginate(10);
        }

        $count_active = Post::Count()->count();
        $count_trash = post::onlyTrashed()->count();


        $count = [$count_active, $count_trash];



        return view('admin.post.list', compact('posts', 'count', 'list_act', 'status'));
    }

    function cat()
    {
        $folder = Posts_folders::all();

        $list_folder = [
            'life' => "Đời sống",
            'parent' => "--Bậc cha mẹ",
            'children' => "---Con cái",
            'society' => "Xã hội",
            'sport' => "Thể thao",
            'footbal' => "--Bóng đá",
            'politics' => "Chính trị",
            'star' => "Ngôi sao",
            'US_UK' => '--US-UK',
            'rap' => '---Rapper',
            'vietnam' => '---VietMucsic'

        ];
        return view('admin.post.cat', compact('list_folder', 'folder'));
    }


    // add bài viết (here)
    function store(Request $request)
    {

        $request->validate(
            [
                'page_title' => ['required', 'string', 'max:255'],
                'page_content' => ['required', 'string', 'max:255'],
                'cat_title'  => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],

            ],

            [
                'required' => ':attribute không được để trống !!!',
                'max' => ':attribute có độ dài tối đa :max kí tự !!!',
                'min' => ':attribute có độ dài tối thiểu :min kí tự !!!',
                'confirmed' => 'Xác nhận mật khẩu không thành công , vui lòng check lại !!!'
            ],

            [
                'page_title' => 'Tên bài viết',
                'page_content' => 'Nội dung bài viết',
                'slug' => 'Slug',
                'cat_title' => "Danh mục sản phẩm"
            ]
        );


        // dd($request->page_thumb1->getClientOriginalName());
        if ($request->hasFile('page_thumb1')) {

            $file = $request->page_thumb1;

            $thumb_1 = $file->move('public/uploads/posts', $file->getClientOriginalName());
        };

        // dd($request->all());
        if ($request->hasFile('page_thumb2')) {
            $file = $request->page_thumb2;
            // public_path();
            $thumb_2 = $file->move('public/uploads/posts', $file->getClientOriginalName());
            // return $thumb_2;
        }


        $post = new Post;
        $post->page_title = $request->input('page_title');
        $post->page_content = $request->input('page_content');
        $post->page_thumb1 = $thumb_1;
        $post->page_thumb2 =  $thumb_2;
        $post->cat_title = $request->input('cat_title');
        $post->save();


        return redirect('admin/post/list')->with('status', 'Đã thêm bài viết thành công !!!');
    }

    function edit($id)
    {

        $list_cat_post = [
            'world' => 'Thế giới',
            'sport' => 'Thể thao',
            'life' => 'Đời sống',
            'technology' => 'Công nghệ',
            'funny' => 'Ăn và chơi'

        ];

        $posts = post::find($id);
        return view('admin.post.edit', compact('posts', 'list_cat_post'));
    }

    function update(Request $request, $id)
    {

        // return "ok";
        $request->validate(
            [
                'page_title' => ['required', 'string', 'max:255'],
                'page_content' => ['required', 'string', 'max:255'],
                'cat_title'  => ['required', 'string', 'max:255'],

            ],

            [
                'required' => ':attribute không được để trống !!!',
                'max' => ':attribute có độ dài tối đa :max kí tự !!!',
                'min' => ':attribute có độ dài tối thiểu :min kí tự !!!',
                'confirmed' => 'Xác nhận mật khẩu không thành công , vui lòng check lại !!!'
            ],

            [
                'page_title' => 'Tên bài viết',
                'page_content' => 'Nội dung bài viết',

                'cat_title' => "Danh mục sản phẩm"
            ]
        );

        if ($request->hasFile('page_thumb1')) {

            $file = $request->page_thumb1;

            $thumb_1 = $file->move('public/uploads/posts', $file->getClientOriginalName());
        };

        // dd($request->all());
        if ($request->hasFile('page_thumb2')) {
            $file = $request->page_thumb2;
            // public_path();
            $thumb_2 = $file->move('public/uploads/posts', $file->getClientOriginalName());
            // return $thumb_2;
        }


        // dd($request->page_thumb1->getClientOriginalName());
        // dd($thumb_1);
        Post::where('id', $id)->update([
            'page_thumb1' => $thumb_1,
            'page_thumb2' => $thumb_2,
            'page_title' => $request->input('page_title'),
            'page_content' => $request->input('page_content'),
            'cat_title' => $request->input('cat_title'),

        ]);


        return redirect('admin/post/list')->with('status', 'Đã cập nhật bài viết thành công !!!');
    }

    function delete($id)
    {
        // return $id;

        $users = Post::find($id)
            ->delete();
        return redirect('admin/post/list')->with('status', 'Bạn đã xóa bài viết thành công !!!');
    }

    function add_folder_post(Request $request)
    {
        //  return "ok";
        Posts_folders::create([
            'folder_name' => $request->input('folder_name'),
            'folder_parent' => $request->input('folder_parent'),
            'slug' => $request->input('slug'),

        ]);

        return redirect('admin/post/list/cat')->with('status', 'Đã thêm danh mục thành công !!!');
    }

    function edit_folder_post($id)
    {
        $list_folder = [
            'life' => "Đời sống",
            'society' => "Xã hội",
            'sport' => "Thể thao",
            'politics' => "Chính trị",
            'star' => "Ngôi sao",

        ];

        $folder = Posts_folders::find($id);
        return view('admin.post.edit_folder_post', compact('list_folder', 'folder'));
    }

    function update_folder_post($id, Request $request)
    {
        // return "qua day ok ";
        Posts_folders::where('id', $id)->update([
            'folder_name' => $request->input('folder_name'),
            'folder_parent' => $request->input('folder_parent'),
            'slug' => $request->input('slug'),

        ]);

        return redirect('admin/post/list/cat')->with('status', 'Đã cập nhật danh mục thành công !!!');
    }

    function delete_folder_post($id)
    {
        // return "ok";
        $folder = Posts_folders::find($id)
            ->delete();

        return redirect('admin/post/list/cat')->with('status', 'Đã xóa danh mục thành công !!!');
    }

    function action(Request $request)
    {


        $list_check = $request->input('list_check');



        if ($list_check) {

            if (!empty($list_check)) {
                $act = $request->input('act');
                // dd($act);

                if ($act == 'delete') {

                    post::destroy($list_check);
                    return redirect('admin/post/list')->with('status', 'Đã xóa bài viết thành công !!!');
                }
                if ($act == 'restore') {
                    post::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/post/list')->with('status', 'Đã khôi phục bài viết thành công !!!');
                }

                if ($act == 'force_delete') {
                    post::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/post/list')->with('status', 'Đã xóa vĩnh viễn bài viết thành công !!!');
                }
                return redirect('admin/post/list')->with('status', 'Bạn phải chọn 1 trong những thao tác trên');
            }
        } else {
            return redirect('admin/post/list')->with('status', 'Mời bạn chọn lại !!!');
        }
    }


    function detail($id)
    {
        // return $id;
        return view('admin.post.detail', compact('id'));
    }
}
