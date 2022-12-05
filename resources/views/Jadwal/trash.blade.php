@extends('layouts.admin')

@section('main-content')

   <h4 class="mt-5 ml-4">Data Trash</h4>

   <a href="{{ route('jadwal.index') }}" type="button" class="btn btn-dark rounded-3 ml-4">Back</a>

   @if ($message = Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
         {{ $message }}
      </div>
   @endif

   <table class="table table-hover mt-4 mx-4">
      <thead>
         <tr>
            <th>Rute</th>
            <th>Tanggal</th>
            <th>Keberangkatan</th>
            <th>Otobus</th>
            <th>Kelas</th>
            <th>Harga</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($trash as $data)
            <tr>
               <td>{{ $data->rute }}</td>
               <td>{{ $data->tgl }}</td>
               <td>{{ $data->keberangkatan }}</td>
               <td>{{ $data->otobus }}</td>
               <td>{{ $data->kelas }}</td>
               <td>{{ $data->harga }}</td>
               <td>
                  @method('POST')
                  <form method="POST" action="{{ route('jadwal.restore', $data->id_jadwal) }}">
                     @csrf
                     <button type="submit" class="btn btn-primary">Restore</button>
                  </form>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal"
                     data-bs-target="#hapusModal{{ $data->id_jadwal }}">
                     Delete Permanent
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapusModal{{ $data->id_jadwal }}" tabindex="-1"
                     aria-labelledby="hapusModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form method="POST" action="{{ route('jadwal.delete', $data->id_jadwal) }}">
                              @csrf
                              <div class="modal-body">
                                 Apakah anda yakin ingin menghapus {{ $data->rute }}?
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
@stop
