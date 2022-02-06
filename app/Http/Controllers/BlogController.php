<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class BlogController extends Controller
{

    /**
     * Get all Blog.
     * @return Object

     */
    public function index(): object
    {
        $blogs = Blog::all();

        return response()->json(['blog' => $blogs, 'message' => 'OK'], 200);
    }

    /**
     * Create Blog.
     * @param Request $request
     * @return Object
     */
    public function create(Request $request): object
    {
        //validate incoming request
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        try {

            $blog = new Blog;
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->user_id = Auth::user()->id;

            $blog->save();

            //return successful response
            return response()->json(['blog' => $blog, 'message' => 'Blog Created'], 201);

        } catch (\Exception$e) {
            //return error message
            return response()->json(['message' => 'Blog Creation Failed!'], 409);
        }

    }

    /**
     * Get one Blog.
     * @param Int $id
     * @return Object
     */
    public function show(int $id): object
    {
        $blog = Blog::find($id);

        return response()->json(['blog' => $blog, 'message' => 'OK'], 200);
    }

    /**
     * Update Blog.
     * @param Request $request
     * @param Int  $id
     * @return Object

     */
    public function update(Request $request, int $id): object
    {

        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        try {
            $blog = Blog::find($id);

            if (!$blog) {return response()->json(['message' => 'Not Found'], 404);}

            $blog->title = $request->title;
            $blog->description = $request->description;

            $blog->save();

            return response()->json(['blog' => $blog, 'message' => 'OK'], 200);
        } catch (\Exception$e) {

            return response()->json(['message' => 'Blog Update Failed!'], 409);
        }

    }
    /**
     * Delete Blog.
     * @param Int $id
     * @return Object
     */
    public function destroy(int $id): object
    {

        try {

            $blog = Blog::find($id);
            $blog->delete();
            return response()->json(['message' => 'OK'], 200);

        } catch (\Exception$e) {

            return response()->json(['message' => 'Blog Delete Failed!'], 409);
        }

    }

}
