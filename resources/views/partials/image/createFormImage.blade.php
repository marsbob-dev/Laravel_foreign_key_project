<h1>Add Image</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/images" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="src" class="form-control" >
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
          @foreach ($categories as $item)
              <option value="{{$item->id}}">{{$item->nom}}</option>
          @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>