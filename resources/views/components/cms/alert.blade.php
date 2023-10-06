@if (session()->has('alertMessage'))
    <div class="alert alert-{{ session('alertType') }} alert-dismissible fade show" role="alert">
        {{ session('alertMessage') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->count() > 0)
    <div class="alert alert-custom alert-danger fade show mb-12" role="alert" x-data=""
    x-init="window.scrollTo(0,$el.offsetTop)">
        <div class="alert-icon"><i class="fa fa-exclamation-circle"></i></div>
        @if (session()->has('errorMessage'))

        <div class="alert-text">{{ session('errorMessage') }}</div>
        @else

        @foreach ($errors->all() as $item)
            <div class="alert-text">{{ $item}}</div>
        @endforeach
        @endif
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
