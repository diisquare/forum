<div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">评论区</h6>
        @include('modules.reply.form',['topicType'=>$topicType,'topicId'=>$topic->id,'fatherId'=>0,'atId'=>0])
        <hr class="mb-4">
        <div>
{{--            TODO:new blade --}}
            @foreach($replies as $reply)
                @if($reply->fatherId==0)
                    <div class="media text-muted pt-3">
                        <div hidden>
                            <fatherId>{{$reply->id}}</fatherId>
                            <atId>{{$reply->publisherId}}</atId>
                        </div>
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff"></rect>
                            <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                        </svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <a href="{{route('users.show',$reply->publisherId)}}"><strong class="d-block text-gray-dark" >{{getUserName($reply->publisherId)}}</strong></a>
                            <p class="text">{{$reply->content}}</p>
                            @if(Auth::id()==$reply->publisherId)
                                <button type="button" class="btn btn-success btn-md" onclick="getReplyContent(this)">
                                    <i class="fa fa-plus-circle"></i> 修改评论
                                </button>
                                 <form role="form" method="POST" action="{{route('replies.destroy',$reply->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                     <button type="submit" class="btn btn-warning btn-md">
                                         <i class="fa fa-warning"></i> 删除评论
                                     </button>
                                </form>
                            @endif
                            <button type="button" class="btn btn-success btn-md" data-toggle="modal"
                                    data-target="#modal-reply" id="reply-button" onclick="getInfo(this)">
                                <i class="fa fa-plus-circle"></i> 回复
                            </button>
                        <form role="form" method="POST" action="{{route('replies.update',$reply->id)}}">
                            @csrf
                            <div class="col-md-6">
                                <label>
                                    <input type="text" class="form-control" name="content">
                                </label>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">发表</button>
                            </div>
                        </form>
                            <strong class="d-block text-gray-dark float-right">{{$reply->published_at}}</strong>
                        </p>
                        <em></em>
                    </div>
                        @foreach($replies as $subReply)
                            @if($subReply->fatherId == $reply->id)
                                    <div class="media text-muted pt-3">
                                        <div hidden>
                                            <fatherId>{{$subReply->fatherId}}</fatherId>
                                            <atId>{{$subReply->publisherId}}</atId>
                                        </div>
                                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#007bff"></rect>
                                            <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                                        </svg>
                                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                            <a href="{{route('users.show',$subReply->publisherId)}}"><strong class="d-block text-gray-dark" >{{getUserName($subReply->publisherId)}}</strong></a>
                                            {{$subReply->content}}
                                            @if(Auth::id()==$subReply->publisherId)
                                                <a >修改评论</a>
                                            @endif
                                            <button type="button" class="btn btn-success btn-md" data-toggle="modal"
                                                    data-target="#modal-reply" id="subReply-button">
                                                <i class="fa fa-plus-circle"></i> 回复
                                            </button>
                                        <form role="form" method="POST" action="{{route('replies.update',$subReply->id)}}">
                                            @csrf
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="text" class="form-control" name="content">
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary" type="submit">发表</button>
                                            </div>
                                        </form>
                                            <strong class="d-block text-gray-dark float-right">{{$subReply->published_at}}</strong>
                                        </p>
                                        <em></em>
                                    </div>
                               @endif
                        @endforeach
                @endif
            @endforeach
            {!! $replies->render() !!}
        </div>
    </div>
</div>




<div class="modal fade" id="modal-reply">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('modules.reply.form',['topicType'=>$topicType,'topicId'=>$topic->id,'fatherId'=>0,'atId'=>0])
        </div>
    </div>
</div>

{{-- 创建目录 --}}
    <script>
        function getInfo(btn){
            let parent = $(btn).parent().parent();
            let atId = parent.find('atId').text();
            let fatherId = parent.find('fatherId').text();
            $("#modal-reply input[name='atId']").val(atId);
            $("#modal-reply input[name='fatherId']").val(fatherId);
        }
    </script>


