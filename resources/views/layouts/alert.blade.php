@if (session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle"></i>
        <span>
            <strong>{{ session()->get('success') }}</strong>
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    </div>
@endif
@if (session()->get('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle"></i>
        <span>
            <strong>{{ session()->get('fail') }}</strong>
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
