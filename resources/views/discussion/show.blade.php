@extends('layouts.app')

@section('content')
        
                <div class="card">
                    @include('partials.header-card')
                

                    <div class="card-body">
                        {{$discussion->title}}

                        <hr>

                        {!! $discussion->content !!}

                        @if ($discussion->bestReply)
                            <div class="card bg-success m-y-5" style="color: #fff">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                             <img width="20px" height="20px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->bestReply->user->email)}}" alt="">
                                             <strong class="ml-2">{{$discussion->bestReply->user->name}}</strong> replied: {{$discussion->bestReply->user->created_at}}                               
                                            
                                        </div>
                                        <div class="">
                                             Best Reply
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    {!! $discussion->bestReply->content!!}
                                </div>
                            </div>
                            
                        @endif
                    </div>
                </div>
                @foreach ($discussion->replies()->paginate(3) as $reply )
                    
                    <div class="card my-2">
                        <div class="card-header">

                            <div class="d-flex justify-content-between">

                                <div>
                                    <img width="20px" height="20px" style="border-radius: 50%" src="{{ Gravatar::src($reply->user->email)}}" alt="">
                                    <strong class="ml-2">{{$reply->user->name}}</strong> replied: {{$reply->created_at}} 
                                </div>

                                <div>
                                    @auth
                                        @if ( auth()->user()->id === $discussion->user_id)
                                            <form action="{{ route('discussion.bestReply', [ 'discussion' =>$discussion->slug, 'reply'=> $reply->id])}}" method="POST">
                                                @csrf
                                                <button class="btn btn-primary btn-sm float-right"  type="submit">Mark as best reply</button>

                                            </form>
                                        @endif
                                    @endauth
                                    
                                </div>
                                    
                            </div>

                        </div>

                        <div class="card-body">
                                {!! $reply->content !!}
                        </div>

                        
                    
                    </div>
                @endforeach
                 {{ $discussion->replies()->paginate(3)->links() }}


                <div class="card my-2">
                    <div class="card-header">
                        Add reply
                    </div>
                    @auth
                        <div class="card-body">
                            <form action="{{ route('replies.store', $discussion->slug)}}" method="post">
                                @csrf
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>

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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

@endsection