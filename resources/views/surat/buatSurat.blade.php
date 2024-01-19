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
            <div class="rounded-circle py-2 px-3 bg-success text-white mb-1">1</div>
            <div class="line h-100"></div>
          </div>
          <div class="container">
            <h5 class="">Formulir Surat</h5>
{{-- -------------------------------------------------------------------------------identitas Surat-----------------------------------------------}}
            <h6>*Identitas Surat</h6>
            <form action="javascript:void(0)">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" id="nomor_surat" class="form-control" placeholder="Nomor Surat" disabled>
                    </div>
                    <div class="col-md-6">
                        <input type="date" id="tanggal_surat" class="form-control" placeholder="Tanggal Surat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input type="text" id="lampiran_surat" class="form-control" placeholder="Lampiran Surat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <textarea type="text" id="perihal_surat" class="form-control" placeholder="Perihal Surat" rows="4"></textarea>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <textarea type="text" id="tujuan_surat" class="form-control" placeholder="Instansi / Pejabat Tujuan Surat" rows="4"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input type="text" id="alamat_tujuan" class="form-control" placeholder="Alamat Instansi / Pejabat">
                    </div>
                </div>
{{-- -------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
                <h6 class="mt-5">*Isian Surat</h6>
                <div class="row" id="dynamic_form">
	                <div class="form-group baru-data">
		                <div class="col-md-12">
		                    <textarea name="deskripsi_produk" placeholder="Dasar Acuan Penugasan" class="form-control" rows="6"></textarea>
		                </div>
		                <div class="button-group d-flex justify-content-center mt-2 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah mx-2"><i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
		                </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                      <textarea type="text" class="form-control" placeholder="kami....." rows="3"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                      <textarea type="text" class="form-control" placeholder="Beban Anggaran" rows="3"></textarea>
                  </div>
                </div>
{{----------------------------------------------------------------------------------isian Surat--------------------------------------------------}}
                  <h6 class="mt-5">*Penandatangan Surat</h6>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <select class="form-select" aria-label="Default select example" name="jabatan_id" id="jabatan">
                        <option value="" disabled selected hidden>Pilih Jabatan</option>
                        {{-- @foreach($jabatans as $jabatan)
                          <option value="{{ $jabatan->id }}"> {{ $jabatan->name }}</option>
                        @endforeach --}}
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Nama Pejabat">
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="NIP">
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
		                    <textarea name="deskripsi_produk" placeholder="Tembusan Surat" class="form-control" rows="6"></textarea>
		                </div>
		                <div class="button-group d-flex justify-content-center mt-2 mb-3">
		                    <button type="button" class="btn btn-success btn-tambah-2 mx-2"><i class="fa fa-plus"></i></button>
		                    <button type="button" class="btn btn-danger btn-hapus-2" style="display:none;"><i class="fa fa-times"></i></button>
		                </div>
                  </div>
                </div>
            </form>
        </div>
        </div>
        <div class="d-flex mb-1">
          <div class="d-flex flex-column pr-4 align-items-center">
            <div class="rounded-circle py-2 px-3 bg-success text-white mb-1">2</div>
            <div class="line h-100"></div>
          </div>
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
            <div class="rounded-circle py-2 px-3 bg-success text-white mb-1">3</div>
            <div class="line h-100 d-none"></div>
          </div>
          <div>
            <h5 class="text-dark">Make changes and push!</h5>
            <p class="lead text-muted pb-3">Now make changes to your application source code, test it then commit &amp; push</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- modal --}}
  <div class="modal fade" id="ModalPDf" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="labelModal" style="color: black"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <iframe id="pdfViewer" src=""  width="1000px" height="1200px"></iframe>
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
      //-----dynamicform_isian_surat------
      $(document).ready(function () {
        function addForm() {
            var addrow = '<div class="form-group baru-data">\
                <div class="col-md-12">\
                    <textarea name="deskripsi_produk" placeholder="Dasar Acuan Penugasan" class="form-control" rows="6"></textarea>\
                </div>\
                <div class="button-group d-flex justify-content-center mt-2 mb-3">\
                    <button type="button" class="btn btn-success btn-tambah mx-2"><i class="fa fa-plus"></i></button>\
                    <button type="button" class="btn btn-danger btn-hapus"><i class="fa fa-times"></i></button>\
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
                      <textarea name="deskripsi_produk" placeholder="Tembusan Surat" class="form-control" rows="6"></textarea>\
                  </div>\
                  <div class="button-group d-flex justify-content-center mt-2 mb-3">\
                      <button type="button" class="btn btn-success btn-tambah-2 mx-2"><i class="fa fa-plus"></i></button>\
                      <button type="button" class="btn btn-danger btn-hapus-2"><i class="fa fa-times"></i></button>\
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
            
          $("#show_layout").click(function () {
            $("#ModalPDf").modal("show");
            $("#pdfViewer").attr("src", "{{ asset('pdf/Format_Surat.pdf')}}");
            $("#labelModal").html('Contoh Format Surat');
            $("#saveButton").css("display", "none");
            $(".btnCancel").css("display", "none");
          });

          $("#show_preview").click(async function () {
            const { PDFDocument, rgb } = await import('https://cdn.skypack.dev/pdf-lib@1.12.0');

            const tanggal_surat = $("#tanggal_surat").val();
            const nomor_surat = $("#nomor_surat").val() ? $("#nomor_surat").val() : "<Nomor_Surat>";
            const lampiran_surat = $("#lampiran_surat").val() ? $("#lampiran_surat").val() : "<Lampiran_Surat>";
            const perihal_surat = $("#perihal_surat").val() ? $("#perihal_surat").val() : "<Perihal_Surat>";

            const tujuan_surat = $("#tujuan_surat").val() ? $("#tujuan_surat").val() : "<Tujuan_Surat>";
            const alamat_tujuan = $("#alamat_tujuan").val() ? $("#alamat_tujuan").val() : "<Alamat_Tujuan_Surat>";
           
           
            
            const assetUrl = '{{asset('pdf/Surat.pdf')}}';

            const existingPdfBytes = await fetch(assetUrl).then(response => response.arrayBuffer());

            const pdfDoc = await PDFDocument.load(existingPdfBytes);

            const firstPage = pdfDoc.getPages()[0];

            if (tanggal_surat) {
              const tanggal_format_indonesia = new Date(tanggal_surat).toLocaleDateString('id-ID', { dateStyle: 'full' });
              firstPage.drawText(`${tanggal_format_indonesia}`, { x: 423, y: 700, color: rgb(0, 0, 0), size: 12 });
            } else {
              firstPage.drawText(`${"<Tanggal_Surat>"}`, { x: 423, y: 700, color: rgb(0, 0, 0), size: 12 });
            }            
            
            firstPage.drawText(`Nomor       :${nomor_surat}`,
             { x: 70, y: 700, color: rgb(0, 0, 0), size: 12 }
            );

            firstPage.drawText(`Lampiran   :${lampiran_surat}`,
             { x: 70, y: 680, color: rgb(0, 0, 0), size: 12 }
            );
            
            firstPage.drawText(`Hal             :${lampiran_surat}`,
             { x: 70, y: 660, color: rgb(0, 0, 0), size: 12 }
            );
            
            firstPage.drawText(`Yth. ${tujuan_surat}`,
             { x: 60, y: 630, color: rgb(0, 0, 0), size: 12 }
            );

            firstPage.drawText(`di ${alamat_tujuan}`,
             { x: 60, y: 615, color: rgb(0, 0, 0), size: 12 }
            );
            
            firstPage.drawText(`di ${alamat_tujuan}`,
             { x: 60, y: 615, color: rgb(0, 0, 0), size: 12 }
            );

            const modifiedPdfBytes = await pdfDoc.save();

            const pdfDataUrl = URL.createObjectURL(new Blob([modifiedPdfBytes], { type: 'application/pdf' }));


            $("#ModalPDf").modal("show");
            $("#pdfViewer").attr("src", pdfDataUrl);
            $("#labelModal").html('Preview Surat');
            $("#saveButton").css("display", "block");
            $(".btnCancel").css("display", "block");
          });
      });

    </script>
@endsection