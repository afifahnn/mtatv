@extends('main-layout')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@section('main-content')
    <div id="jadwal-acara-container">
        <div class="title">
            <h3 style="font-family: Poppins, sans-serif; margin-top: 25px; margin-right: 10px; font-size: 25px; color: #333;">JADWAL ACARA</h3>
            <hr style="flex: 1; border: none; height: 3px; margin-top: 43px; background-image: linear-gradient(to right, #073E06 80%, #073E06 90%, #D08442 49%); background-size: 100% auto;">
        </div>

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach($jadwalMingguan as $hari => $jadwal)
                    <div class="carousel-item {{ $hari === $hariIni ? 'active' : '' }}">
                        <div class="nama-hari">
                            <p id="current-day">{{ strtoupper($hari) }}</p>
                        </div>
                        <div class="jadwal-layout">
                            <div class="jadwal-acara">
                                <table class="jadwal-table">
                                    <thead>
                                    <tr>
                                        <th>Program Acara</th>
                                        <th>Jam Tayang</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jadwal as $item)
                                        @php
                                            $isPast = \Carbon\Carbon::parse($item->jam_selesai)->isPast();
                                        @endphp
                                        <tr class="{{ $isPast && $hari === $hariIni ? 'text-decoration-line-through' : '' }}">
                                            <td>{{ $item->program_acara }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }} WIB</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="btn-custom" aria-hidden="true"> < </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="btn-custom" aria-hidden="true"> > </span>
            </button>
        </div>

    </div>
@endsection
