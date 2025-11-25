<?php

namespace App\Livewire\Menus;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post as modelPost;

class Post extends Component
{
    use WithFileUploads;
    public $images, $content;

    public function createPost()
    {
        DB::beginTransaction();
        try {
            $post = modelPost::create([
                'user_id' => Auth::guard('web')->user()->id,
                'content' => $this->content
            ]);
            if($this->images){
                $image = $this->images->store('posts','public');
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
    public function render()
    {
        return view('livewire.menus.post', [
            'user' => Auth::guard('web')->user(),
            'posts' => modelPost::with('likes','comments','media','user')->inRandomOrder()->get(),
        ]);
    }
}
