<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ListPost extends Component
{

    public $post;
    public $data;


    public function mounted($post)
    {
        $this->post = $post;
    }

    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);

        $post->delete();

        $this->emitUp('destroy', $postId);
    }


    public function render()
    {
        return view('livewire.list-post');
    }
}
