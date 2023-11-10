<?php
namespace App\Services;
use Kreait\Firebase\Factory;

class FirebaseService{
    protected $firebase;

    public function __construct()
    {
        // $this->firebase = (new Factory)
        //     ->withServiceAccount(config('firebase.credentials.file'))
        //     ->create();
    }

    public function getStorageClient()
    {
        return $this->firebase->getStorage();
    }
}
