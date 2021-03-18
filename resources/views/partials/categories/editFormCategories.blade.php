<h1>Edit Category</h1>
<form action="/categories/{{$edit->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="nom" class="form-control" value="{{$edit->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>