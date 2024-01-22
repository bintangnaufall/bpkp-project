@extends('layout.main')

@section('title', 'Users')

@section('css')

    <style>
        label {
            color: white;
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
            background-color: #ddd; /* Warna abu-abu */
            color: #555; /* Warna teks yang sesuai */
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
<a href="#" class="ml-3 text-white">Buat Surat</a>
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
            <h6>*Identitas Surat</h6>
            <form action="javascript:void(0)" id="form_surat" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Nomor Surat" disabled>
                    </div>
                    <div class="col-md-6">
                        <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" placeholder="Tanggal Surat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input type="text" name="lampiran_surat" id="lampiran_surat" class="form-control" placeholder="Lampiran Surat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <textarea type="text" name="perihal_surat" id="perihal_surat" class="form-control" placeholder="Perihal Surat" rows="3"></textarea>
                    </div>
                </div>
                <hr>
                <div class="row" id="dynamic_form-3">
	                <div class="form-group baru-data-3">
		                <div class="col-md-12">
		                    <textarea name="tujuan_surat[]" placeholder="Tujuan Surat" class="form-control" rows="3"></textarea>
		                </div>
		                <div class="button-group d-flex justify-content-center mt-2 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah-3 mx-2">Tambah Isian Tujuan Surat <i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus-3" style="display:none;">Hapus <i class="fa fa-times"></i></button>
		                </div>
                  </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input type="text" name="alamat_tujuan" id="alamat_tujuan" class="form-control" placeholder="Alamat Instansi / Pejabat">
                    </div>
                </div>
{{-- -------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
                <h6 class="mt-5">*Isian Surat</h6>
                <div class="row" id="dynamic_form">
	                <div class="form-group baru-data">
		                <div class="col-md-12">
		                    <textarea name="dasar_acuan[]" placeholder="Dasar Acuan Penugasan" class="form-control" rows="3"></textarea>
		                </div>
		                <div class="button-group d-flex justify-content-center mt-2 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah mx-2">Tambah Isian Dasar Acuan <i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus" style="display:none;">Hapus <i class="fa fa-times"></i></button>
		                </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                      <textarea type="text" name="rincian_pelaksanaan_penugasan" id="rincian_pelaksanaan_penugasan" class="form-control" placeholder="kami....." rows="3"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                      <textarea type="text" name="beban_anggaran" id="beban_anggaran" class="form-control" placeholder="Beban Anggaran" rows="3"></textarea>
                  </div>
                </div>
{{----------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
                  <h6 class="mt-5">*Penandatangan Surat</h6>
                  <div class="row mb-3">
                    <div class="col-md-12">
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
                        <input type="text" name="nama_pejabat" id="nama_pejabat" class="form-control" placeholder="Nama Pejabat">
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <input type="text" name="nip_pejabat"  id="nip" class="form-control" placeholder="NIP">
                        <div class="input-group-append">
                          <button class="btn-1 btn-info" type="button">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
{{-- -------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
                <h6 class="mt-5">*Tembusan Surat</h6>
                <div class="row" id="dynamic_form-2">
	                <div class="form-group baru-data-2">
		                <div class="col-md-12">
		                    <textarea name="tembusan_surat[]" placeholder="Tembusan Surat" class="form-control" rows="3"></textarea>
		                </div>
		                <div class="button-group d-flex justify-content-center mt-2 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah-2 mx-2">Tambah Isian Tembusan <i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus-2" style="display:none;">Hapus <i class="fa fa-times"></i></button>
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
              <button id="show_layout" class="btn btn-info"><i class="bi bi-info-square"></i>  Layout Surat</button>
              <button id="show_preview" class="btn btn-success"><i class="bi bi-eye"></i>  Preview Surat</button>
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
          <iframe id="pdfViewer" src=""  width="800px" height="1000px"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-md waves-effect rounded waves-light btnCancel" title="Batal" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary btn-md waves-effect rounded waves-light" data-bs-target="#exampleModalToggle2" id="saveButton" data-bs-toggle="modal">Save</button>
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
        //-----dynamicform_dasar_acuan------
        function addForm() {
            var addrow = '<div class="form-group baru-data">\
                <div class="col-md-12">\
                    <textarea name="dasar_acuan[]"" placeholder="Dasar Acuan Penugasan" class="form-control" rows="3"></textarea>\
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
                    <textarea name="tujuan_surat[]" placeholder="Tujuan Surat" class="form-control" rows="3"></textarea>\
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

        // $("#show_preview").click(async function () {

        //   const { PDFDocument, rgb } = await import('https://cdn.skypack.dev/pdf-lib@1.12.0');

        //   const tanggal_surat = $("#tanggal_surat").val();
        //   const nomor_surat = $("#nomor_surat").val() ? $("#nomor_surat").val() : "<Nomor_Surat>";
        //   const lampiran_surat = $("#lampiran_surat").val() ? $("#lampiran_surat").val() : "<Lampiran_Surat>";
        //   const perihal_surat = $("#perihal_surat").val() ? $("#perihal_surat").val() : "<Perihal_Surat>";

        //   const tujuan_surat = $("#tujuan_surat").val() ? $("#tujuan_surat").val() : "<Tujuan_Surat>";
        //   const alamat_tujuan = $("#alamat_tujuan").val() ? $("#alamat_tujuan").val() : "<Alamat_Tujuan_Surat>";

        //   const nama_jabatan = $("#jabatan_id option:selected").text() == "Pilih Jabatan" ? "<Nama_Jabatan>" : $("#jabatan_id option:selected").text();
        //   const nama_pejabat = $("#nama_pejabat").val() ? $("#nama_pejabat").val() : "<Nama_Pejabat>";
        //   const nip = $("#nip").val() ? $("#nip").val() : "<NIP>";

        //   const dasar_acuan = [];
        //   $(".baru-data textarea").each(function () {
        //       dasar_acuan.push($(this).val());
        //   });
          
        //   if (dasar_acuan.length > 0 && dasar_acuan[0] === '') {
        //       dasar_acuan[0] = '<Dasar_Acuan_Penugasan>';
        //   }

        //   const tembusan_surat = [];
        //   $(".baru-data-2 textarea").each(function () {
        //     tembusan_surat.push($(this).val());
        //   });
          
        //   if (tembusan_surat.length > 0 && tembusan_surat[0] === '') {
        //       tembusan_surat[0] = '<Tembusan_Surat>';
        //   }

        //   let totalPanjang = dasar_acuan.length * 72;

        //   const rincian_pelaksanaan_penugasan = $("#rincian_pelaksanaan_penugasan").val() ? $("#rincian_pelaksanaan_penugasan").val() : "<Rincian_Pelaksanaan_Penugasan>";

        //   const beban_anggaran = $("#beban_anggaran").val() ? $("#beban_anggaran").val() : "<Beban_Anggaran>";
          
          
          
        //   const assetUrl = '{{asset('pdf/Surat.pdf')}}';

        //   const existingPdfBytes = await fetch(assetUrl).then(response => response.arrayBuffer());

        //   const pdfDoc = await PDFDocument.load(existingPdfBytes);

        //   const firstPage = pdfDoc.getPages()[0];

        //   // firstPage.setMargins(50, 50, 50, 50);

        //   if (tanggal_surat) {
        //     const tanggal_format_indonesia = new Date(tanggal_surat).toLocaleDateString('id-ID', { dateStyle: 'full' });
        //     firstPage.drawText(`${tanggal_format_indonesia}`, { x: 423, y: 700, color: rgb(0, 0, 0), size: 12 });
        //   } else {
        //     firstPage.drawText(`${"<Tanggal_Surat>"}`, { x: 423, y: 700, color: rgb(0, 0, 0), size: 12 });
        //   }            
          
        //   firstPage.drawText(`Nomor       :${nomor_surat}`,
        //     { x: 70, y: 700, color: rgb(0, 0, 0), size: 12 }
        //   );

        //   firstPage.drawText(`Lampiran   :${lampiran_surat}`,
        //     { x: 70, y: 680, color: rgb(0, 0, 0), size: 12 }
        //   );
          
        //   firstPage.drawText(`Hal             : ${perihal_surat}`,
        //     { x: 70, y: 660, color: rgb(0, 0, 0), size: 12, maxWidth : 500 },
        //   );


        //   let widthy;

        //   if (perihal_surat.length > 80) {
        //       const kelipatan80 = Math.floor(perihal_surat.length / 80);
        //       const penguranganWidthy = kelipatan80 * 20;
        //       widthy = 600 - penguranganWidthy;
        //   }else {
        //     widthy = 630;
        //   }
          

        //   firstPage.drawText(`Yth. ${tujuan_surat}`,
        //   { x: 60, y: widthy, color: rgb(0, 0, 0), size: 12 }
        //   );

        //   firstPage.drawText(`di ${alamat_tujuan}`,
        //   { x: 60, y: widthy-15, color: rgb(0, 0, 0), size: 12 }
        //   );


        //   firstPage.drawText(`Berdasarkan`, { x: 100, y: widthy-40, color: rgb(0, 0, 0), size: 12 });

        //   const startX = 100;
        //   let startY = widthy-55;
        //   let no = 1;
        //   const fontSize = 12;


        //   dasar_acuan.forEach((text) => {
        //       firstPage.drawText(`${no}. ${text}`, { x: startX, y: startY, color: rgb(0, 0, 0), size: fontSize ,maxWidth:500 });
              
        //       startY -= fontSize + 2; 

        //       no++;
        //   });

        //   const rincian_pelaksanaan = `Kami akan ${rincian_pelaksanaan_penugasan} dengan jangka waktu dan susunan tim sebagaimana surat tugas terlampir. \n\n      Biaya perjalanan dinas sehubungan dengan penugasan ini menjadi beban ${beban_anggaran} \n\n       Atas perhatian dan kerja sama yang baik, kami mengucapkan terima kasih.`

        //   let remainingAddress = ''
        //   let page2;
        //   if (rincian_pelaksanaan.length + perihal_surat.length + totalPanjang > 2027) {
        //     const rincian_pelaksanaanHalamanPertama = rincian_pelaksanaan.substring(0, 1279);

        //     firstPage.drawText(`${rincian_pelaksanaanHalamanPertama}`, 
        //         { x: startX-20, y: startY-10, color: rgb(0, 0, 0), size: fontSize , maxWidth: 500
        //     });
        //     remainingAddress = rincian_pelaksanaan.substring(1279);

        //     page2 = pdfDoc.addPage();
          
        //     page2.drawRectangle({
        //         x: 0,
        //         y: 0,
        //         width: 595.28,
        //         height: 841.89,
        //         color: rgb(222 / 255, 234 / 255, 246 / 255),
        //         fillOpacity: 1, 
        //     });

        //     page2.drawText(`${remainingAddress}`, { x: startX-20, y: 800, color: rgb(0, 0, 0), size:12, maxWidth: 500, maxHeight: 50 });
        //   }else{
        //     firstPage.drawText(`${rincian_pelaksanaan}`, 
        //         { x: startX-20, y: startY-10, color: rgb(0, 0, 0), size: fontSize , maxWidth: 500
        //     });
        //   }

        //   let widthy2;
        //   if (rincian_pelaksanaan.length > 290 && remainingAddress.length === 0) {
        //       const kelipatan85 = Math.floor(rincian_pelaksanaan.length / 85);
        //       const penguranganWidthy2 = kelipatan85 * 15;
        //       widthy2 = 400 - penguranganWidthy2;
        //   } else if (remainingAddress.length > 75) {
        //       const kelipatan75 = Math.floor(remainingAddress.length / 75);
        //       const penguranganWidthy2 = kelipatan75 * 50;
        //       widthy2 = 800 - penguranganWidthy2;
        //   } else {
        //       widthy2 = 400;
        //   }

        //   if (rincian_pelaksanaan.length + perihal_surat.length + totalPanjang > 2027) {
        //       page2.drawText(`Ditandatangani secara elektronik oleh`, 
        //           { x: startX+240, y: widthy2, color: rgb(0 / 255, 176/ 255, 240/ 255), size: 10 , maxWidth: 500 }
        //       );
        //       page2.drawText(`${nama_jabatan} \n${nama_pejabat}\nNIP ${nip}`, 
        //         { x: startX+240, y: widthy2-15, color: rgb(0, 0, 0), size: fontSize , maxWidth: 200, lineHeight:15}
        //       );

        //       page2.drawText(`Tembusan Yth :`, { x: 80, y:  widthy2-100, color: rgb(0, 0, 0), size: 12 });

        //       const startX2= 100;
        //       let startY2 = widthy2-100;
        //       let no2= 1;
        //       const fontSize2 = 12;

        //       tembusan_surat.forEach((text2) => {
        //           page2.drawText(`${no2}. ${text2}`, { x: startX2, y: startY2-15, color: rgb(0, 0, 0), size: fontSize2 , maxWidth:500 });
                  
        //           startY2 -= fontSize2 + 2; 

        //           no2++;
        //       });

        //       page2.drawLine({
        //           start: { x: 100, y: 50 },
        //           end: { x: 600, y: 50 },
        //           color: rgb(0, 0, 0), // Warna garis (hitam dalam format RGB)
        //           thickness: 1, // Ketebalan garis
        //       });
              
        //       // page2.drawLine({
        //       //     start: { x: 560, y: 40 },
        //       //     end: { x: 560, y: 28 },
        //       //     color: rgb(0, 0, 0), // Warna garis (hitam dalam format RGB)
        //       //     thickness: 1, // Ketebalan garis
        //       // });

        //       page2.drawText(`Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan BSrE. Gunakan alat dari BSrE untuk verifikasi`,
        //         { x: 150, y:  40, color: rgb(0, 0, 0), size: 6 }
        //       );

        //       page2.drawText(`UU ITE No 11 Tahun 2008 Pasal 5 Ayat 1: "Informasi Elektronik dan/atau Dokumen Elektronik dan/atau hasil cetaknya merupakan alat bukti hukum yang sah."`,
        //         { x: 130, y:  30, color: rgb(0, 0, 0), size: 6 }
        //       );

        //       // page2.drawText(`2`,
        //       //  { x: 565, y:  32, color: rgb(0, 0, 0), size: 10 }
        //       // );
        //   } else {
        //       firstPage.drawText(`Ditandatangani secara elektronik oleh`, 
        //           { x: startX+240, y: widthy2, color: rgb(0 / 255, 176/ 255, 240/ 255), size: 10 , maxWidth: 500 }
        //       );
        //       firstPage.drawText(`${nama_jabatan} \n${nama_pejabat}\nNIP ${nip}`, 
        //         { x: startX+240, y: widthy2-15, color: rgb(0, 0, 0), size: fontSize , maxWidth: 200, lineHeight:15}
        //       );

        //       firstPage.drawText(`Tembusan Yth :`, { x: 80, y:  widthy2-100, color: rgb(0, 0, 0), size: 12 });

        //       const startX2= 100;
        //       let startY2 = widthy2-100;
        //       let no2= 1;
        //       const fontSize2 = 12;

        //       tembusan_surat.forEach((text2) => {
        //           firstPage.drawText(`${no2}. ${text2}`, { x: startX2, y: startY2-15, color: rgb(0, 0, 0), size: fontSize2 , maxWidth:500 });
                  
        //           startY2 -= fontSize2 + 2; 

        //           no2++;
        //       });

        //       firstPage.drawLine({
        //           start: { x: 100, y: 50 },
        //           end: { x: 600, y: 50 },
        //           color: rgb(0, 0, 0), // Warna garis (hitam dalam format RGB)
        //           thickness: 1, // Ketebalan garis
        //       });
              
        //       // firstPage.drawLine({
        //       //     start: { x: 560, y: 40 },
        //       //     end: { x: 560, y: 28 },
        //       //     color: rgb(0, 0, 0), // Warna garis (hitam dalam format RGB)
        //       //     thickness: 1, // Ketebalan garis
        //       // });

        //       firstPage.drawText(`Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan BSrE. Gunakan alat dari BSrE untuk verifikasi`,
        //         { x: 150, y:  40, color: rgb(0, 0, 0), size: 6 }
        //       );

        //       firstPage.drawText(`UU ITE No 11 Tahun 2008 Pasal 5 Ayat 1: "Informasi Elektronik dan/atau Dokumen Elektronik dan/atau hasil cetaknya merupakan alat bukti hukum yang sah."`,
        //         { x: 130, y:  30, color: rgb(0, 0, 0), size: 6 }
        //       );

        //       // firstPage.drawText(`1`,
        //       //  { x: 565, y:  32, color: rgb(0, 0, 0), size: 10 }
        //       // );
        //   }



        //     const modifiedPdfBytes = await pdfDoc.save();

        //     const pdfDataUrl = URL.createObjectURL(new Blob([modifiedPdfBytes], { type: 'application/pdf' }));


        //     $("#ModalPDf").modal("show");
        //     $("#pdfViewer").attr("src", pdfDataUrl);
        //     $("#labelModal").html('Preview Surat');
        //     $("#saveButton").css("display", "block");
        //     $(".btnCancel").css("display", "block");
        //   });
        // });

        $("#show_preview").click( function () {
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
        });
      });

    </script>
@endsection