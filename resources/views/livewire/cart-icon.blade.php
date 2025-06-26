<div>
    <button type="button" class="text-gray-600 relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
        role="button" aria-controls="offcanvasRight">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-bag" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
        </svg>
        {{-- Badge Notifikasi --}}
        @if ($itemCount > 0)
        <span id="cartCount"
            class="absolute top-0 -mt-1 left-full rounded-full h-5 w-5 -ml-3 bg-green-600 text-white text-center font-semibold text-sm">
            {{ $itemCount }}
            <span class="invisible">item count</span>
        </span>
        @endif
    </button>
</div>