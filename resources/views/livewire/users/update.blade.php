<div class="w-full h-full mt-11">
    <div class="overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="form-group col-span-3 sm:col-span-2">
                            <input type="hidden" wire:model="user_id">
                        </div>
                        <div class="form-group col-span-3 sm:col-span-2">
                            <input type="text" class="form-control focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" wire:model="name" id="name" placeholder="Enter name">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-span-3 sm:col-span-2">
                            <input type="email" class="form-control focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" wire:model="email" id="email" placeholder="Enter Email">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-span-3 sm:col-span-2">
                            <select name="role" class="form-control focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" id="role"  wire:model="role">
                                <option> Select Role</option>
                                <option value="1">User</option>
                                <option value="0">Admin</option>
                            </select>
                            @error('role') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <!-- <div class="form-group">
                            <input type="password" wire:model="password" class="form-control focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" id="password" placeholder="Enter password">
                            @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                        </div> -->
                        <button wire:click.prevent="update()" data-modal-toggle="update-modal" class="btn btn-dark inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
            
                    </div>
                </div>    
            </div>
            </form>
        </div>
    </div>
</div>