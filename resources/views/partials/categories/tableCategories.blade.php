<h1 class="my-5">All Categories</h1>
<table class="table border">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Categories</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nom}}</td>
            <td>
                <form action="/categories/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
                <a class="btn btn-success" href="/categories/{{$item->id}}/edit">Edit</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>