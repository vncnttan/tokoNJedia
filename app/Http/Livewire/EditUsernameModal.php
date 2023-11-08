<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class EditUsernameModal extends ModalComponent
{
    public $username;

    protected $rules = [
        'username' => 'required|min:3',
    ];
    public function mount(){
        $this->username = Auth::user()->username;
    }
    public function render()
    {
        return view('livewire.edit-username-modal');
    }

    public function update()
    {

        /** @var User $user */
        $user = Auth::user();

        if (!$user instanceof User) {
            toastr()->error('Update Username Failed');
            return;
        }
        $validator = Validator::make(
            ['username' => $this->username],
            ['username' => 'required|min:3'],
            ['required' => 'The :attribute field is required'],
        );
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first('username'), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return;
        }

        $user->username = $this->username;
        $user->save();
        toastr()->success('Update Username Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        $this->closeModal();

        return redirect()->to('/profile');

    }
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
