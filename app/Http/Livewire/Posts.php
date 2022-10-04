<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Posts extends Component
{
    use WithFileUploads;
    // public $user_id = Auth::user()->id;

    public $name,$post_id,$search,$slug;
    public $isOpen = 0;

    //For updating blog
    public $title, $content, $image;

    //For creating blog
    public $title1, $content1, $image1;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $queryString = [
        'slug' => ['except' => '', 'as' => ''],
    ];

    public function render()
    { 
        $this->posts = Post::where('content', 'like', '%'.$this->search.'%')->get();
        return view('livewire.posts.posts');
        
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        return redirect()->to('/posts');
    }
  
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->user_id ='';
        $this->name = '';
        $this->content = '';
        $this->title= '';
        $this->image = '';
        $this->title1= '';
        $this->content1= '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([      
            'content1' => 'required',
            'title1' => 'required',
            'image1' => 'required|image|max:1024'
        ]);
   
        Post::updateOrCreate(['id' => $this->post_id], [
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'title' => $this->title1,
            'content' => $this->content1,
            'slug' => Str::random(15),
            'image' => $this->image1->store('images','public'),
        ]);
  
        session()->flash('message', 'Post Created Successfully.');
        return redirect()->to('/posts');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'content' => 'required',
            'title' => 'required',
            'image' => 'image|max:1024'
        ]);
   
        Post::updateOrCreate(['id' => $this->post_id], [
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'title' => $this->title,
            'content' => $this->content,
            'slug' => Str::random(15),
            'image' => $this->image->store('images','public'),
        ]);
  
        session()->flash('message', 'Post Update Successfully.');
        return redirect()->to('/posts');
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function confirmation($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->name = $post->name;
        $this->slug = $post->slug;

    
        $this->openModal();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->name = $post->name;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->slug = $post->slug;

        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete()
    {
        Post::find($this->post_id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
        return redirect()->to('/posts');
    }
   
    // public function search(){
    //     // try {
    //         return view('livewire.posts.posts', [
    //             'posts' => Post::where('content', 'like', '%'.$this->search.'%')->get(),
    //         ]);
    //     // } catch(ModelNotFoundException $e) {
    //     //     $this->error = 'Post not found.'; // your message when not Post found.
    //     // }
    // }
}
