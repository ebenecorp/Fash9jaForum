@extends('layouts.app')

@section('content')
        
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                   <ul class="list-group">
                       @foreach ($notifications as $notification)
                            <li class="list-group-item">
                                @if ($notification->type === "App\\Notifications\\NewReplyAdded")
                                    {{-- @dd($notifications) --}}
                                    <a href="{{route('discussion.show', $notification->data['discussion']['slug'] )}}" class="btn btn-info btn-sm float-right">
                                        View Discussion
                                    </a>
                                    A new reply was added to your discussion on <strong>{{$notification->data['discussion']['title'] }}</strong>
                                    by {{$notification->data['discussion']['author']['name'] }}
                                @endif
                                {{-- {{ $notification}} --}}
                            </li>
                           
                       @endforeach
                   </ul>
                </div>
            </div>
@endsection
