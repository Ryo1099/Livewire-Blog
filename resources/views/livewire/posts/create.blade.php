<div class="w-1/2 mt-11">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="save">
                <!-- <div class="form-group">
                    <input type="text" wire:model="user_id" class="form-control" id="user_id" placeholder="Enter Title">
                    @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
                    
                </div> -->
                <div class="form-group px-4">
                    <input type="text" class="form-control shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" id="title1" placeholder="Enter Title" wire:model="title1">
                    @error('title1') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group px-4">
                    <textarea type="text" rows="4" class="form-control shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" id="content1" wire:model="content1" placeholder="Whats on your mind?"></textarea>
                    @error('content1') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                &nbsp;
                &nbsp;
                <div class="form-group px-4">
                    <div class="flex justify-center">
                    @if ($image1)
                    <img class="h-36" src="{{ $image1->temporaryUrl() }}">
                    @endif
                    </div>
                    <input type="file" wire:model="image1" id="image1">
                    @error('image1') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button wire:click.prevent="store()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Post</button>   
                </div>
            </form>
        </div>   
    </div>
</div>