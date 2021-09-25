<div>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="mb-4 flex items-center justify-between">
          <input wire:model.debounce.300ms="search"
                    id="search"
                    class="block w-1/3 pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                    placeholder="Search for user" type="search" autocomplete="off">
                  
                    <div>
                      <label class="inline-flex items-center">
                        <input wire:model="active" type="checkbox" class="form-checkbox">
                        <span class="ml-2">Active</span>
                      </label>
                    </div>
             
        </div>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left">
                  <button wire:click="sortBy('name')" class="ext-xs font-medium text-gray-500 uppercase tracking-wider">Name</button>
                </th>
                <th scope="col" class="px-6 py-3 text-left">
                  <button wire:click="sortBy('email')" class="ext-xs font-medium text-gray-500 uppercase tracking-wider">Email</button>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Created at
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Email Verified
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">active</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
             @forelse ($users as $user)
             <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{$user->name}}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{$user->email}}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$user->email}}</div>
                <div class="text-sm text-gray-500">Optimization</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{$user->created_at->diffForHumans()}}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$user->email_verified_at ?? 'NO'}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <form wire:submit.prevent="toggleActive({{$user->id}})">
                  <button type="submit" class="text-indigo-600 hover:text-indigo-900">{{$user->active == 1 ? 'Active' : 'Inactive'}}</button>
                </form>
              </td>
              
            </tr>
             @empty
                <tr>
                  <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    No users found
                  </td>
                </tr> 
             @endforelse
          
            </tbody>
          </table>
        </div>
        <div class="mt-8">
          {{$users->links()}}
      </div>
      </div>
    </div>
  </div>
  </div>
