<h1 class="my-5">All Users</h1>
<table class="table border">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Users</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>
                <form action="/users/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
                <a class="btn btn-success" href="/users/{{$item->id}}">Details</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>