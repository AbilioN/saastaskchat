<div>
    {{-- Stop trying to control. --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Categories

            <div class="py-12">
            
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            
                        @if (session()->has('message'))
            
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
            
                              <div class="flex">
            
                                <div>
            
                                  <p class="text-sm">{{ session('message') }}</p>
            
                                </div>
            
                              </div>
            
                            </div>
            
                        @endif
            
                        <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 ">Create New Category</button>
            
                        @if($isOpen)
            
                            @include('livewire.category.create')
            
                        @endif
            
                        <table class="table-fixed w-full mt-4">
            
                            <thead>
            
                                <tr class="bg-gray-100">
            
                                    <th class="px-4 py-2 w-20">No.</th>
            
                                    <th class="px-4 py-2">Name</th>
                                    
                                    <th class="px-4 py-2">Actions</th>

            
                                </tr>
            
                            </thead>
            
                            <tbody>
            
                                @foreach($categories as $category)
            
                                <tr>
            
                                    <td class="border px-4 py-2">{{ $category->id }}</td>
            
                                    <td class="border px-4 py-2">{{ $category->name }}</td>
            
                                    <td class="border px-4 py-2">
            
                                        <button wire:click="edit({{ $category->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" >Edit</button>
            
                                        <button wire:click="delete({{ $category->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            
                                    </td>
            
                                </tr>
            
                                @endforeach
            
                            </tbody>
            
                        </table>
            
                    </div>
            
                </div>
            
            </div>
        </div>
    </div>

</div>
