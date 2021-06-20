@extends('layouts.app')

@section('content')
        
            <div class="card">
                <div class="card-header">{{ __('Add Gist') }}</div>

                <div class="card-body">
                    <form action="{{route('discussion.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input id="content" type="hidden" name="content">
                            <trix-editor input="content"></trix-editor>
                            {{-- <textarea name="content" id="" cols="5" rows="5" class="form-control"></textarea> --}}
                        </div>

                        <div class="form-group">
                            <label for="channels">Channel</label>
                            <select name="channel" id="" class="form-control">
                                @foreach ($channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Create Gist</button>
                    
                    </form>
                </div>
            </div>
@endsection

@section('css')

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
     
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

@endsection