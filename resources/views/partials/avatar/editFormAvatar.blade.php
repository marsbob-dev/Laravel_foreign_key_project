<h1>Edit Avatar</h1>
<form action="/avatars/{{$edit->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{$edit->name}}">
    </div>
    <div class="form-group">
        <label>File</label>
        <input type="file" name="src" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>