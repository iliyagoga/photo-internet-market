<div class="breadcrumbs">
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!is_null($breadcrumb->url) && !$loop->last)
            <span><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></span>
            <span>/</span>
        @else
            <span class="active">{{ $breadcrumb->title }}</sp>
        @endif
    @endforeach
</div>