<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\MultipleBlogCategory;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $searchTerm = request()->search;
        $categoryTerm = request()->category;
        $tagTerm = request()->tag;
        $blogs = Blog::query()
            ->whereDate('date', '<=', Carbon::now())
            ->where('status', 1);
        $banner = Banner::where('page', 'destination')->first();


        if ($searchTerm) {
            $blogs->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . trim($searchTerm) . '%')
                    ->orWhereHas('tags', function ($tagQuery) use ($searchTerm) {
                        $tagQuery->where('tag_title_en', 'like', '%' . trim($searchTerm) . '%');
                    });
            });
        }

        if ($categoryTerm) {
            $blogs->whereHas('categoryMultiple', function ($categoryQuery) use ($categoryTerm) {
                $categoryQuery->where('category_id', $categoryTerm);
            });
        }

        if ($tagTerm) {
            $blogs->whereHas('tagMultiple', function ($tagsQuery) use ($tagTerm) {
                $tagsQuery->where('tag_id', $tagTerm);
            });
        }

        $blogs = $blogs->orderBy('date', 'desc')->paginate(10);

        $popularPost = Blog::orderBy('id', 'DESC')->where('status', 1)->inRandomOrder()->take(8)->get();
        $blogCount = Blog::where('status', 1)->count();
        $blogRecents = Blog::where('status', '1')->latest()->get();
        $category = BlogCategory::orderBy('id', 'DESC')->where('status', 1)->inRandomOrder()->take(10)->get();
        $tags = Tag::orderBy('id', 'DESC')->where('status', 1)->inRandomOrder()->take(13)->get();
        $categories = BlogCategory::where('status', 1)->get();
        $blogs->map(function ($data) {
            $blog_category = MultipleBlogCategory::where('blog_id', $data->id)->pluck('category_id')->toArray();
            $categories = BlogCategory::whereIn('id', $blog_category)->pluck('title_en');
            $data->categories = $categories;
        });
        // $seo = Seo::where('page', 'blog')->first();
        return view('website.blog', compact('blogs', 'categories', 'popularPost', 'blogCount', 'category', 'tags', 'banner', 'blogRecents'));
    }

    public function blogDetail(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', '1')->first();
        $blogRecents = Blog::where('status', '1')->latest()->get();
        $blogCount = Blog::where('status', 1)->count();
        $categories = BlogCategory::where('status', 1)->inRandomOrder()->limit(8)->get();
        $popularPost = Blog::orderBy('id', 'DESC')->where('status', 1)->where('slug', '!=', $slug)->inRandomOrder()->limit(6)->get();
        $tags = $blog->tags()->where('status', '1')->inRandomOrder()->take(10)->get();        // $seo = Seo::where('page', 'blog')->first();
        return view('website.blog-detail', compact('blog', 'categories', 'popularPost', 'tags', 'blogCount', 'blogRecents'));
    }
}
