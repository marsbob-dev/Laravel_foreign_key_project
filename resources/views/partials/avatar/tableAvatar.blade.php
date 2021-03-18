<h1 class="my-5">All Avatars</h1>
<table class="table border">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($avatars as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td><img height="100px" src="{{asset('img/'.$item->src)}}" alt=""></td>
            <td>
                <form action="/avatars/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
                <a class="btn btn-success" href="/avatars/{{$item->id}}/edit">Edit</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>