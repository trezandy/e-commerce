<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{-- Aset CSS Anda --}}
    <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.46.0/tabler-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

    @livewireStyles

    {{-- Script Midtrans diletakkan di HEAD --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <title>E-Commerce Project</title>
</head>

<body>
    {{-- Header --}}
    <x-layouts.header />

    {{-- Modal Otentikasi --}}
    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- Konten modal akan diisi oleh komponen Livewire --}}
                <livewire:auth-modal />
            </div>
        </div>
    </div>

    {{-- Mini Cart Off-canvas --}}
    <div class="offcanvas offcanvas-right" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-b">
            <div>
                <h5 id="offcanvasRightLabel">Keranjang Belanja</h5>
            </div>
            <button type="button" class="btn-close text-inherit" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">
            <livewire:shopping-cart />
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    {{-- Footer Anda --}}
    <x-layouts.footer />

    {{-- Aset JS Pihak Ketiga (Bootstrap, Swiper, dll.) --}}
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/countdown.js') }}"></script>
    <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/tns-slider.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/zoom.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/language.js') }}"></script>
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js"></script>

    {{-- Livewire Scripts, penting untuk diletakkan sebelum script custom kita --}}
    @livewireScripts
    {{-- BLOK SCRIPT UNTUK FUNGSI NORMAL (SWAL & MODAL) --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Listener untuk notifikasi toast SweetAlert
            Livewire.on('swal:toast', event => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
                Toast.fire({
                    icon: event[0].type,
                    title: event[0].title
                });
            });

            // Listener untuk menutup modal
            Livewire.on('close-modal', modalId => {
                const modalElement = document.getElementById(modalId);
                if (modalElement) {
                    const modal = bootstrap.Modal.getInstance(modalElement);
                    if (modal) {
                       modal.hide();
                    }
                }
            });

            // Listener untuk membuka modal login/register secara paksa
            Livewire.on('open-auth-modal', () => {
                const authModalElement = document.getElementById('authModal');
                if (authModalElement) {
                    // Gunakan API Bootstrap 5 untuk menampilkan modal
                    const modal = new bootstrap.Modal(authModalElement);
                    modal.show();
                }
            });

            
        });
    </script>

    {{-- BLOK SCRIPT KHUSUS UNTUK MIDTRANS --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Listener khusus untuk redirect Midtrans, dibungkus verbatim
            @verbatim
            Livewire.on('snap-redirect', (event) => {
                if (window.snap) {
                    snap.pay(event.token, {
                        onSuccess: function(result){ window.location.href = '/order/' + result.order_id; },
                        onPending: function(result){ window.location.href = '/order/' + result.order_id; },
                        onError: function(result){ alert('Pembayaran gagal!'); },
                        onClose: function(){ /* opsional: bisa ditambahkan notifikasi */ }
                    });
                }
            });
            @endverbatim
        });
    </script>

    @stack('scripts')
</body>

</html>