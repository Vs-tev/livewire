<div>
   @foreach ($user as $item)
       <div>{{$item->name}}</div>
   @endforeach
    <form wire:submit.prevent="addPost">
        <div class="relative p-1 border-gray-500 rounded-md shadow-sm flex w-6/12">
            <input wire:model="post" id="name" class="border-none bg-white p-2 w-full rounded shadow-sm" name="name" value="{{ old('name') }}" autocomplete="off"
                class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
                placeholder="Post title">
                <button type="submit" class="bg-blue-600 text-white rounded p-2 ml-5 w-24">Add post</button>
        </div>
        @error('post')
        <p class="text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <div class="py-4">
            <ul>
               
                @foreach ($posts as $post)
                   @livewire('list-post', ['post' => $post], key($post->id))
                @endforeach
            </ul>
            <h4 class="font-weight-bolder text-gray-600 pb-3">Form alpine.js</h4>
            {{-- <ul x-data="{posts: {{$posts}}}">
                <template x-for="post in posts">
                    <li x-text="post.post"></li>
                </template>
            </ul> --}}
        </div>
    </form>
</div>
