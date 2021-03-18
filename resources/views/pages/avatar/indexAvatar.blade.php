@extends('template.mainTemplate')

@section('content')
    @if (count($avatars) < 5)
        @include('partials.avatar.createFormAvatar')
    @endif
    @include('partials.avatar.tableAvatar')
@endsection