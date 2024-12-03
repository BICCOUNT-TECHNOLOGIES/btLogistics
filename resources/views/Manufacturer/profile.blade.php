<!-- resources/views/profile.blade.php -->

<form action="{{ route('profile.update-picture') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="profile_picture" accept="image/*">
    <button type="submit">Update Profile Picture</button>
</form>
{{-- 
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif --}}
