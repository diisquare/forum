@if (Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>
            <i class="fa fa-exclamation-triangle fa-lg fa-fw"></i> error.
        </strong>
        {{ Session::get('error') }}
    </div>
@endif
