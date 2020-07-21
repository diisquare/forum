<ul>
    @foreach($replies as $reply)
    <li>{{$reply['content']}} </li>
    <em>{{$reply['published_at']}}</em>
    @endforeach
</ul>
    {!! $replies->render() !!}
