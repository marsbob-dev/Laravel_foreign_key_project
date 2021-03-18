<h1>Add Category</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/categories" method="POST">
    @csrf
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="nom" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>