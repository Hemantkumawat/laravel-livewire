<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User as UserModel;

class User extends Component
{
    public $user, $users, $request, $name, $email, $password, $password_confirmation, $updateMode = false, $user_id;

    public function mount()
    {
        self::index();
    }

    public function render()
    {
        return view('livewire.user.index');
    }

    public function index()
    {
        $this->users = UserModel::all();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        UserModel::create($validatedData);
        session()->flash('message', 'Users Created Successfully.');
        $this->resetInputFields();
        $this->emit('userStore'); // Close model to using to jquery
        self::index();
    }

    public function show($id)
    {
        $this->updateMode = true;
        $this->user = UserModel::where('id', $id)->first();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->user = UserModel::where('id', $id)->first();
        $this->user_id = $id;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = UserModel::find($this->user_id);
            $user->update($validatedData);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
            self::index();
        }
    }

    public function delete($id)
    {
        if ($id) {
            UserModel::where('id', $id)->delete();
            session()->flash('message', 'User Deleted Successfully.');
            self::index();
        }
    }
}
