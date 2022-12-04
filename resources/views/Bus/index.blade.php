@extends('layouts.admin')

@section('main-content')



   <div class="container ml-4">
      <h4 class="mt-5 ">Data Bus</h4>



      @if ($message = Session::get('success'))
         <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
         </div>
      @endif
      <div class="row justify-content-center mt-3 mb-5">
         @foreach ($bus as $item)
            <div class="card mr-3 mb-3" style="width: 18rem;padding:0px ">
               <img src="{{ $item->gambar }}" class="card-img-top" style="height: 180px" alt="...">
               <div class="card-body">
                  <h5 class="card-title">{{ $item->otobus }}</h5>
                  <table class="table table-borderless" style="margin-left: -8px">
                     <tbody>
                        <tr>
                           <td>Tipe</td>
                           <td>: {{ $item->tipe }}</td>
                        </tr>
                        <tr>
                           <td>Kelas</td>
                           <td>: {{ $item->kelas }}</td>
                        </tr>
                     </tbody>
                  </table>
                  {{-- <p class="card-text">{{ $item->tipe }}</p>
                  <a href="#" class="btn btn-primary">{{ $item->kelas }}</a> --}}
               </div>
            </div>
         @endforeach
      </div>

      <a href="{{ route('bus.create') }}" type="button" class="btn btn-primary rounded-3 mb-2 mt-4">Tambah Bus</a>

      <table class="table table-hover mt-4 ">
         <thead>
            <tr>
               <th>Merk</th>
               <th>Otobus</th>
               <th>Tipe</th>
               <th>Kelas</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($bus as $data)
               <tr>
                  <td>{{ $data->merk }}</td>
                  <td>{{ $data->otobus }}</td>
                  <td>{{ $data->tipe }}</td>
                  <td>{{ $data->kelas }}</td>
                  <td>
                     <a href="{{ route('bus.edit', $data->plat) }}" type="button"
                        class="btn btn-warning rounded-3">Edit</a>

                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#hapusModal{{ $data->plat }}">
                        Delete
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="hapusModal{{ $data->plat }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                              </div>
                              <form method="POST" action="{{ route('bus.delete', $data->plat) }}">
                                 @csrf
                                 <div class="modal-body">
                                    Apakah anda yakin ingin menghapus {{ $data->otobus }}?
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
