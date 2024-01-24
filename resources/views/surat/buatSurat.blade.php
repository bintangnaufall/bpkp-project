@extends('layout.main')

@section('title', 'Users')

@section('css')

    <style>
        label {
          color: black;
        }
        table.dataTable.no-footer {
            border-bottom: 1px solid rgb(255 255 255) !important;
            border-top: 1px solid rgb(255 255 255);
        }
        table.dataTable {
            border-color: white !important;
        }
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
        }
        table.dataTable th.dt-center, table.dataTable td.dt-center, table.dataTable td.dataTables_empty 
        {
            color: white;
        }
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            color: white !important;
        }
        .text-center {
            text-align: justify !important;
        }
        td {
          color: #fff;  
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
          border: 1px solid rgb(255 255 255);
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
          border: 1px solid #f8f8f84e;
        }
        .dataTables_wrapper .dataTables_length select {
          background-color: rgba(26, 20, 20, 0.521) !important;
          color: white;
        }
        table.dataTable.display tbody tr.even>.sorting_1, table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
            background-color: #191C24 !important;
        }
        .content .navbar .sidebar-toggler, .content .navbar .navbar-nav .nav-link i {
            margin-right: 1.5rem;
        }
        .stepper {
            .line {
                width: 2px;
                background-color: lightgrey !important;
            }
            .lead {
                font-size: 1.1rem;
            }
        }
        /* .pr-4 {
            padding-right: 0.5rem;
        } */
        input:disabled {
            background-color: #c6c6c6 !important; /* Warna abu-abu */
            color: #ffffff; /* Warna teks yang sesuai */
            cursor: not-allowed; /* Ganti kursor menjadi "not-allowed" */
        }
        hr:not([size]) {
            color: white;
        }
        .btn-1 {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #cdd1e6;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: #0dcaf0;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 3px 20px 20px 3px !important;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        @media (min-width: 1200px){
          .modal-xl {
              max-width: 1030px;
          }
        }
        @media (min-width: 992px) {
            .modal-lg, .modal-xl {
            max-width: 830px  !important;
          }
        }
    </style>
@endsection

@section('navtop') 
<a href="#" class="mx-3 {{ Request::is('*disposisi_surat') ? 'text-primary' : 'text-white' }}">Manajemen Surat</a>
<a href="{{ route('surat.buat_surat.show') }}" class="ml-3 {{ Request::is('*buat_surat') ? 'text-primary' : 'text-white' }}">Buat Surat</a>
<a href="#" class="mx-3 text-white">Disposisi Surat</a>
<a href="#" class="text-white">Arsip</a>
@endsection

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-white text-center rounded p-4 shadow-lg">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Pembuatan Surat Penugasan</h1>
      </div>
      <div class="stepper d-flex flex-column mt-5 ml-2">
        <div class="d-flex mb-1">
          <div class="d-flex flex-column align-items-center">
            {{-- <div class="rounded-circle py-2 px-3 bg-success text-white mb-1">1</div> --}}
            {{-- <div class="line h-100"></div> --}}
          </div>
          <div class="container">
            <h5 class="">Formulir Surat</h5>
{{-- -------------------------------------------------------------------------------identitas Surat-----------------------------------------------}}
        <form action="javascript:void(0)" id="form_surat" enctype="multipart/form-data">
              <div class="border-3 border p-3 rounded mb-5">
              <h6>*Identitas Surat</h6>
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label for="nomor_surat">Nomor Surat</label>
                      <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Nomor Surat" disabled>
                  </div>
                  <div class="col-md-6">
                      <label for="tanggal_surat">Tanggal Surat</label>
                      <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" placeholder="Tanggal Surat">
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-md-12">
                      <label for="lampiran_surat">Lampiran Surat</label>
                      <input type="text" name="lampiran_surat" id="lampiran_surat" class="form-control" placeholder="Lampiran Surat">
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-md-12">
                      <label for="perihal_surat">Perihal Surat</label>
                      <textarea type="text" name="perihal_surat" id="perihal_surat" class="form-control" placeholder="Perihal Surat" rows="3"></textarea>
                  </div>
              </div>
              <hr>
              <div class="row" id="dynamic_form-3">
                <div class="form-group baru-data-3">
                  <div class="col-md-12">
                      <label for="tujuan_surat">Tujuan Surat</label>
                      <textarea id="tujuan_surat" name="tujuan_surat[]" placeholder="Tujuan Surat" class="form-control tujuan_surat" rows="3"></textarea>
                  </div>
                  <div class="button-group d-flex justify-content-center mt-2 mb-3">
                      <button type="button" class="btn btn-success btn-tambah-3 mx-2">Tambah Isian Tujuan Surat <i class="fa fa-plus"></i></button>
                      <button type="button" class="btn btn-danger btn-hapus-3" style="display:none;">Hapus <i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                  <div class="col-md-12">
                      <label for="alamat_tujuan">Alamat Surat</label>
                      <input type="text" name="alamat_tujuan" id="alamat_tujuan" class="form-control" placeholder="Alamat Instansi / Pejabat">
                  </div>
              </div>
            </div>
{{-- -------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
              <div class="border-3 border p-3 rounded mb-3">
                <h6>*Isian Surat</h6>
                <div class="row" id="dynamic_form">
	                <div class="form-group baru-data">
		                <div class="col-md-12">
                        <label for="dasar_acuan">Dasar Acuan Surat</label>
		                    <textarea id="dasar_acuan" name="dasar_acuan[]" placeholder="Dasar Acuan Penugasan" class="form-control dasar_acuan" rows="3"></textarea>
		                </div>
		                <div class="button-group d-flex justify-content-center mt-2 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah mx-2">Tambah Isian Dasar Acuan <i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus" style="display:none;">Hapus <i class="fa fa-times"></i></button>
		                </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                      <label for="rincian_pelaksanaan_penugasan">Rincian Pelaksanaan Penugasan</label>
                      <textarea type="text" name="rincian_pelaksanaan_penugasan" id="rincian_pelaksanaan_penugasan" class="form-control" placeholder="kami....." rows="3"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                      <label for="beban_anggaran">Beban Anggaran</label>
                      <textarea type="text" name="beban_anggaran" id="beban_anggaran" class="form-control" placeholder="Beban Anggaran" rows="3"></textarea>
                  </div>
                </div>
              </div>
{{----------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
                <div class="border-3 border p-3 rounded mb-3">
                  <h6>*Penandatangan Surat</h6>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <label for="jabatan_id">Jabatan</label>
                      <select class="form-select" aria-label="Default select example" name="jabatan_id" id="jabatan_id">
                        <option value="" disabled selected hidden>Pilih Jabatan</option>
                        @foreach($jabatans as $jabatan)
                          <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_pejabat">Nama Pejabat</label>
                        <input type="text" name="nama_pejabat" id="nama_pejabat" class="form-control" placeholder="Nama Pejabat">
                    </div>
                    <div class="col-md-6">
                      <label for="nip">NIP</label>
                      <div class="input-group">
                        <input type="text" name="nip_pejabat"  id="nip" class="form-control" placeholder="NIP">
                        <div class="input-group-append">
                          <button class="btn-1 btn-info" id="search_nip" type="button">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
{{-- -------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
              <div class="border-3 border p-3 rounded mb-3">
                <h6>*Tembusan Surat</h6>
                <div class="row" id="dynamic_form-2">
	                <div class="form-group baru-data-2">
		                <div class="col-md-12">
		                    <textarea id="tembusan_surat" name="tembusan_surat[]" placeholder="Tembusan Surat" class="form-control tembusan_surat" rows="3"></textarea>
		                </div>
		                <div class="button-group d-flex justify-content-center mt-2 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah-2 mx-2">Tambah Isian Tembusan <i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus-2" style="display:none;">Hapus <i class="fa fa-times"></i></button>
		                </div>
                  </div>
                </div>
              </div>
{{-- -------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
              <div class="border-3 border p-3 rounded mb-3">
                <h6>*Lampiran Surat</h6>
                <div class="row" id="dynamic_form-4">
	                <div class="form-group baru-data-4" style="margin-bottom: -25px">
		                <div class="col-md-12">
                      <input class="form-control" type="file" name="lampiran[]" id="formFile">
		                </div>
		                <div class="button-group d-flex justify-content-center mt-4 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah-4 mx-2">Tambah Isian Tembusan <i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus-4" style="display:none;">Hapus <i class="fa fa-times"></i></button>
		                </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
        </div>
        <div class="d-flex mb-1">
          <div class="d-flex flex-column pr-4 align-items-center">
            {{-- <div class="rounded-circle py-2 px-3 bg-success text-white mb-1">2</div>
            <div class="line h-100"></div>
          </div> --}}
          <div>
            <div class="container">
              <h5 class="text-white">Bentuk Surat</h5>
              <button id="show_layout" class="btn btn-warning"><i class="bi bi-info-square"></i>  Layout Surat</button>
              <button id="show_preview" class="btn btn-info"><i class="bi bi-eye"></i>  Preview Surat</button>
            </div>
          </div>
        </div>
        <div class="d-flex mb-1">
          <div class="d-flex flex-column pr-4 align-items-center">
            {{-- <div class="rounded-circle py-2 px-3 bg-success text-white mb-1">3</div>
            <div class="line h-100 d-none"></div> --}}
          </div>
          <div>
            {{-- <h5 class="text-dark">Make changes and push!</h5>
            <p class="lead text-muted pb-3">Now make changes to your application source code, test it then commit &amp; push</p> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- modal --}}
  <div class="modal fade" id="ModalPDf" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="labelModal" style="color: black"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <iframe id="pdfViewer" src="" loading="lazy" width="800px" height="1000px"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-md waves-effect rounded waves-light btnCancel" title="Batal" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary btn-md waves-effect rounded waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2" id="saveButton">Save</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.11/dist/sweetalert2.all.js"></script>

    <script>
      $(document).ready(function () {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': csrfToken
            },
        });
        function addFormsss() {
          var addrow = '<div class="form-group baru-data-4" style="margin-bottom: -25px">\
              <div class="col-md-12">\
                <input class="form-control" type="file" name="lampiran[]" id="formFile">\
              </div>\
              <div class="button-group d-flex justify-content-center mt-4 mb-4">\
                  <button type="button" class="btn btn-success btn-tambah-4 mx-2">Tambah Isian Tujuan Surat <i class="fa fa-plus"></i></button>\
                  <button type="button" class="btn btn-danger btn-hapus-4">Hapus <i class="fa fa-times"></i></button>\
              </div>\
          </div>';
          $("#dynamic_form-4").append(addrow);
        }

        $("#dynamic_form-4").on("click", ".btn-tambah-4", function () {
            addFormsss();
            $(".btn-hapus-4").show();
            $(this).hide();
        });

        $("#dynamic_form-4").on("click", ".btn-hapus-4", function () {
            $(this).closest('.baru-data-4').remove();
            var bykrow = $(".baru-data-4").length;
            if (bykrow === 1) {
                $(".btn-hapus-4").hide();
                $(".btn-tambah-4").show();
            } else {
                $('.baru-data-4:last .btn-hapus-4').show();
            }
        });
        //-----dynamicform_dasar_acuan------
        function addForm() {
            var addrow = '<div class="form-group baru-data">\
                <div class="col-md-12">\
                    <textarea name="dasar_acuan[]"" placeholder="Dasar Acuan Penugasan" class="form-control dasar_acuan" rows="3"></textarea>\
                </div>\
                <div class="button-group d-flex justify-content-center mt-2 mb-3">\
                    <button type="button" class="btn btn-success btn-tambah mx-2">Tambah Isian Dasar Acuan <i class="fa fa-plus"></i></button>\
                    <button type="button" class="btn btn-danger btn-hapus">Hapus <i class="fa fa-times"></i></button>\
                </div>\
            </div>';
            $("#dynamic_form").append(addrow);
        }

        $("#dynamic_form").on("click", ".btn-tambah", function () {
            addForm();
            $(this).css("display", "none");
            $(".btn-hapus").css("display", "none");
            $(".baru-data:last .btn-hapus").show();
        });

        $("#dynamic_form").on("click", ".btn-hapus", function () {
          $(this).closest('.baru-data').remove();
            $(".baru-data:last .btn-tambah").show(); 
            var bykrow = $(".baru-data").length;
            if (bykrow == 1) {
                $(".btn-hapus").css("display", "none");
                // $(".btn-tambah").css("display", "");
            } else {
                $('.baru-data:last .btn-hapus').css("display", "");
            }
        });
          //-----dynamicform_tembusan_surat------
        function addForms() {
            var addrow = '<div class="form-group baru-data-2">\
                <div class="col-md-12">\
                    <textarea name="tembusan_surat[]" placeholder="Tembusan Surat" class="form-control" rows="3"></textarea>\
                </div>\
                <div class="button-group d-flex justify-content-center mt-2 mb-3">\
                    <button type="button" class="btn btn-success btn-tambah-2 mx-2">Tambah Isian Tembusan <i class="fa fa-plus"></i></button>\
                    <button type="button" class="btn btn-danger btn-hapus-2">Hapus <i class="fa fa-times"></i></button>\
                </div>\
            </div>';
            $("#dynamic_form-2").append(addrow);
        }

        $("#dynamic_form-2").on("click", ".btn-tambah-2", function () {
            addForms();
            $(this).css("display", "none");
            $(".btn-hapus-2").css("display", "none");
            $(".baru-data-2:last .btn-hapus-2").show();
        });

        $("#dynamic_form-2").on("click", ".btn-hapus-2", function () {
          $(this).closest('.baru-data-2').remove();
            $(".baru-data-2:last .btn-tambah-2").show(); 
              var bykrow = $(".baru-data-2").length;
              if (bykrow == 1) {
                  $(".btn-hapus-2").css("display", "none");
                  // $(".btn-tambah").css("display", "");
              } else {
                  $('.baru-data-2:last .btn-hapus-2').css("display", "");
              }
        });
          //-----dynamicform_Tujuan_surat------
        function addFormss() {
            var addrow = '<div class="form-group baru-data-3">\
                <div class="col-md-12">\
                    <textarea name="tujuan_surat[]" placeholder="Tujuan Surat" class="form-control tujuan_surat" rows="3"></textarea>\
                </div>\
                <div class="button-group d-flex justify-content-center mt-3 mb-3">\
                    <button type="button" class="btn btn-success btn-tambah-3 mx-2">Tambah Isian Tujuan Surat <i class="fa fa-plus"></i></button>\
                    <button type="button" class="btn btn-danger btn-hapus-3">Hapus <i class="fa fa-times"></i></button>\
                </div>\
            </div>';
            $("#dynamic_form-3").append(addrow);
        }

        $("#dynamic_form-3").on("click", ".btn-tambah-3", function () {
            addFormss();
            $(this).css("display", "none");
            $(".btn-hapus-3").css("display", "none");
            $(".baru-data-3:last .btn-hapus-3").show();
        });

        $("#dynamic_form-3").on("click", ".btn-hapus-3", function () {
          $(this).closest('.baru-data-3').remove();
            $(".baru-data-3:last .btn-tambah-3").show(); 
              var bykrow = $(".baru-data-3").length;
              if (bykrow == 1) {
                  $(".btn-hapus-3").css("display", "none");
                  // $(".btn-tambah").css("display", "");
              } else {
                  $('.baru-data-3:last .btn-hapus-3').css("display", "");
              }
        });

        $("#search_nip").click(function () {
          var nip = $("#nip").val(); ;
          $("#nama_pejabat").val('');
          $('#jabatan_id').val('');
          Swal.fire({
              title: 'Loading',
              html: 'Please Wait....',
              allowOutsideClick: false,
              showConfirmButton: false,
              willOpen: () => {
                  swal.showLoading();
              }
          });
          $.ajax({
              url: "{{route('surat.buat_surat.api-nip')}}",
              type: "POST",
              data: {
                  nip: nip,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (response) {
                Swal.close(); 
                if (response.status == true) {
                  $("#nama_pejabat").val(response.data.name);
                  $('#jabatan_id option[value="' + response.data.jabatan_id + '"]').prop('selected',true);
                }else {
                  $("#nama_pejabat").val('');
                  $('#jabatan_id').val('');
                }
              }
          });
        });

        $('#jabatan_id').on('change', function () {
          var idjabatan = this.value;
          $("#nama_pejabat").html('');
          $("#nip").html('');
          $.ajax({
              url: "{{route('surat.buat_surat.api-jabatan')}}",
              type: "POST",
              data: {
                  jabatan_id: idjabatan,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (response) {
                if (response.status == true) {
                  $("#nama_pejabat").val(response.data[0].name);
                  $("#nip").val(response.data[0].nip);
                }else {
                  $("#nama_pejabat").val('');
                  $("#nip").val('');
                }
              }
          });
        });
          
        $("#show_layout").click(function () {
          $("#ModalPDf").modal("show");
          $("#pdfViewer").attr("src", "{{ asset('pdf/Format_Surat.pdf')}}");
          $("#labelModal").html('Contoh Format Surat');
          $("#saveButton").css("display", "none");
          $(".btnCancel").css("display", "none");
        });

        $("#show_preview").click( function () {

          var tanggal_surat = $("#tanggal_surat").val();
          var lampiran_surat = $("#lampiran_surat").val();
          var perihal_surat = $("#perihal_surat").val();
          var tujuan_surat = $("#tujuan_surat").val();
          var alamat_tujuan = $("#alamat_tujuan").val();
          var dasar_acuan = $("#dasar_acuan").val();
          var rincian_pelaksanaan_penugasan = $("#rincian_pelaksanaan_penugasan").val();
          var beban_anggaran = $("#beban_anggaran").val();
          var jabatan_id = $("#jabatan_id").val();
          var nama_pejabat = $("#nama_pejabat").val();
          var nip = $("#nip").val();
          var tembusan_surat = $("#tembusan_surat").val();

          if (
              tanggal_surat === "" ||
              lampiran_surat === "" ||
              perihal_surat === "" ||
              tujuan_surat === "" ||
              alamat_tujuan === "" ||
              dasar_acuan === "" ||
              rincian_pelaksanaan_penugasan === "" ||
              beban_anggaran === "" ||
              jabatan_id === "" ||
              nama_pejabat === "" ||
              nip === "" ||
              tembusan_surat === ""
          ) {
            Swal.fire({
                title: 'error',
                icon: 'error',
                html: 'Lengkapi Semua Field Terlebih Dahulu',
                allowOutsideClick: false,
                showConfirmButton: true,
            });
          } else {

            $("#ModalPDf").modal("show");
            $("#pdfViewer").attr("src", "");
            $("#labelModal").html('Preview Surat');
            $("#saveButton").css("display", "block");
            $(".btnCancel").css("display", "block");

            var form = document.getElementById('form_surat');

            Swal.fire({
                title: 'Loading',
                html: 'Please Wait....',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    swal.showLoading();
                },
            });
            $.ajax({
              url: '{{ route('surat.buat_surat.pdfview') }}',
              type: "post",
              data: new FormData(form),
              contentType: false, 
              cache: false,
              processData: false,
              success: function(response) {
                $("#pdfViewer").attr("src", '{{ route('surat.buat_surat.pdfview') }}?' + new URLSearchParams(new FormData(form)).toString());
                Swal.close();
          
               
              },
              error: function(error) {
                  console.error(error);
                  Swal.fire({
                      title: 'Error',
                      text: 'An error occurred',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  });
              }
            });
          }
        });

        $("#saveButton").on('click', function () {
          var form = document.getElementById('form_surat');
          Swal.fire({
                  title: 'Yakin ?',
                  html: '<p>Apakah anda yakin ingin Menyimpan Surat ?</p>',
                  showCancelButton: true,
                  confirmButtonText: 'Yakin',
                  icon: 'question',
                  cancelButtonColor: '#d61c0f',
                  cancelButtonText: 'Batal',
                  customClass: {
                      actions: 'my-actions',
                      cancelButton: 'order-1 right-gap',
                      confirmButton: 'order-2',
                      denyButton: 'order-3',
                  }
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire({
                    title: 'Loading',
                    html: 'Please Wait....',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                      swal.showLoading();
                    }
                  });

                  $.ajax({
                    url: '{{ route('surat.buat_surat.create') }}',
                    type: "post",
                    data: new FormData(form),
                    contentType: false, 
                    cache: false,
                    processData: false,
                    success: function(response) {
                      Swal.fire({
                          title: 'Berhasil!',
                          text: "Surat berhasil Disimpan",
                          icon: 'success',
                          timer: 3000,
                      });
                      window.location.reload();
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                  });
                }
              })

        });
      });

    </script>
@endsection