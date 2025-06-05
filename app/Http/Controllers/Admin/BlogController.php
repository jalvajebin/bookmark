<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\LeaveComment;
use App\Models\MultipleBlogCategory;
use App\Models\MultipleBlogTag;
use App\Models\Seo;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $seo = Seo::where('page', 'blog')->first();
        $blogs = Blog::orderBy('priority', 'ASC')->get();
        $tagLoops = Tag::orderBy('id', 'DESC')->where('status', 1)->get();
        $tags = Tag::orderBy('id', 'DESC')->get();
        $categories = BlogCategory::orderBy('id', 'DESC')->get();
        if ($request->ajax()) {
            $blogHtml = view('admin.blog.blogResult', compact('blogs'))->render();
            $categoryHtml = view('admin.blog.categoryResult', compact('categories'))->render();
            $tagHtml = view('admin.blog.tagResult', compact('tags'))->render();
            return response()->json([
                'status' => true,
                'message' => 'Render Sucessfully',
                'blogHtml' => $blogHtml,
                'categoryHtml' => $categoryHtml,
                'tagHtml' => $tagHtml,
            ]);
        }
        return view('admin.blog.index', compact('blogs', 'categories', 'tags', 'tagLoops','seo'));
    }


    public function create(Request $request)
    {
        $tagLoops = Tag::orderBy('id', 'DESC')->where('status', 1)->get();
        $categories = BlogCategory::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('admin.blog.create', compact('categories', 'tagLoops'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:100',
                'main_image' => 'required|image|max:2048',
                'inner_image' => 'required|image|max:2048',
                'author' => 'required|max:100',
                'date' => 'required',
                'tag_ids' => 'required',
                'category_ids' => 'required',
                'description' => 'required',
            ],
            [
                'tag_ids.required' => 'The tag field is required.',
                'category_ids.required' => 'The category field is required.',
            ]
        );

        $blog = new Blog();
        $blog->title = $request->input('title');
        // $blog->priority = $request->input('priority');
        $blog->author = $request->input('author');
        $blog->date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $blog->description = $request->input('description');
        $blog->status = 1;
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_keyword = $request->input('meta_keyword');
        $blog->meta_description = $request->input('meta_description');
        $blog->alt = $request->input('alt');
        if ($request->hasFile('main_image')) {
            $blog->addMediaFromRequest('main_image')->toMediaCollection('main_images');
        }
        if ($request->hasFile('inner_image')) {
            $blog->addMediaFromRequest('inner_image')->toMediaCollection('inner_images');
        }
        $store = $blog->save();

        $tag_id = $request->tag_ids;
        $category_id = $request->category_ids;

        if ($tag_id) {
            foreach ($tag_id as $key => $value) {
                MultipleBlogTag::create([
                    'tag_id' => $value,
                    'blog_id' => $blog->id,
                ]);
            }
        }

        if ($category_id) {
            foreach ($category_id as $key => $value) {
                MultipleBlogCategory::create([
                    'category_id' => $value,
                    'blog_id' => $blog->id,
                ]);
            }
        }

        if ($store == true) {
            $title = "Added";
            $message = "Added Successfully";
            $icon = "success";
            $status = true;
            cache('blog_success', true);
        } else {
            $title = "Failed";
            $message = "Something Went Wrong";
            $icon = "danger";
            $status = false;
        }

        return response()->json([
            'title' => $title,
            'message' => $message,
            'icon' => $icon,
            'status' => $status,
        ]);
    }


    public function storeTag(Request $request)
    {
        $request->validate([
            'tag_title' => 'required',
        ]);

        $tag = new Tag();
        $tag->tag_title_en = $request->input('tag_title');
        $tag->status = 1;
        $store = $tag->save();

        if ($store == true) {
            $title = "Added";
            $message = "Added Successfully";
            $icon = "success";
            $status = true;
        } else {
            $title = "Failed";
            $message = "Something Went Wrong";
            $icon = "danger";
            $status = false;
        }

        return response()->json([
            'title' => $title,
            'message' => $message,
            'icon' => $icon,
            'status' => $status,
        ]);
    }

    public function editTag($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'edit list',
            'data' => $tag
        ]);
    }

    public function updateTag(Request $request)
    {
        $message = "You Have Made No Changes To Save";
        $status = false;

        $request->validate([
            'tag_title' => 'required',
        ]);

        $id = $request->tag_id;
        $tag = Tag::findOrFail($id);
        $tag->tag_title_en = $request->input('tag_title');
        $tag->save();
        if ($tag->wasChanged()) {
            $message = "You Have Successfully Updated";
            $status = true;
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function destroyTag($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $blog = Blog::findOrFail($id);

        if ($blog->status == 1) {
            $blog->status = 0;
        } else {
            $blog->status = 1;
        }
        $blog->save();
        return response()->json([
            'status' => 'Successfully Changed Status'

        ]);
    }

    public function changeStatusTag(Request $request)
    {
        $id = $request->id;
        $warehouse = Tag::findOrFail($id);

        if ($warehouse->status == 1) {
            $warehouse->status = 0;
        } else {
            $warehouse->status = 1;
        }
        $warehouse->save();
        return response()->json([
            'status' => 'Successfully Changed Status'

        ]);
    }



    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_title' => 'required',
        ]);

        $category = new BlogCategory();
        $category->title_en = $request->input('category_title');
        $category->status = 1;
        $store = $category->save();

        if ($store == true) {
            $title = "Added";
            $message = "Added Successfully";
            $icon = "success";
            $status = true;
        } else {
            $title = "Failed";
            $message = "Something Went Wrong";
            $icon = "danger";
            $status = false;
        }

        return response()->json([
            'title' => $title,
            'message' => $message,
            'icon' => $icon,
            'status' => $status,
        ]);
    }

    public function editCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'edit list',
            'data' => $category
        ]);
    }

    public function updateCategory(Request $request)
    {
        $message = "You Have Made No Changes To Save";
        $status = false;

        $request->validate([
            'category_title' => 'required',
        ]);

        $id = $request->category_id;
        $category = BlogCategory::findOrFail($id);
        $category->title_en = $request->input('category_title');
        $category->save();
        if ($category->wasChanged()) {
            $message = "You Have Successfully Updated";
            $status = true;
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function changeStatusCategory(Request $request)
    {
        $id = $request->id;
        $category = BlogCategory::findOrFail($id);
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->save();
        return response()->json([
            'status' => 'Successfully Changed Status'

        ]);
    }

    public function destroyCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $tags = Tag::orderBy('id', 'DESC')->where('status', 1)->get();
        $categories = BlogCategory::orderBy('id', 'DESC')->where('status', 1)->get();
        $multipleTags = MultipleBlogTag ::orderBy('id', 'DESC')->get();
        $multipleCategory = MultipleBlogCategory ::orderBy('id', 'DESC')->get();
        return view('admin.blog.edit', compact('blog', 'tags', 'categories', 'multipleTags', 'multipleCategory'));
    }


    public function update(Request $request)
    {
        $message = "You Have Made No Changes To Save";
        $status = false;

        $request->validate([
            'title' => 'required|max:100',
            'main_image' => 'max:2048|image',
            'inner_image' => 'max:2048|image',
            'author' => 'required|max:100',
            'tag_ids' => 'required',
            'category_ids' => 'required',
            'description' => 'required',
        ],
        [
            'tag_ids.required' => 'The tag field is required.',
            'category_ids.required' => 'The category field is required.',
        ]);

        $id = $request->blog_id;
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        // $blog->priority = $request->input('priority');
        $blog->author = $request->input('author');
        $blog->date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $blog->description = $request->input('description');
        $blog->status = 1;
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_keyword = $request->input('meta_keyword');
        $blog->meta_description = $request->input('meta_description');
        $blog->alt = $request->input('alt');
        if ($request->hasFile('main_image')) {
            $blog->clearMediaCollection('main_images');
            $blog->addMediaFromRequest('main_image')->toMediaCollection('main_images');
            $message = "You Have Successfully Updated";
            $status = true;
            $title = "Added";
            $icon = "success";
        }
        if ($request->hasFile('inner_image')) {
            $blog->clearMediaCollection('inner_images');
            $blog->addMediaFromRequest('inner_image')->toMediaCollection('inner_images');
            $message = "You Have Successfully Updated";
            $status = true;
            $title = "Added";
            $icon = "success";
        }
        $blog->save();

        $tag_id = $request->tag_ids;
        $category_id = $request->category_ids;

        if ($tag_id) {
            MultipleBlogTag::where('blog_id', $id)->delete();
            foreach ($tag_id  as $key => $value) {
                MultipleBlogTag::create([
                    'tag_id' => $value,
                    'blog_id' => $id,
                ]);
                $message = "you have successfully updated";
                $status = true;
                $title = "Added";
                $icon = "success";
            }
        }

        if ($category_id) {
            MultipleBlogCategory::where('blog_id', $id)->delete();
            foreach ($category_id  as $key => $category) {
                MultipleBlogCategory::create([
                    'category_id' => $category,
                    'blog_id' => $id,
                ]);
                $message = "you have successfully updated";
                $status = true;
                $title = "Added";
                $icon = "success";
            }
        }

        if ($blog->wasChanged()) {
            $message = "You Have Successfully Updated";
            $status = true;
            $title = "Added";
            $icon = "success";
        }

        return response()->json([
            'title' => $title,
            'message' => $message,
            'icon' => $icon,
            'status' => $status,
        ]);
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        MultipleBlogTag::where('blog_id', $id)->delete();
        MultipleBlogCategory::where('blog_id', $id)->delete();
        $blog->clearMediaCollection('main_images');
        $blog->clearMediaCollection('inner_images');
        $blog->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }

    public function getBlogComment()
    {
        $comment = LeaveComment::orderBy('id', 'DESC')->get();

        return DataTables::of($comment)
            ->addColumn('blog_title', function ($data) {
                return optional($data->blog)->title; 
            })
            ->addIndexColumn()
            ->make(true);
        
    }

    public function changeCommentStatus(Request $request)
    {
        $comment  = LeaveComment::query()->where('id', $request->id)->first();

        if (!isset($comment)) {
            return response()->json(['success' => false, 'message' => "not found!"]);
        }

        $comment->status = $request->status == 1 ? 0 : 1;
        $comment->save();

        return response()->json(['success' => true, 'message' => "Status Changed"]);
    }

    public function blogCommentDelete(Request $request)
    {
        $comment  = LeaveComment::whereIn('id', $request->ids)->get();

        if (!isset($comment)) {
            return response()->json(['success' => false, 'message' => "not found!"]);
        }

        $comment->each(function ($data) {
            $data->delete();
        });

        return response()->json(['success' => true, 'message' => "Deleted."]);
    }

}
