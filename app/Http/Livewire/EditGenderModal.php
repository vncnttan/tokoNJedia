<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use LivewireUI\Modal\ModalComponent;

class EditGenderModal extends ModalComponent
{
    public $gender;
    public function mount(){
        $this->gender = Auth::user()->gender;
    }

    public function update()
    {

        /** @var User $user */
        $user = Auth::user();

        if (!$user instanceof User) {
            toastr()->error('Update Gender Failed');
            return;
        }
        $validator = Validator::make(
            ['gender' => $this->gender],
            [
                'gender' => [
                    'required',
                ],
            ],
            [
                'required' => 'The :attribute field is required',
            ]
        );
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first('gender'), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return;
        }

        $user->gender = $this->gender;
        $user->save();
        toastr()->success('Update Gender Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        $this->closeModal();

        return redirect()->to('/profile');

    }

    public function render()
    {
        return view('livewire.edit-gender-modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
