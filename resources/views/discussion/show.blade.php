@extends('layouts.app')

@section('content')
        
                <div class="card">
                    @include('partials.header-card')
                

                    <div class="card-body">
                        {{$discussion->title}}

                        <hr>

                        {!! $discussion->content !!}
                    </div>
                </div>
                

@endsection
