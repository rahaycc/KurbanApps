<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KurbanApp</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
</head>

<body class="flex bg-gray-100 min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-green-800 text-white p-6 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-6">KurbanApp</h1>
            @auth
                @if(auth()->user()->role == 1)
                <nav class="space-y-3">
                    <a href="{{ url('/') }}" class="block p-2 rounded hover:bg-green-700 {{ Request::is('/') ? 'bg-green-900' : '' }}">Dashboard</a>
                    <a href="{{ url('/hewan') }}" class="block p-2 rounded hover:bg-green-700 {{ Request::is('hewan*') ? 'bg-green-900' : '' }}">Data Hewan</a>
                    <a href="{{ url('/laporan') }}" class="block p-2 rounded hover:bg-green-700 {{ Request::is('laporan*') ? 'bg-green-900' : '' }}">Laporan</a>
                </nav>
                @endif
            @endauth

        </div>

        {{-- Logout Button --}}
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full mt-6 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold">
                Logout
            </button>
        </form>
        @endauth
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        // Notifikasi Success
        @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
        @endif

        // Notifikasi Error
        @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            timer: 2000,
            showConfirmButton: false
        });
        @endif

        // Konfirmasi hapus
        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // DateRange Picker untuk laporan
        $(function () {
            $('#date-range').daterangepicker({
                locale: { format: 'YYYY-MM-DD' },
                opens: 'right',
                autoApply: true
            });

            $('#export-button').on('click', function () {
                let dateRange = $('#date-range').val();
                let statusFilter = $('#status-filter').val();
                window.location.href = "{{ route('export.report') }}?date_range=" + encodeURIComponent(dateRange) + "&status=" + encodeURIComponent(statusFilter);
            });
        });
    </script>

</body>
</html>
