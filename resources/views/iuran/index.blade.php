@extends('layouts.app')

@section('title', 'Data Iuran Warga')

@section('content')

    <h1 class="page-title">Iuran Warga RT</h1>
    <p class="page-subtitle">Kelola dan Pantau Iuran Warga</p>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">

        <div style="flex: 1;"></div>

        <div style="flex: 2; display: flex; justify-content: center;">
            <input type="text" class="form-control" placeholder="🔍 Cari Warga" style="max-width: 400px;">
        </div>

        <div style="flex: 1; display: flex; justify-content: flex-end;">
            <a href="{{ url('/iuran/tambah') }}" class="btn btn-primary">
                + Buat Iuran Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card" style="padding: 0; overflow: hidden;">
        <div class="table-container" style="margin-top: 0; box-shadow: none;">
            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Nama Warga</th>
                        <th width="15%">Tanggal</th>
                        <th width="20%">Jumlah Iuran</th>
                        <th width="15%">Status</th>
                        <th width="10%">Bukti</th>
                        <th width="15%">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($iuranList as $key => $iuran)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div style="font-weight: 600; color: #0A7968;">
                                {{ $iuran->warga->Nama ?? 'Warga Terhapus' }}
                            </div>
                            <small style="color: #666;">{{ $iuran->NIK }}</small>
                        </td>

                        <td>{{ \Carbon\Carbon::parse($iuran->Periode)->format('F Y') }}</td>

                        <td style="font-weight: bold;">Rp {{ number_format($iuran->Nominal, 0, ',', '.') }}</td>

                        <td>
                            <span class="badge badge-selesai">
                                Lunas
                            </span>
                        </td>

                        <td>
                            @if($iuran->Bukti_Iuran)
                                <a href="{{ asset('storage/' . $iuran->Bukti_Iuran) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $iuran->Bukti_Iuran) }}"
                                         alt="Bukti"
                                         style="width: 45px; height: 45px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                                </a>
                            @else
                                <span style="color: #999; font-size: 12px;">-</span>
                            @endif
                        </td>

                        <td>{{ $iuran->Keterangan ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 60px; color: #999;">
                            Warga belum memiliki iuran
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
