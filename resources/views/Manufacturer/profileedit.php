<form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="profile_picture">Upload New Profile Picture:</label>
    <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
    <button type="submit">Upload</button>
</form>
