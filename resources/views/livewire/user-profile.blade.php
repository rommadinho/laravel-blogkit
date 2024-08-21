<div>
    @if (session()->has('message'))
        <div style="color: green;">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="saveProfile">
        <div>
            <label for="profile_photo">Upload Profile Photo:</label>
            <input type="file" id="profile_photo" wire:model="profile_photo">
        </div>

        @error('profile_photo') <span style="color: red;">{{ $message }}</span> @enderror

        <button type="submit">Update Profile</button>
    </form>

    @if (auth()->user()->profile_photo)
        <div>
            <img src="{{ Storage::url(auth()->user()->profile_photo) }}" alt="Profile Photo" style="max-width: 150px; margin-top: 10px;">
        </div>
    @endif
</div>
