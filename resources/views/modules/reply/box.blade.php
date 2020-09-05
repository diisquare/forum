    <!--TODO: Avatar -->
    <div class="comment-avatar col-md-1"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>

    <div class="comment-box col-md-11">
        <div class="comment-head">
            <h6 class="comment-name"><a href="{{route('users.show',$reply->publisherId)}}">{{getUserName($reply->publisherId)}}</a></h6>
            <span>{{$reply->published_at}}</span>
            @if(Auth::id()==$reply->publisherId)
                <form role="form" method="POST" action="{{route('replies.destroy',$reply->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <i class="fa fa-remove" onclick="deleteReply(this)"></i>
                </form>
                <i class="fa fa-edit" data-toggle="modal" data-target="#modal-update" id="reply-button"></i>
            @endif
            <i class="fa fa-reply" data-toggle="modal" data-target="#modal-reply" id="reply-button" onclick="getInfo(this)"></i>
            <i class="fa fa-heart"></i>
        </div>
        <div class="comment-content">
            {{$reply->content}}
        </div>
        <div hidden>
            <fatherId>{{$reply->id}}</fatherId>
            <atId>{{$reply->publisherId}}</atId>
        </div>
    </div>


<div class="modal fade" id="modal-reply">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('modules.reply.form',['topicType'=>$topicType,'topicId'=>$topic->id,'fatherId'=>0,'atId'=>0])
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST" action="{{route('replies.update',$reply->id)}}">
                @csrf
                <div class="col-md-6">
                    <label>
                        <input type="text" class="form-control" name="content" value="{{$reply->content}}">
                    </label>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">发表</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function getInfo(btn){
        let parent = $(btn).parent().parent();
        let atId = parent.find('atId').text();
        let fatherId = parent.find('fatherId').text();
        console.log(atId);
        console.log(fatherId);
        $("#modal-reply input[name='atId']").val(atId);
        $("#modal-reply input[name='fatherId']").val(fatherId);
    }

    function deleteReply(btn){
        let form = $(btn).parent();
        form.submit();
    }
</script>
