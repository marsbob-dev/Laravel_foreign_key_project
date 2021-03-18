<h1>Edit Category</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/categories/{{$edit->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="nom" class="form-control" value="{{$edit->nom}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>