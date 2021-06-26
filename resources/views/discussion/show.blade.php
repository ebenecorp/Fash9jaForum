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

                <div class="card my-2">
                    <div class="card-header">
                        Add reply
                    </div>
                    @auth
                        <div class="card-body">
                            <form action="#" method="post">
                                @csrf
                                <input id="reply" type="hidden" name="reply">
                                <trix-editor input="reply"></trix-editor>

                                <button  class="btn btn-success btn-sm my-2" type="submit">Save reply</button>
                            </form>

                        </div>

                    @else 
                        <div class="card-body">
                            <a href="{{route('login')}}" class="btn btn-info btn-sm">Sign in to add a reply</a>
                        </div>

                    @endauth
                </div>
                

@endsection


@section('css')

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
     
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

@endsection