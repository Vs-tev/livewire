<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class ShowPosts extends Component
{
    public $posts;
    public $post;
    public $user;

    protected $rules = [
        'post' => 'required|min:4|max:20',
    ];

    protected $listeners = ['destroy' => '$refresh'];

    public function addPost()
    {
        $this->validate();

        Post::create(['post' => $this->post]);

        $this->post = "";
    }

    public function updatedPost($newValue)
    {
        $this->validateOnly($this->post);
    }

    public function render()
    {
        $this->posts = Post::all();

        return view('livewire.show-posts');
    }
}
