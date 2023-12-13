<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use LivewireUI\Modal\ModalComponent;

class EditDobModal extends ModalComponent
{
    public $dob;

    public function mount(){
        $this->dob = Auth::user()->dob;
    }
    public function render()
    {
        return view('livewire.edit-dob-modal');
    }

    public function update()
    {

        /** @var User $user */
        $user = Auth::user();
        $validator = Validator::make(
            ['dob' => $this->dob],
            [
                'dob' => [
                    'required',
                    'date',
                    'after_or_equal:1970-01-01',
                    'before_or_equal:2009-12-31',
                ],
            ],
            [
                'required' => 'The :attribute field is required',
                'date' => 'The :attribute must be a valid date',
                'after_or_equal' => 'Date must be after 1970-01-01',
                'before_or_equal' => 'Date must be before 2009-12-31',
            ]
        );
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first('dob'), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return;
        }

        $user->dob = $this->dob;
        $user->save();
        toastr()->success('Update Date Of Birth Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        $this->closeModal();

        return redirect()->to('/profile');
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
