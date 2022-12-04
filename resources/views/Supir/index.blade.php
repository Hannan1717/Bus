@extends('layouts.admin')

@section('main-content')

   <div class="container mx-4">
      <h4 class="mt-5 ">Data Supir</h4>
      <form class="d-flex mb-4" role="search" action="{{ route('supir.index') }}" method="GET">
         <input class="form-control me-2" id="search" name="search" value="{{ request('keyword') }}" type="search"
            placeholder="Cari Supir" aria-label="Search">
         <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <a href="{{ route('supir.create') }}" type="button" class="btn btn-primary rounded-3">Tambah Data</a>
      <a href="{{ route('supir.trash') }}" type="button" class="btn btn-danger rounded-3">Trash</a>

      @if ($message = Session::get('success'))
         <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
         </div>
      @endif

      <table class="table table-hover mt-4">
         <thead>
            <tr>
               <th>Nama</th>
               <th>Jam Terbang</th>
               <th>Merk</th>
               <th>Otobus</th>
               <th>Kelas</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($supir as $data)
               <tr>
                  <td>{{ $data->nama_supir }}</td>
                  <td>{{ $data->jam_terbang }} tahun</td>
                  <td>{{ $data->merk }}</td>
                  <td>{{ $data->otobus }}</td>
                  <td>{{ $data->kelas }}</td>
                  <td>
                     <a href="{{ route('supir.edit', $data->id_supir) }}" type="button"
                        class="btn btn-warning rounded-3">Edit</a>

                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#hapusModal{{ $data->id_supir }}">
                        Delete
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="hapusModal{{ $data->id_supir }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                              </div>
                              <form method="POST" action="{{ route('supir.destroy', $data->id_supir) }}">
                                 @csrf
                                 <div class="modal-body">
                                    Apakah anda yakin ingin menghapus {{ $data->nama_supir }}?
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>

@stop
