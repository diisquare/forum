<div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">评论区</h6>
        <div>
            <form role="form" method="POST" action="{{route('replies.store')}}">
                @csrf
                <div  class="row">
                    <input id="topic" name="topic" type="hidden" value="{{$topicType}}">
                    <input id="topicId" name="topicId" type="hidden" value="{{$topic->id}}">
                    {{--                TODO:atId--}}
                    <input id="atId" name="atId" type="hidden" value="0">
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="content"  name="content">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">发表</button>
                    </div>
                </div>
            </form>
        </div>
        <hr class="mb-4">
        <div>
            @foreach($replies as $reply)
                <div class="media text-muted pt-3">
                    <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <a href="{{route('users.show',$reply->publisherId)}}"><strong class="d-block text-gray-dark" >{{$reply->publisherName}}</strong></a>
                        {{$reply->content}}
                        @if(Auth::id()==$reply->publisherId)
                        <a >修改评论</a>
                        @endif
                        <strong class="d-block text-gray-dark float-right">{{$reply->published_at}}</strong>
                    </p>
                    <em></em>
                </div>
            @endforeach
            {!! $replies->render() !!}
        </div>
    </div>
</div>
