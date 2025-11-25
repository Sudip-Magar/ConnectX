<?php

namespace App\Livewire\Menus;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Media;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post as modelPost;

class Post extends Component
{
    use WithFileUploads;
    public $images, $content, $comment = [];

    public function createPost()
    {
        DB::beginTransaction();
        try {
            $post = modelPost::create([
                'user_id' => Auth::guard('web')->user()->id,
                'content' => $this->content
            ]);
            if ($this->images) {
                $image = $this->images->store('posts', 'public');
                Media::create([
                    'post_id' => $post->id,
                    'media' => $image,
                ]);
            }

            DB::commit();
            session()->flash('success', 'Post Creation Successfull');
            return redirect()->route('home');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
        }
    }

    public function createComment($id)
    {
        DB::beginTransaction();
        try {
            $comment = Comment::create([
                'user_id' => Auth::guard('web')->user()->id,
                'post_id' => $id,
                'content' => $this->comment[$id],
            ]);
            $post = modelPost::where('id', $comment->post_id)->first();
            // dd($post);
            Notification::create([
                'user_id' => $post->user_id,
                'type' => 'comment',
                'post_id' => $id,
                'comment_id' => $comment->id,
                'by' => Auth::guard('web')->user()->id
            ]);

            DB::commit();
            $this->comment[$id] = '';
        } catch (\Exception $e) {
            DB::rollBack();
            // session()->flash('error', 'something went wrong');
            dd($e);
        }
    }

    public function likePost($id)
    {
        DB::beginTransaction();
        try {
            $userId = Auth::guard('web')->user()->id;
            $isLikeExist = Like::where('post_id', $id)->where('user_id', $userId)->first();
            if ($isLikeExist) {
                $isLikeExist->delete();
                DB::commit();
            } else {
                $like = Like::create([
                    'user_id' => $userId,
                    'post_id' => $id,
                ]);
                $post = modelPost::where('id', $like->post_id)->first();

                Notification::create([
                    'user_id' => $post->user_id,
                    'type' => 'like',
                    'post_id' => $id,
                    'by' => auth()->id(),
                ]);
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.menus.post', [
            'user' => Auth::guard('web')->user(),
            'posts' => modelPost::with('likes', 'comments', 'media', 'user')->latest()->get(),
        ]);
    }
}
