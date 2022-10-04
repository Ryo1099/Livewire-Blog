<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Users extends Component
{
    public $name,$role,$email,$password,$user_id;
    public $slug;
    public $isOpen = 0;

    protected $queryString = [
        'slug' => ['except' => '', 'as' => ''],
    ];

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.users');
    }
    
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
        return redirect()->to('/users');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name ='';
        $this->role = '';
        $this->email = '';
        $this->password = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
   
        User::updateOrCreate(['id' => $this->user_id], [
            'slug' => Str::random(15),
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
  
        session()->flash('message', 'User Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
        ]);
   
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
        ]);
  
        session()->flash('message', 'User successfully updated.');
        return redirect()->to('/users');
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->role = $user->role;
        $this->email = $user->email;
        $this->slug = $user->slug;
        // $this->password = $user->password;
    
        $this->openModal();
    }
     

    public function confirmation($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->role = $user->role;
        $this->email = $user->email;
        $this->slug = $user->slug;
        // $this->password = $user->password;
    
        $this->openModal();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete()
    {
        // $this->user_id = $id;
        User::find($this->user_id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
        return redirect()->to('/users');
    }
}
