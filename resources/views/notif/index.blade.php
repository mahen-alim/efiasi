@extends('layouts.master')

@section('content')
<div class="col-xl-12 mb-4 d-flex">
  <div class="card w-100" id="card-notif">
      <div class="card-body p-3">
          @foreach($users as $user)
              @if ($user->level == 'END USER' && $user->services->isNotEmpty())
                  <div class="row">
                      <div class="col-12">
                          <div class="numbers text-center">
                              <p class="mb-0 text-capitalize font-weight-bold">{{ $user->name }}</p>            
                          </div>
                          <hr class="horizontal dark mt-0">
                          <div class="shadow-2" id="shadow-2">
                              <!-- Menampilkan layanan pengguna -->
                              @foreach ($user->services as $service)
                                  <h6 style="color: white; font-size: 15px;">
                                      Servis: <span class="font-weight-regular">{{ $service->tipe_service }}</span>
                                  </h6>
                                  <h6 style="color: white; font-size: 15px;">
                                    Durasi Pengerjaan: <span class="font-weight-regular">{{ $service->duration }} Jam</span>
                                  </h6>
                                  <h6 style="color: white; font-size: 15px;">
                                      Total Bayar: <span class="font-weight-regular">{{ $service->price }}</span>
                                  </h6>
                                  <h6 style="color: white; font-size: 15px;">
                                      Waktu Pesan: <span class="font-weight-regular">{{ $service->created_at->format('Y-m-d') }}</span>
                                  </h6>
                              @endforeach
                          </div>
                          <div class="d-flex justify-content-end" style="gap: 20px;">
                              <button type="submit" class="btn wa-logo" data-phone="{{ $user->no_hp }}" id="btn-confirm" style="width: 50%;">Konfirmasi</button>
                              <form action="{{ route('dashboard.notif.destroy', $service->id) }}" method="POST" style="width: 50%;">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn" id="btn-cancel" onclick="return confirm('Apakah anda yakin akan membatalkan pesanan ini?')"
                                    value="Batalkan" style="width: 100%;">
                            </form>
                          </div>
                      </div>
                  </div>
              @endif
          @endforeach
      </div>
  </div>
</div>

  @endsection