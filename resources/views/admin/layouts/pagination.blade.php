<div class="pagination-area rs-color text-center mt-30 md-mt-0">
    <ul class="pagination-part">
        @if($paginator->lastPage() > 1)
        @if($paginator->currentPage() == 1)
        <li><a href="{{ $paginator->url($paginator->currentPage() + 1) }}">Next <i
                    class="fa fa-long-arrow-right"></i></a></li>
        @elseif($paginator->currentPage() == $paginator->lastPage())
        <li><a href="{{ $paginator->url($paginator->currentPage() + 1) }}">Prev <i
                    class="fa fa-long-arrow-left"></i></a></li>
        @else
        <li><a href="{{ $paginator->url($paginator->currentPage() - 1) }}">Prev <i
                    class="fa fa-long-arrow-left"></i></a></li>
        <li><a href="{{ $paginator->url($paginator->currentPage() + 1) }}">Next <i
                    class="fa fa-long-arrow-right"></i></a></li>
        @endif
        @endif
    </ul>
</div>