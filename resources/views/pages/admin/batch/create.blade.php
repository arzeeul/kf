@extends('layouts.admin')

@section('title')
    Batch
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="book-open"></i></div>
                                Tambah Batch Record
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('batch') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke Semua Batch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('batch.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">Form Batch</div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="department_id" class="col-sm-3 col-form-label">Produk</label>
                                    <div class="col-sm-9">
                                        <select name="department_id" class="form-control selectx" id="department_id"
                                            required>
                                            <option value="">Pilih..</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="letter_no" class="col-sm-3 col-form-label">Kode Dokumen</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                            value="{{ old('kode') }}" id="kode" name="kode"
                                            placeholder="Kode Dokumen.." required readonly>
                                    </div>
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_no" class="col-sm-3 col-form-label">Kode Bahan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('kode_bahan') is-invalid @enderror"
                                            value="{{ old('kode_bahan') }}" id="kode_bahan" name="kode_bahan"
                                            placeholder="Kode Bahan.." required readonly>
                                    </div>
                                    @error('kode_bahan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_no" class="col-sm-3 col-form-label">Kode Jadi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('kode_jadi') is-invalid @enderror"
                                            value="{{ old('kode_jadi') }}" id="kode_jadi" name="kode_jadi"
                                            placeholder="Kode Jadi.." required readonly>
                                    </div>
                                    @error('kode_jadi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_no" class="col-sm-3 col-form-label">No. Bets</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('bets_no') is-invalid @enderror"
                                            value="{{ old('bets_no') }}" name="bets_no" placeholder="Nomor Surat.."
                                            required>
                                    </div>
                                    @error('bets_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_date" class="col-sm-3 col-form-label">Tanggal PO</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('bets_date') is-invalid @enderror"
                                            value="{{ old('bets_date') }}" name="bets_date" required>
                                    </div>
                                    @error('bets_Date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endpush

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".selectx").select2({
            theme: "bootstrap-5"
        });

        $(document).ready(function() {
            $('#department_id').on('change', function() {
                var department_id = this.value;

                $.ajax({
                    url: "{{ url('admin/get-produk-kode') }}/" + department_id,
                    type: "post",
                    data: {
                        id: department_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#kode').val(result.departmen[0].kode_dokumen)
                        $('#kode_bahan').val(result.departmen[0].kode_bahan)
                        $('#kode_jadi').val(result.departmen[0].kode_jadi)
                    }
                });
            });
        });
    </script>
@endpush
