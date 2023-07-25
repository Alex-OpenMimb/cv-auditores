<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use App\Models\Post;
use App\Traits\HandlerTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use HandlerTrait;

    public function index($slug = null)
    {
        $post = $slug ? Post::active()->slug($slug) : Post::active()->orderBy('id','desc');

        return view('webSite.blog', [
            'post'  => $post->first(),
            'posts' => Post::active()->handlerNotPost([$post->first()['id']])->latest()->take(10)->orderBy('id','desc')->get(),
        ]);
    }

    public function saveComment(Request $request, $id)
    {

        $data                   = $request->only('name','email');
        $data['description']    = Client::DESCRIPTION_BLOG;
        $client                 = $this->handlerClient($request->email, $data);

        $comment = Comment::create([
            'description'   => $request->description,
            'post_id'       => $id,
            'client_id'     => $client->id,
            'status'        => 'DESACTIVADO',
        ]);

        return redirect()->back()->with('success','Comentario guardado con exito');
    }
}
