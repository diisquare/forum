
        <div class="comments-container">
            <h1>评论区</h1>
            @include('modules.reply.form',['topicType'=>$topicType,'topicId'=>$topic->id,'fatherId'=>0,'atId'=>0])
            <hr class="mb-4">
            <ul id="comments-list" class="comments-list">
                @foreach($replies as $reply)
                    @if($reply->fatherId==0)
                        <li>
                            <div class="comment-main-level">
                            @include('modules.reply.box',['reply'=>$reply])
                            <div>
                            @foreach($replies as $subReply)
                                @if($subReply->fatherId == $reply->id)
                                        <ul class="comments-list reply-list">
                                            <li>
                                                @include('modules.reply.box',['$reply'=>$subReply])
                                            </li>
                                        </ul>
                                @endif
                            @endforeach
                        </li>
                    @endif
                @endforeach
                {!! $replies->render() !!}
            </ul>
        </div>




