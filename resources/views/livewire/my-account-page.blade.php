<main>
    <!-- section -->
    <section>
        <div class="container">
            <!-- row -->
            <div class="grid grid-cols-12 gap-6">
                <!-- col -->
                <div class="lg:col-span-3 md:col-span-4 col-span-12">
                    <div class="pt-10">
                        <!-- nav -->
                        <ul class="nav flex-col nav-pills nav-pills-dark">
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link active gap-2" href="{{ route('my-account.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                        <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                    </svg>
                                    Your Orders
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link gap-2" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>
                                    Settings
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <hr class="pt-3 mt-5" />
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="nav-link gap-2" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                            <path d="M9 12h12l-3 -3" />
                                            <path d="M18 15l3 -3" />
                                        </svg>
                                        Log out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="lg:col-span-9 md:col-span-8 col-span-12">
                    <div class="py-6 md:p-6 lg:p-10">
                        <h2 class="mb-6 text-lg">Your Orders</h2>

                        <div class="block w-full overflow-auto scrolling-touch">
                            <!-- Table -->
                            <table class="w-full max-w-full bg-transparent">
                                <!-- Table Head -->
                                <thead class="bg-gray-100">
                                    <tr class="border-gray-300 border-b">
                                        <th class="py-3 pl-6 text-left">Product</th>
                                        <th class="py-3 pl-6 text-left">Date</th>
                                        <th class="py-3 pl-6 text-left">Items</th>
                                        <th class="py-3 pl-6 text-left">Amount</th>
                                        <th class="py-3 pl-6 text-left">Payment</th>
                                        <th class="py-3 pl-6 text-left">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr class="border-gray-300 border-b">
                                        <td class="align-middle px-6 py-3">
                                            @if ($order->items->isNotEmpty() && $order->items->first()->product)
                                            <a href="{{ route('order.detail', $order) }}"
                                                class="flex items-center text-\">
                                                <img src="{{ url('storage/' . $order->items->first()->product->image) }}"
                                                    alt="{{ $order->items->first()->product->name }}"
                                                    class="w-16 h-16 rounded" />
                                                <div class="ml-3">
                                                    <h6 class="mb-0 font-semibold">{{
                                                        Str::limit($order->items->first()->product->name, 25) }}</h6>
                                                    @if($order->items->count() > 1)
                                                    <small class="text-gray-500">+ {{ $order->items->count() - 1 }} more
                                                        item(s)</small>
                                                    @endif
                                                </div>
                                            </a>
                                            @else
                                            <span class="text-gray-400">Product not available</span>
                                            @endif
                                        </td>
                                        <td class="align-middle px-6 py-3">{{ $order->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="align-middle px-6 py-3">{{ $order->items->sum('quantity') }}</td>
                                        <td class="align-middle px-6 py-3">Rp{{ number_format($order->grand_total, 0,
                                            ',', '.') }}</td>
                                        <td class="align-middle px-6 py-3">
                                            <span class="inline-block p-1 px-2 text-xs align-baseline leading-none rounded-md font-semibold
                                                @if($order->payment_status == 'paid') bg-green-100 text-green-800
                                                @elseif($order->payment_status == 'failed') bg-red-100 text-red-800 
                                                @else bg-gray-200 text-gray-800
                                                @endif">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </td>
                                        <td class="align-middle px-6 py-3">
                                            <span class="inline-block p-1 px-2 text-xs align-baseline leading-none rounded-md font-semibold
                                                    @if($order->status == 'processing') bg-yellow-100 text-yellow-800 @endif
                                                    @if($order->status == 'completed') bg-green-100 text-green-800 @endif
                                                    @if($order->status == 'pending') bg-gray-200 text-gray-800 @endif
                                                    @if($order->status == 'cancelled') bg-red-100 text-red-800 @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="text-gray-500 align-middle px-6 py-3">
                                            {{-- LOGIKA KONDISIONAL BARU --}}
                                            @if ($order->payment_method == 'bank' && $order->payment_status != 'paid')
                                            <div class="dropstart">
                                                <a href="#" class="text-inherit" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('order.detail', $order) }}">
                                                            @if($order->payment_proof)
                                                            Lihat Bukti Bayar
                                                            @else
                                                            Unggah Bukti Bayar
                                                            @endif
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @else
                                            <a href="{{ route('order.detail', $order) }}" class="text-inherit"
                                                title="View Order">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                    <path
                                                        d="M21 12c-2.4 4 -5.4 6 -9 6s-6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6s6.6 2 9 6" />
                                                </svg>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-10">
                                            Anda belum memiliki pesanan. <a href="{{ route('home') }}"
                                                class="text-green-600 font-semibold">Mulai Belanja</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>