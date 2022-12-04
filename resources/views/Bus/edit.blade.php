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

         <h5 class="card-title fw-bolder mb-3">Ubah Data Bus</h5>

         <form method="post" action="{{ route('bus.update', $data->plat) }}">
            @csrf
            <input type="text" class="form-control visually-hidden" id="plat" name="plat"
               value="{{ $data->plat }}">
            <div class="mb-3">
               <label for="gambar" class="form-label">Gambar</label>
               <input type="text" class="form-control" id="gambar" name="gambar" value="{{ $data->gambar }}">
            </div>
            <div class="mb-3">
               <label for="merk" class="form-label">Merk</label>
               <input type="text" class="form-control" id="merk" name="merk" value="{{ $data->merk }}">
            </div>
            <div class="mb-3">
               <label for="otobus" class="form-label">Otobus</label>
               <input type="text" class="form-control" id="otobus" name="otobus" value="{{ $data->otobus }}">
            </div>
            <div class="mb-3">
               <label for="tipe" class="form-label">Tipe Sebelumnya {{ $data->tipe }}</label>
               <select class="form-select" id="tipe" name="tipe" aria-label="Default select example">
                  <option value="Normal Deck">Normal Deck</option>
                  <option value="High Decker">High Decker</option>
                  <option value="Super High Decker">Super High Decker</option>
                  <option value="Double Decker">Double Decker</option>
               </select>
            </div>
            <div class="mb-3">
               <label for="kelas" class="form-label">Kelas sebelumnya {{ $data->kelas }}</label>
               <select class="form-select" id="kelas" name="kelas" aria-label="Default select example">
                  <option value="Ekonomi" selected>Ekonomi</option>
                  <option value="Executive">Executive</option>
                  <option value="Super Executive">Super Executive</option>
                  <option value="Suite Class">Suite Class</option>
               </select>
            </div>
            <div class="text-center">
               <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
         </form>
      </div>
   </div>

@stop
