@extends('layouts.admin')

@section('main-content')

   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif

   <div class="card mt-4">
      <div class="card-body">

         <h5 class="card-title fw-bolder mb-3">Ubah Data Jadwal</h5>

         <form method="post" action="{{ route('jadwal.update', $data->id_jadwal) }}">
            @csrf
            <input type="text" class="form-control visually-hidden" id="id_jadwal" name="id_jadwal"
               value="{{ $data->id_jadwal }}">
            <div class="mb-3">
               <label for="rute" class="form-label">Rute</label>
               <input type="text" class="form-control" id="rute" name="rute" value="{{ $data->rute }}">
            </div>
            <div class="mb-3">
               <label for="tgl" class="form-label">Tanggal</label>
               <input type="text" class="form-control" id="tgl" name="tgl" value="{{ $data->tgl }}">
            </div>
            <div class="mb-3">
               <label for="keberangkatan" class="form-label">Keberangkatan</label>
               <input type="date" class="form-control" id="keberangkatan" name="keberangkatan"
                  value="{{ $data->keberangkatan }}">
            </div>
            <div class="mb-3">
               <label for="harga" class="form-label">Harga</label>
               <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            </div>
            <div class="mb-3">
               <label for="plat" class="form-label">Otobus sebelumnya {{ $data->otobus }} - {{ $data->kelas }}</label>
               <select class="form-select" id="plat" name="plat" aria-label="Default select example">
                  @foreach ($bus as $item)
                     <option value="{{ $item->plat }}">{{ $item->otobus }} - {{ $item->kelas }}</option>
                  @endforeach
                  {{-- <option value="2">Po Haryanto</option>
                  <option value="3">Jiwa Seraya</option>
                  <option value="4">Sarotaga</option> --}}
               </select>
            </div>
            <div class="text-center">
               <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
         </form>
      </div>
   </div>

@stop
