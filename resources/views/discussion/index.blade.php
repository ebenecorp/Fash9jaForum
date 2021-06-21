@extends('layouts.app')

@section('content')
        
            @foreach ($discussions as $discussion)
                <div class="card">
                <div class="card-header">
                    <img width="20px" height="20px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->author->email)}}" alt="">
                    <strong class="ml-2">{{$discussion->author->name}}</strong>
                </div>

                <div class="card-body">
                   {!! $discussion->content !!}
                </div>
            </div>
                
            @endforeach

            {{$discussions->links()}}
@endsection
