<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserProfile extends Component
{
    use WithFileUploads;

    public $profile_photo;

    public function saveProfile()
    {
        $this->validate([
            'profile_photo' => 'image|max:2048', // Validasi untuk file gambar dengan maksimal ukuran 2MB
        ]);

        $user = auth()->user();

        // Jika ada foto profil baru, simpan foto tersebut dan hapus foto lama jika ada
        if ($this->profile_photo) {
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }

            $path = $this->profile_photo->store('profile_photos');
            $user->profile_photo = $path;
            $user->save();
        }

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}

