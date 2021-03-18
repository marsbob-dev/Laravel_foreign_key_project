<h1>Add Avatar</h1>
<form action="/avatars" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" >
    </div>
    <div class="form-group">
        <label>File</label>
        <input type="file" name="src" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>