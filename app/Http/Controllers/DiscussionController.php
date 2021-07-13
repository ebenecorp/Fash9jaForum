<?php

namespace App\Http\Controllers;

use App\Models\Discusion;
use App\Models\Reply;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiscussionRequest;

class DiscussionController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth', 'verified'])->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('discussion.index', [
            'discussions' => Discusion::filterByChannels()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        //

        auth()->user()->discussions()->create([
            'title'=>$request->title,
            'content'=>$request->content,
            'slug'=> Str::slug($request->title),
            'channel_id'=>$request->channel
        ]);

        session()->flash('success', 'Gist has been successfully Posted');
        return redirect()->route('discussion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discusion $discussion)
    {
        return view('discussion.show', [
            'discussion'=>$discussion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bestReply(Discusion $discussion, Reply $reply){
        $discussion->markBestReply($reply);

        session()->flash('success', 'Marked as best reply');

        return redirect()->back();
    }
}
