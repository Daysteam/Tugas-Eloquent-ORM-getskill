@extends('layout.layout')

@section('title','Mahasiswa')

@section('content')
    <h1 class="mt-2">Mahasiswa</h1>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Mahasiswa</th>
            <th>Nim</th>
        </tr>
            @foreach ($mahasiswas as $ms)
                <tr>
                    <td>{{ $ms->nama_mahasiswa }}</td>
                    <td>{{ $ms->nim->no_nim }}</td>
                </tr>
            @endforeach
    </table>
@endsection
