@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="section-title">Semua Notifikasi

        </div>
        <section class="section">
            @include('sweetalert::alert')
            <div class="table-responsive">

                <table class="table table-sm" id="datatable">
                    <thead>
                        <tr>

                            <th scope="col">ID Notifikasi</th>
                            <th scope="col">Message</th>
                            <th scope="col">Created At</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>

                            <td>{{ $row->id }}</td>
                            <td>
                                @if(Auth::user()->role=='admin')
                                {{ $row->user->name }} terlambat mengembalikan buku <b>"{{ $row->buku->judul }}"</b> dengan idBuku {{ $row->buku->isbn }}

                                @else

                                Anda terlambat mengembalikan buku "{{ $row->buku->judul }}"
                                @endif
                            </td>
                            <td>{{ $row->created_at }} ({{ $row->created_at->diffForHumans() }})</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')

<script>

</script>
{{-- <script src="{{ asset('sweeta') }}"></script> --}}
@endsection
