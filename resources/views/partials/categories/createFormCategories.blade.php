<h1>Add Category</h1>
<form action="/categories" method="POST">
    @csrf
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="nom" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>