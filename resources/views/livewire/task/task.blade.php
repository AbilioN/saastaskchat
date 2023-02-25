<div>
    {{-- Stop trying to control. --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Tasks

            {{-- <nav class="bg-gray-500 dark:bg-gray-600">
                <div class="max-w-screen-xl px-4 py-3 mx-auto md:px-6">
                    <div class="flex items-center">
                        <ul class="flex flex-row mt-0 mr-6 space-x-8 text-sm font-medium">
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">Company</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">Team</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">Features</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> --}}
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
            
                        <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 ">Create New Task</button>
            
                        @if($isOpen)
            
                            @include('livewire.task.create')
            
                        @endif
            
                        <table class="table-fixed w-full mt-4">
            
                            <thead>
            
                                <tr class="bg-gray-100">
            
                                    <th class="px-4 py-2 w-20">No.</th>
            
                                    <th class="px-4 py-2">Name</th>
            
                                    <th class="px-4 py-2">Category</th>
            
                                    <th class="px-4 py-2">Priority</th>
                                    
                                    <th class="px-4 py-2">Actions</th>

            
                                </tr>
            
                            </thead>
            
                            <tbody>
            
                                @foreach($tasks as $task)
            
                                <tr>
            
                                    <td class="border px-4 py-2">{{ $task->id }}</td>
            
                                    <td class="border px-4 py-2">{{ $task->name }}</td>
            
                                    <td class="border px-4 py-2">{{ $task->category()->first()->name }}</td>
                                    <td class="border px-4 py-2">{{ $task->priority }}</td>

            
                                    <td class="border px-4 py-2">
            
                                        <button wire:click="edit({{ $task->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" >Edit</button>
            
                                        <button wire:click="delete({{ $task->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            
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
