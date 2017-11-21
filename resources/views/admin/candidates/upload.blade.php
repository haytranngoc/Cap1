<form method="POST" action="{{ route("upload") }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="photo">
    <button type="submit">SUBMIT</button>
</form>