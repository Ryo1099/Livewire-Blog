<div>      
        @if (session()->has('message'))
            <div class="p-4 mt-8 text-green-900 bg-green-200">
                {{ session('message') }}
            </div>
        @endif  
        <div class="flex justify-center py-8">
            @include('livewire.posts.create')
        </div>
        <!-- Delete Modal -->
        <div id="delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" wire:ignore.self>
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" wire:click="closeModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="delete-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="py-6 px-6 lg:px-8">
                        @include('livewire.posts.delete')
                    </div>
                </div>
            </div>
        </div>
        <!-- End Delete Modal --> 
        <!-- Update Modal -->
        <div id="update-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" wire:ignore.self>
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" wire:click="closeModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="update-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="py-6 px-6 lg:px-8">
                        @include('livewire.posts.update')
                    </div>
                </div>
            </div>
        </div>
        <!-- End Update Modal --> 

        <div class="px-24">
            <div class="flex justify-center">
                <form>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" wire:model="search" id="search" placeholder="Search here..." class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10">         
                    </div>
                </form>
                <!-- <div wire:loading>Searching users...</div>
                <div wire:loading.remove></div> -->     
            </div>
        
        @if ($search == "")
        <div class="flex justify-center">
            <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400 my-4">
                @foreach($posts as $value)
                <thead class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <!-- <img src="{{ asset('storage/'.Auth::user()->profile_photo_path ) }}"  class="rounded-full h-20 w-20 object-cover"> -->
                            {{ $value->name }}
                        </th>            
                        <th scope="col" class="py-3 px-6 text-right" colspan="2">
                            {{ $value->created_at }}
                        </th>  
                        <th scope="col" class="py-3 px-6 text-right">
                        @if( $value->user_id == Auth::user()->id)
                            <button wire:click="edit({{ $value->id }})" data-modal-toggle="update-modal" class="btn btn-danger btn-sm"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>     
                            </button>
                            &nbsp;
                            <button wire:click="confirmation({{ $value->id }})" data-modal-toggle="delete-modal" class="btn btn-danger btn-sm"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>     
                            </button>
                        @elseif(Auth::user()->role == 0)
                            <button wire:click="confirmation({{ $value->id }})" data-modal-toggle="delete-modal" class="btn btn-danger btn-sm"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>     
                            </button>
                        @else
                        <div></div>
                        @endif
                        </th>       
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="4">                  
                            <h1 class="font-bold tracking-wide text-xl "> {{ $value->title }} </h1>     
                        </th>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="2">                  
                            <p class="font-sans text-justify tracking-normal text-base"> {{ $value->content }} </p>            
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="2">
                           <img src="{{ asset('storage/'.$value->image) }} " class="h-64 w-auto" alt="..." />
                            
                        </th>
                    </tr>
                </tbody>
                <div></div>
                @endforeach
            </table>         
        @else
            @if($posts->isEmpty())
                <div class="flex justify-center">
                    No matching result was found.
                </div>
            @else
                <div class="flex justify-center">
                <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400 my-4">
                @foreach($posts as $value)
                <thead class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <!-- <img src="{{ asset('storage/'.Auth::user()->profile_photo_path ) }}"  class="rounded-full h-20 w-20 object-cover"> -->
                            {{ $value->name }}
                        </th>            
                        <th scope="col" class="py-3 px-6 text-right" colspan="2">
                            {{ $value->created_at }}
                        </th>  
                        <th scope="col" class="py-3 px-6 text-right">
                        @if( $value->user_id == Auth::user()->id)
                            <button wire:click="edit({{ $value->id }})" data-modal-toggle="update-modal" class="btn btn-danger btn-sm"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>     
                            </button>
                            &nbsp;
                            <button wire:click="confirmation({{ $value->id }})" data-modal-toggle="delete-modal" class="btn btn-danger btn-sm"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>     
                            </button>
                        @elseif(Auth::user()->role == 0)
                            <button wire:click="confirmation({{ $value->id }})" data-modal-toggle="delete-modal" class="btn btn-danger btn-sm"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>     
                            </button>
                        @else
                        <div></div>
                        @endif
                        </th>       
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="4">                  
                            <h1 class="font-bold tracking-wide text-xl "> {{ $value->title }} </h1>     
                        </th>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="2">                  
                            <p class="font-sans text-justify tracking-normal text-base"> {{ $value->content }} </p>            
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="2">
                           <!-- {{ asset('storage\app/public'.$value->image) }} -->
                           <!-- {{ $value->image }} -->
                           <img src="{{ asset('storage/'.$value->image) }} " class="h-64 w-auto" alt="..." />
                            <!-- ../storage/app/{{ $value->image }} -->
                        </th>
                    </tr>
                </tbody>
                <div></div>
                @endforeach
            </table>      
        </div>
               
            @endif
        @endif
    </div>
</div>