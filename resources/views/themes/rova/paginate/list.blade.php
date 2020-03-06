@if ($paginator->hasPages())

        <ul class="pagination-list text-center">
        @if($paginator->currentPage() > 1)
            <li class="active">
                <a href="{{ $paginator->url($paginator->currentPage()-1) }}"><i class="fa fa-angle-left" aria-hidden="true"></i>
                   {{-- <span class="sr-only">(current)</span>--}}
                </a>
            </li>
        @endif
        <li>
            <a href="{{ $paginator->url(1) }}" {{ ($paginator->currentPage() == 1) ? 'style="background-color: #2a9055"' : '' }}>1</a>
        </li>
        @if(($paginator->currentPage()-2) > 1)
            <li><a href="javascript:void(0)">...</a></li>
        @endif
        @for ($i = 2; $i <= $paginator->lastPage()-1; $i++)
            @if(($paginator->currentPage()+2) > $i && ($paginator->currentPage()-2) < $i)
                <li>
                    <a href="{{ $paginator->url($i) }}" {{ ($paginator->currentPage() == 1) ? 'style="background-color: #2a9055"' : '' }}>{{ $i }}</a>
                </li>
            @endif
        @endfor
        @if(($paginator->currentPage()+2) < $paginator->lastPage())
            <li>
                <a href="javascript:void(0)">...</a>
            </li>
        @endif
        <li>
            <a href="{{ $paginator->url($paginator->lastPage()) }}" {{ ($paginator->currentPage() == 1) ? 'style="background-color: #2a9055"' : '' }}>{{ $paginator->lastPage() }}</a>
        </li>
        @if($paginator->currentPage() < $paginator->lastPage())
            <li class="active">
                <a href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </li>
        @endif
        </ul>

@endif