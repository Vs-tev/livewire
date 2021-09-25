<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MusicSearch extends Component
{
    public $search;
    public $searchResults = [];

    public function updatedSearch()
    {
        if (strlen($this->search) < 4) {
            return;
        }

        $response = Http::get('https://itunes.apple.com/search/?term=' . $this->search . '&limit=10');

        //  dump($response->json());

        $this->searchResults = $response->json()['results'];
    }

    public function render()
    {
        return view('livewire.music-search');
    }
}
