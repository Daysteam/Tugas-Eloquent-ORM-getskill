@extends('layout.layout')

@section('title','Pembeli')

@section('content')
    <h1 class="mt-2">Daftar Pembeli</h1>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Pembeli</th>
            <th>Barang</th>
        </tr>

        @foreach ($pembelis as $pembeli)
            <tr>
                <td>{{ $pembeli->nama_pembeli }}</td>

                <td>
                    @foreach ($pembeli->barangs as $barang)
                        <div class="card mb-1">
                            <div class="card-body">
                                {{ $barang->nama_barang }}
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
@endsection