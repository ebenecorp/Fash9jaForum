@extends('layouts.app')

@section('content')
        
            @foreach ($discussions as $discussion)
                <div class="card mb-2">
                    @include('partials.header-card')                

                    <div class="card-body">
                        <span class="text-center">

                            <strong>
                                {{ $discussion->title }}
            
                            </strong>
                        </span>
                    </div>
                </div>
                
            @endforeach
            {{$discussions->links()}}
@endsection
