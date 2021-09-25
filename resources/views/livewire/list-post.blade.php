<li class="pb-2">
    <div class="p-2 border border-indigo-100 flex w-6/12 bg-white justify-between">
         {{$post->post}}
         <button
         type="button"
         wire:click="destroy({{$post->id}})"
         class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
         aria-label="Dismiss">
             <svg class="h-3 w-5" viewBox="0 0 20 20" fill="currentColor">
                 <path fill-rule="evenodd"
                     d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                     clip-rule="evenodd" />
             </svg>
         </button>
         <div x-data="{ open: false }">
            <span class="cursor-pointer" x-on:click="open = ! open">+</span>
         
            <div x-show="open">
                {{$post->created_at->diffForHumans()}}
            </div>
        </div>
        

    </div>
     
 </li>
