<h1>Edit Avatar</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/avatars/{{$edit->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="nom" class="form-control" value="{{$edit->nom}}">
    </div>
    <div class="form-group">
        <label>File</label>
        <input type="file" name="src" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>