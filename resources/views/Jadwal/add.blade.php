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

         <h5 class="card-title fw-bolder mb-3">Tambah Jadwal</h5>

         <form method="post" action="{{ route('jadwal.store') }}">
            @csrf
            <div class="mb-3">
               <label for="rute" class="form-label">Rute</label>
               <input type="text" class="form-control" id="rute" name="rute">
            </div>
            <div class="mb-3">
               <label for="tgl" class="form-label">Tanggal</label>
               <input type="date" class="form-control" id="tgl" name="tgl">
            </div>
            <div class="mb-3">
               <label for="keberangkatan" class="form-label">Keberangkatan</label>
               <input type="text" class="form-control" id="keberangkatan" name="keberangkatan">
            </div>
            <div class="mb-3">
               <label for="harga" class="form-label">Harga</label>
               <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
               <label for="plat" class="form-label">Otobus</label>
               <select class="form-select" id="plat" name="plat" aria-label="Default select example">
                  @foreach ($bus as $b)
                     <option value="{{ $b->plat }}">{{ $b->otobus }} - {{ $b->kelas }}</option>
                  @endforeach
               </select>
            </div>
            <div class="text-center">
               <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
         </form>
      </div>
   </div>

@stop
