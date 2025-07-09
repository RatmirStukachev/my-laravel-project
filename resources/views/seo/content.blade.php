<article class="article">
    @if (isset($point) && $point->content)
        {!! $point->content !!}
    @else
        {!! $page->content !!}
    @endif
</article>