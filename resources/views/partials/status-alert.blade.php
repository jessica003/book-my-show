@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hurray! </strong>{{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Ops! </strong>{{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('errors'))
<div class="alert alert-warning alert-dismissable fade show" role="alert">
    <strong>Ops! </strong>{{ session('errors') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @foreach (session('errors') as $error)
    <p class="mb-0">{{ $error }}</p>
    @endforeach
</div>
@endif