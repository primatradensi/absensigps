@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->

        <h1 class="page-title">
          Konfigurasi Lokasi Kantor
        </h1>
      </div>

    </div>
  </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            @if (Session::get('warning'))
                            <div class="alert alert-warning">
                                {{ Session::get('warning') }}
                            </div>
                @endif
                    <form action="/konfigurasi/updatelokasikantor"  method="POST">
                        @csrf
                        <div class="row">
                          <div class="col-12">
                            <div class="input-icon mb-3">
                              <span class="input-icon-addon">
                              <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor" />
                              </svg>
                              </span>
                              <input type="text" value="{{ $lok_kantor->lokasi_kantor }}" id="lokasi_kantor" class="form-control" name="lokasi_kantor" placeholder="Lokasi kantor">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="input-icon mb-3">
                              <span class="input-icon-addon">
                              <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radar-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M15.51 15.56a5 5 0 1 0 -3.51 1.44" /><path d="M18.832 17.86a9 9 0 1 0 -6.832 3.14" /><path d="M12 12v9" />
                              </svg>
                              </span>
                              <input type="text" value="{{ $lok_kantor->radius }}" id="radius" class="form-control" name="radius" placeholder="Radius">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <button class="btn btn-success w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                            </svg>
                              Update
                            </button>
                          </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection