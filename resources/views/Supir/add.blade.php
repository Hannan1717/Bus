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

         <h5 class="card-title fw-bolder mb-3">Tambah Supir</h5>

         <form method="post" action="{{ route('supir.store') }}">
            @csrf
            <div class="mb-3">
               <label for="nama_supir" class="form-label">Nama</label>
               <input type="text" class="form-control" id="nama_supir" name="nama_supir">
            </div>
            <div class="mb-3">
               <label for="jam_terbang" class="form-label">Jam Terbang</label>
               <input type="text" class="form-control" id="jam_terbang" name="jam_terbang">
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
