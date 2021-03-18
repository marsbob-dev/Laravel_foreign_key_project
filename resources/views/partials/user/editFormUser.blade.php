@auth
<h1>Edit Your Profile</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/users/{{$userLog->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="nom" class="form-control" value="{{$userLog->nom}}">
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" class="form-control" value="{{$userLog->age}}">
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control" value="{{$userLog->email}}">
    </div>
    @if (count($avatars) == 0)
        <input id="avatar_id" type="radio" class="@error('avatar_id') is-invalid @enderror" name="avatar_id" required autocomplete="avatar_id" value="{{$default->id}}"> <img height="50px" class="my-3" src="{{asset('img/'.$default->src)}}" alt=""> <br>
    @else
        @foreach ($avatars as $item)
            <input id="avatar_id" type="radio" class="@error('avatar_id') is-invalid @enderror" name="avatar_id" required autocomplete="avatar_id" value="{{$item->id}}"> <img height="50px" class="my-3" src="{{asset('img/'.$item->src)}}" alt=""> <br>
        @endforeach
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endauth