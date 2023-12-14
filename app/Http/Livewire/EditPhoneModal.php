<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use LivewireUI\Modal\ModalComponent;

class EditPhoneModal extends ModalComponent
{
    public $phone;

    public function mount()
    {
        $this->phone = Auth::user()->phone;
    }

    public function update()
    {

        /** @var User $user */
        $user = Auth::user();

        if (!$user instanceof User) {
            toastr()->error('Update Phone Failed');
            return;
        }
        $validator = Validator::make(
            ['phone' => $this->phone],
            [
                'phone' => [
                    'required',
                    'numeric',
                    'digits:12',
                ],
            ],
            [
                'required' => 'The :attribute field is required',
                'numeric' => 'The :attribute must be a number',
                'digits' => 'The :attribute must be exactly :digits digits.',
            ]
        );
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first('phone'), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first('phone'));
        }

        $user->phone = $this->phone;
        $user->save();
        toastr()->success('Update Phone Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        $this->closeModal();

        return redirect()->to('/profile');
    }

    public function render()
    {
        return view('livewire.edit-phone-modal');
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
