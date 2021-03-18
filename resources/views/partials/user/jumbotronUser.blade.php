<div class="jumbotron my-5">
    <div class="row">
        <div class="col-4">
            <h1 class="display-4">{{$show->nom}}</h1>
            <p class="lead">Age : {{$show->age}}</p>
            <p class="lead">Email : {{$show->email}}</p>
        </div>

        <div class="col-8">
            <img height="350px" src="{{asset('img/'.$show->avatars->src)}}" alt="">
        </div>
    </div>
    <hr class="my-4">
    <div class="row">
        <form action="/users/{{$show->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mx-3" type="submit">Delete</button>
        </form>
    </div>
</div>