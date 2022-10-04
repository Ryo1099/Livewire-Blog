<div class="w-full h-full mt-11">
    <div class="overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="form-group col-span-3 sm:col-span-2">
                            <input type="hidden" wire:model="post_id" class="delete_id">
                        </div>
                        <div class="form-group col-span-3 sm:col-span-2 w-fit" >
                            <p class="w-full"> Are you sure you want to delete the post of <input wire:model="name" disabled > ?</p>
                        </div>
                        <div class="form-group col-span-3 sm:col-span-2">
                          
                        </div> 
                        <!-- <div class="form-group col-span-3 sm:col-span-2">
                            <input type="text" class="form-control focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" wire:model="role" id="role" placeholder="Enter Role">
                            @error('role') <span class="text-danger">{{ $message }}</span>@enderror
                        </div> -->
                        
                        <!-- <div class="form-group">
                            <input type="password" wire:model="password" class="form-control focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" id="password" placeholder="Enter password">
                            @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                        </div> -->
                        <button wire:click.prevent="delete()" data-modal-toggle="delete-modal" class="btn btn-dark inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
            
                    </div>
                </div>    
            </div>
            </form>
        </div>
    </div>
</div>