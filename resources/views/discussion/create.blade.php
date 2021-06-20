@extends('layouts.app')

@section('content')
        
            <div class="card">
                <div class="card-header">{{ __('Add Discussion') }}</div>

                <div class="card-body">
                    <form action="{{route('discussion.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="title" class="form-control">Title</label>
                            

                        </div>
                    
                    </form>
                </div>
            </div>
@endsection
