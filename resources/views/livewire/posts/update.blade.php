<div class="w-96 h-fit">
    <form wire:submit.prevent="save" class="w-full">
        &nbsp;
        &nbsp;
        <div class="form-group mr-8">
            <input type="text" class="form-control shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" id="title" placeholder="Enter Title" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mr-8">
            <textarea type="text" rows="4" class="form-control shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" id="content" wire:model="content" placeholder="Whats on your mind?"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        &nbsp;
        &nbsp;
        <div class="form-group mr-8">
            <div class="flex justify-center">
        @if ($image)
            <img class="h-36" src="{{ $image->temporaryUrl() }}">
        @endif
            </div>
            <input type="file" wire:model="image" id="image">
            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <button wire:click.prevent="update()" data-modal-toggle="update-modal" class="btn btn-dark inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
    </form>
</div>