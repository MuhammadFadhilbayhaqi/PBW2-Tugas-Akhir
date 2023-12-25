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
                {{-- <th>Tiket Terjual</th> --}}
                <th>Edit</th> <!-- Tambahkan kolom "View" -->
                </tr>
            </thead>
        </table>

</div>
</div>


@endsection
