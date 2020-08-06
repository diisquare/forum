<form role="form" method="POST" action="{{route('replies.store')}}">
    @csrf
        <input name="topic" type="hidden" value="{{$topicType}}">
        <input name="topicId" type="hidden" value="{{$topicId}}">
        <input name="fatherId" type="hidden" value="{{$fatherId}}">
        <input name="atId" type="hidden" value="{{$atId}}">
        <div class="col-md-6">
            <label>
                <input type="text" class="form-control" name="content">
            </label>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">发表</button>
        </div>
</form>
