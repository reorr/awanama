<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string', 'max:200'],
        ]);

        $content = $request['content'];
        $user_id = $request['userid'];

        // Post::create([
        //     'user_id' => $request['userid'],
        //     'content' => $request['content'],
        //     'created_at' => now(),
        // ]);

        $post = new Post();
        $post->user_id = $user_id;
        $post->content = $content;
        $post->created_at = now();
        $post->save();
        $post_id = $post->id;
        // dd($post_id);


        function getHashtags($string, $post_id) {
            $hashtags= FALSE;
            preg_match_all("/(#\w+)/u", $string, $matches);
            if ($matches) {
                $hashtagsArray = array_count_values($matches[0]);
                $hashtags = array_keys($hashtagsArray);
            }
            // return $hashtags;
            // $post_id = \DB::table('posts')->insertGetId([
            //     'user_id' => $user_id,
            //     'content' => $content
            // ]);
            foreach($hashtags as $hashtag){
                Tag::create([
                    'post_id' => $post_id,
                    'title' => $hashtag,
                    'created_at' => now(),
                ]);
            }
        }

        getHashtags($content, $post_id);

        return redirect(\Auth::user()->username);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        // dd(\Auth::user());
        return redirect(\Auth::user()->username);
    }
}
