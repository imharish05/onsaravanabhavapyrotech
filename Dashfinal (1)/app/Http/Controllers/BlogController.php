<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::all();
        return view('pages.blog', compact('blogs'));
    }

    public function storeblog(Request $request)
    {

            $mete_title = $request->mete_title;
            $meta_des = $request->meta_des;
            $meta_key = $request->meta_key;
            $name = $request->name;
            $url1 = $request->name;
            $url =str_replace(' ', '', trim($url1));
            $feet_content = $request->feet_content;
            if ($request->hasFile('seo_image')) {
                $image = $request->file('seo_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/blogimages'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/blogimages/' . $imageName;
            } else {
                $imagePath = null;
            }

            Blog::create([

                'meta_title' => $mete_title,
                'meta_des' => $meta_des, // Make sure this column exists in your DB
                'meta_key' => $meta_key,
                'title' => $name,
                'image' => $imagePath,
                'url' => $url,
                'feet_content' => $feet_content,
            ]);

            return response()->json([
                'status' => '200',
                'message' => 'Blog  Add Successfully'
            ]);

    }

    public function updateblog(Request $request){
        $blogs = Blog::find($request->see_id);
        if (!$blogs) {
            return response()->json([
                'status' => '404',
                'message' => 'Blog not found'
            ]);
        }
        $blogs->meta_title = $request->mete_title;
        $blogs->meta_des = $request->meta_des;
        $blogs->meta_key = $request->meta_key;
        $blogs->title = $request->name;
        $blogs->feet_content = $request->feet_content;
        $blogs->url = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->name);
        if ($request->hasFile('seo_image')) {
            $image = $request->file('seo_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogimages'), $imageName); // Save to public/uploads/categories

            $blogs->image = 'uploads/blogimages/' . $imageName;
        }
        $blogs->save();
        return response()->json([
            'status' => '200',
            'message' => 'Blog updated successfully'
        ]);
    }

    public function destroy($id){
        $blog=Blog::find($id);


        if(!$blog){
            return response()->json([
                "status" => "404",
                "message" => "Blog not found",
            ]);
            }else{
                 $blog->delete();
            return response()->json([
                "status" => "200",
                "message" => "Blog deleted successfully",
            ]);
            }
    }
}