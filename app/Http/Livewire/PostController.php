<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentResponse;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;


class PostController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';//poder utilizar la paginación en laravel 8

    public $pagination = 10, $search, $action = 1, $edit = 1, $component = 'post';
    public $name, $post, $description, $image, $user_id = 'Elegir', $users, $status = 'Elegir', $selected_id;
    public $comment;

    public function mount(){
        $this->url      = Route::current()->getName();
        $this->users    = User::admin()->active()->orderBy('name')->get();
    }

    public function render()
    {
        try {
            if ($this->search) {
                $posts = Post::Search($this->search);
            }else{
                $posts = Post::orderBy('id','desc');
            }
            return view('livewire.post.component',[
                'posts'  => $posts->paginate($this->pagination),
            ])->extends('layouts.dashboard')->section('content');
        } catch (\Exception $e) {
           return $e;
        }
    }

    //permite la búsqueda cuando se navega entre el paginado
    public function updatingSearch(){
        $this->gotoPage(1);
    }

    public function handleAction($action)
    {
        $this->handleReset($action);
    
    }

    public function handleReset($action)
    {
        $this->name             = '';
        $this->post             = null;
        $this->comment          = null;
        $this->description      = '';
        $this->user_id          = 'Elegir';
        $this->count            = 1;
        $this->action           = $action;
        $this->edit             = 1;
        $this->selected_id      = null;
        $this->image            = null;
        $this->status           = 'Elegir';
        $this->emit('clearCkEditor');
        $this->emit('initializeCkEditor');
    }

    public function StoreOrUpdate($action)
    {
        try {
            $this->validate([
                    'description'           => 'bail|required|min:3|max:10000|string',
                    'name'                  => 'bail|required|string|min:3|max:255|unique:posts,name,'.$this->selected_id,
                    'image'                 => 'bail|nullable|image|max:4112',
                    'user_id'               => 'bail|required|not_in:Elegir',
                    'status'                => 'bail|required|not_in:Elegir',
                ],
                [
                    'name.unique'           => 'El nombre ya se encuentra registrado',
                ]
            );

            $find = [
                'id'  => $this->selected_id,
            ];     
            $data = [
                'name'              => $this->name,
                'description'       => $this->description,
                'slug'              => strtr($this->name, " ", "-"),
                'user_id'           => $this->user_id,
                'status'            => $this->status,
            ];
            
            //  dd($data);
            
            if ($this->selected_id) {
                $updateOrCreate = 'actualizado';
            }else{
                $updateOrCreate = 'creado';
            }

            $post = Post::updateOrCreate($find, $data);

            if ($this->image) {
                $image      = $this->image;
                $fileName   = time() . '.' . $image->getClientOriginalExtension();
                $moved      = \Image::make($image)->save('image/post/'.$fileName);
                if ($moved) {
                    $post->image = $fileName;
                    $post->save();
                }
            }

            $this->emit('msgok','El post '.$post->name.', ha sido '.$updateOrCreate);
            $this->emit('modalsClosed', $this->component.'-component');
            
        } catch (\Exception $e) {
            $this->emit('msg-error', $e->getMessage());
        }

        $this->handleReset($action);

        
    }

    public function edit(Post $post, $action, $edit = 2)
    {

    	$this->post             = $post;
    	$this->selected_id      = $post->id;
    	$this->name             = $post->name;
    	$this->description      = $post->description;
    	$this->status           = $post->status;
    	$this->user_id          = $post->user_id;
    	$this->edit             = $edit;
    	$this->action           = $action;
        $this->image            = null;
        $this->emit('clearCkEditor', $this->description);
        $this->emit('initializeCkEditor');

        // $this->emit('clearCkEditor');
    }

    public function editCommentResponse(Comment $comment, Post $post, $action)
    {
        $this->edit($post, $action, 3);
    	$this->comment = $comment;
    }

    protected $listeners = [
        'handleDelete',
        'handleDeleteComment',
        'handlerStatusComment',
        'handleDeleteCommentResponse',
        'addCommentResponse'
    ];

    public function handleDelete(Post $post, $action ){
        $post->delete();
        $post->comments()->delete();
        $this->emit('msgok','Post '.$post->name.', ha sido eliminado');
        $this->handleReset($action);
    }

    public function handleDeleteComment(Comment $comment, Post $post, $action){
        $comment->delete();
        $comment->commentResponses()->delete();
        $this->emit('msgok','El comentario ha sido eliminado');
        $this->edit($post, $action, 2);
    }

    public function handleDeleteCommentResponse(CommentResponse $comment, Post $post, $action){
        $comment->delete();
        $this->emit('msgok','El comentario ha sido eliminado');
        $this->edit($post, $action, 2);
    }

    public function handlerStatusComment(Comment $comment, Post $post, $action){
        $comment->update([
            'status' => $comment->status == 'ACTIVO' ? 'DESACTIVADO':'ACTIVO'
        ]);
        $this->emit('msgok','El comentario ha sido actualizado');
        $this->edit($post, $action, 2);
    }

    public function addCommentResponse($comment_id, $description, Post $post, $action){
        CommentResponse::create([
            'comment_id'    => $comment_id,
            'user_id'       => Auth::user()->id,
            'description'   => $description,
        ]);
        $this->emit('msgok','Se ha agregado una respuesta a un comentario');
        $this->edit($post, $action, 2);
    }

   

    
}
