@extends('layouts.main')

@section('Container')
<div>
    <h1 class="p-5">Kelola Wisata Anda</h1>
    <div class="table p-5">

        <table id="myTable" style="color: black;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Wisata</th>
                    <th>Jumlah Tiket</th>
                    <th>Edit</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('getaWisata') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nama', name: 'nama' },
                { data: 'jumlahTiket', name: 'jumlahTiket' },
                {
                    data: null,
                    render: function (data) {
                        return '<a href="' + "{{ route('editWisata', '') }}" + '/' + data.id + '"><i class="bi bi-pencil-square"></i></a>';
                    },
                    orderable: false,
                    searchable: false
                },

            ]
        });

        // Menangani klik tombol delete
        $('#myTable').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ url('deleteWisata') }}' + '/' + id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        $('#myTable').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        console.error('Error:', data);
                    }
                });
            }
        });
    });
</script>

@endsection
