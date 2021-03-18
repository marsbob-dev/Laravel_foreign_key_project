@foreach ($categories as $category)
    <div class="my-4 border rounded p-2">
        <h1>Category {{$category->name}}</h1>
        <hr>
        <div class="row">
            @foreach ($images->where('category_id',$category->id) as $item)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img class="w-100"  src="{{asset('img/'.$item->src)}}" alt="">
                        <div class="card-body row">
                            <form action="/images/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mx-2" type="submit">Delete</button>
                            </form>
                            <a href="/images/{{$item->id}}/edit" class="btn btn-success">Edit</a>
                        </div>
                    </div>
                </div>
                @if ($loop->iteration % 3 == 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
    </div>
@endforeach