

<div class="card-header">

    <div class="d-flex justify-content-between">

        <div>
            <img width="20px" height="20px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->author->email)}}" alt="">
            <strong class="ml-2">{{$discussion->author->name}}</strong> posted: {{$discussion->created_at}}
        </div>

        <div>
             <a href="{{route('discussion.show', $discussion->slug)}}" class="btn btn-success btn-sm">View</a>
        </div>

    </div>

</div>