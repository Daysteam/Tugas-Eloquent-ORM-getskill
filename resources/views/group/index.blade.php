@extends('layout.layout')

@section('title', 'Pengguna')

@section('content')
    <h1 class="my-2">Daftar Pengguna</h1>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Grup</th>
            <th>Daftar Pengguna</th>
        </tr>

        @foreach ($groups as $g)
            <tr>
                <td>{{ $g->nama_group }}</td>
                <td>
                    <ul>
                        @foreach ($g->pengguna as $p)
                            <li>{{ $p->nama_pengguna }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
