<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KurbanApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

<!-- Laporan -->

</head>
<body class="flex">

    {{-- Sidebar --}}
    <div class="w-64 h-screen bg-green-800 text-white p-4 space-y-4">
        <h1 class="text-2xl font-bold">KurbanApp</h1>
        <a href="/" class="block p-2 bg-green-900 rounded">Dashboard</a>
        <a href="/hewan" class="block p-2 hover:bg-green-700 rounded">Data Hewan</a>
        <a href="/laporan" class="block p-2 hover:bg-green-700 rounded">Laporan</a>
    </div>

    {{-- Main --}}
    <div class="flex-1 p-6 bg-gray-50">
       @yield('content')
    </div>



   <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Include Moment.js -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Include DateRangePicker JS -->
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
        form.addEventListener('submit', function(e) {
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
</script>
<script>
$(function() {
    // Inisialisasi Date Range Picker
    $('#date-range').daterangepicker({
        locale: { format: 'YYYY-MM-DD' },
        opens: 'right',
        autoApply: true
    });

    // Handle klik tombol Export
    $('#export-button').on('click', function() {
        var dateRange = $('#date-range').val();
        var statusFilter = $('#status-filter').val();

        // Redirect ke route export dengan parameter
        window.location.href = "{{ route('export.report') }}?date_range=" + encodeURIComponent(dateRange) + "&status=" + encodeURIComponent(statusFilter);
    });
});
</script>



</body>
</html>
