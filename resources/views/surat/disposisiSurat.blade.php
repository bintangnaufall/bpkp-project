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
    </style>
@endsection

@section('navtop') 
@can("admin")
<a href="{{ route("surat.manajemen_surat.show") }}" class="mx-3 text-white">Manajemen Surat</a>
@endcan
<a href="{{ route('surat.buat_surat.show') }}" class="ml-3 text-white">Buat Surat</a>
<a href="{{ route('surat.disposisi_surat.show') }}" class="mx-3 {{ Request::is('*disposisi_surat') ? 'text-primary' : 'text-white' }}">Disposisi Surat</a>
<a href="#" class="text-white">Arsip</a>
@endsection

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Data User</h6>
        <a href="javascript:void(0)" class="btn btn-primary mb-2" id="newUser">
          Tambah Data
        </a>
      </div>
      <div class="table-responsive">
        <table id="myTable" class="table table-bordered dt-responsive display responsive nowrap table-striped"
        width="100%">
          <thead>
            <tr class="text-white">
              <th scope="col"  class="col-md-2">#</th>
              <th scope="col"  class="col-md-6">Nomor Surat</th>
              <th scope="col"  class="col-md-6">Perihal</th>
              <th scope="col"  class="col-md-6">Disetujui</th>
              <th scope="col"  class="col-md-6">Dibuat</th>
              <th scope="col"  class="col-md-6">Aksi</th>
              <th scope="col"  class="col-md-6">Info</th>
              <th scope="col"  class="col-md-4">Keterangan</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- modal --}}
  {{-- <div class="modal fade" id="Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="labelModal" style="color: black">Tambah Data User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="userForm" action="javascript:void(0)">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="action" id="action">

            <label for="name" class="col-form-label" style="color: black">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Isi nomor Nip" required>
            
            <label for="name" class="col-form-label" style="color: black">Nama User</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Isi nama User" required>

            <label for="name" class="col-form-label" style="color: black">Bidang</label>
            <select class="form-select" aria-label="Default select example" name="bidang_id" id="bidang">
              <option value="" disabled selected hidden>Pilih Bidang</option>
              @foreach($bidangs as $bidang)
                <option value="{{ $bidang->id }}"> {{ $bidang->name }}</option>
              @endforeach
            </select>

            <label for="name" class="col-form-label" style="color: black">Jabatan</label>
            <select class="form-select" aria-label="Default select example" name="jabatan_id" id="jabatan">
              <option value="" disabled selected hidden>Pilih Jabatan</option>
              @foreach($jabatans as $jabatan)
                <option value="{{ $jabatan->id }}"> {{ $jabatan->name }}</option>
              @endforeach
            </select>

            <label for="name" class="col-form-label" style="color: black">Hak Akses</label>
            <select class="form-select" aria-label="Default select example" name="hak_akses_id" id="hak_akses">
              <option value="" disabled selected hidden>Pilih Hak Akses</option>
              @foreach($hakakseses as $hakakses)
                <option value="{{ $hakakses->id }}"> {{ $hakakses->name }}</option>
              @endforeach
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-md waves-effect rounded waves-light btnCancel" title="Batal">Batal</button>
          <button class="btn btn-primary btn-md waves-effect rounded waves-light" data-bs-target="#exampleModalToggle2" id="saveButton" data-bs-toggle="modal">Save</button>
        </div>
      </div>
    </div>
  </div> --}}
  
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.11/dist/sweetalert2.all.js"></script>


    {{-- <script>
        $(document).ready(function() {
//---------------------------------------------------- CSRF

          var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': csrfToken
                },
            });

//---------------------------------------------------- Table

            $('#myTable').DataTable({
                responsive: true, 
                processing: true,
                serverSide: true,
                ajax: '{{ route("user.show") }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'NIP', name: 'NIP' },
                    { data: 'name', name: 'name', responsivePriority: 1},
                    { data: 'default_password', name: 'default_password' },
                    { data: 'bidang', name: 'bidang',
                      render: function (data, type, row) {
                          if (type === 'display' && window.innerWidth < 768) {
                              var match = data.match(/\((.*?)\)/);

                              if (match) {
                                  return match[0];
                              } else {
                                  return data.length > 20 ? data.substr(0, 20) + '...' : data;
                              }
                          } else {
                              return data;
                          }
                      }
                    },
                    { data: 'jabatan', name: 'jabatan' },
                    { data: 'hak_akses', name: 'hak_akses' },
                    { data: 'action', name: 'action', responsivePriority: 1}
                ]
            });

//---------------------------------------------------- Tambah

            $('#newUser').click(function () {
              $('#Modal').modal('show');
              $('#labelModal').html("Tambah Data User");
              $('#saveButton').text('Save');
              $('#action').val('tambah');
              $('#id').val('');
              $('#nip').val('');
              $('#name').val('');
              $('#bidang').val('');
              $('#jabatan').val('');
              $('#hak_akses').val('');
              $("#name-error").html('');
            });

//---------------------------------------------------- Submit

            $('#saveButton').click(function (e) {
                e.preventDefault();

                var form = document.getElementById('userForm');

                Swal.fire({
                    title: 'Loading',
                    html: 'Please Wait....',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        swal.showLoading();
                    }
                });

                setTimeout(function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.create_update') }}",
                        data: new FormData(form),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                          // console.log(response);
                            if(response.status == true) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: response.pesan,
                                    icon: "success",
                                    confirmButtonText: 'Ok'
                                });
                                $('#userForm').trigger("reset");
                                $('#Modal').modal('hide').fadeOut();
                                $('#myTable').DataTable().draw();
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    html: response.error,
                                    icon: "error",
                                    confirmButtonText: 'Redo'
                                })
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            swal.fire({
                                title: 'Gagal!',
                                text: 'Error: ' + errorThrown,
                                icon: 'error',
                                confirmButtonText: 'Redo'
                            })
                        }
                    });
                }, 800);
            });


//---------------------------------------------------- Edit

            $(document).on('click', '.btnEdit', function(e) {
              e.preventDefault();

              let id = $(this).data('id');
              let url = '{{ route('user.edit', ':id') }}';
              url = url.replace(':id', id);

              Swal.fire({
                  title: 'Loading',
                  html: 'Please Wait....',
                  allowOutsideClick: false,
                  showConfirmButton: false,
                  willOpen: () => {
                      swal.showLoading();
                  }
              });

              setTimeout(function() {
                  $.ajax({
                      url: url,
                      type: "GET",
                      success: function(response) {
                          Swal.close(); 
                          $('#id').val(response.encryptedID);
                          $('#nip').val(response.data.NIP);
                          $('#name').val(response.data.name);
                          $('#bidang option[value="' + response.data.bidang_id + '"]').prop('selected',true);
                          $('#jabatan option[value="' + response.data.jabatan_id + '"]').prop('selected',true);
                          $('#hak_akses option[value="' + response.data.hak_akses_id + '"]').prop('selected',true);

                          $('#action').val('edit');
                          $('#Modal').modal("show");
                          $('#saveButton').text('Update');
                          $('#labelModal').text('Edit Data User');
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
              }, 800);
            });

//---------------------------------------------------- Delete

            $(document).on('click', '.btnDelete', function (e) {
              e.preventDefault();
              var id = $(this).data("id");
              let nama = $(this).data('name');
              Swal.fire({
                  title: 'Yakin ?',
                  html: '<p>Apakah anda yakin ingin menghapus User :</p>' +
                      '<p><b>' + nama + '</b></p>',
                  showCancelButton: true,
                  confirmButtonText: 'Hapus',
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
                      let url = '{{ route('user.delete', ':id') }}';
                      url = url.replace(':id', id);

                      Swal.fire({
                        title: 'Loading',
                        html: 'Please Wait....',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                          swal.showLoading();
                        }
                      });

                      setTimeout(function () {
                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: function (res) {
                              // console.log(res);
                                if(res.status == true) {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: res.pesan,
                                        icon: 'success',
                                        confirmButtonText: 'Ok'
                                    });
                                    $('#myTable').DataTable().ajax.reload();
                                } else if(res.status == false) {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: res.pesan,
                                        icon: 'error',
                                        confirmButtonText: 'Ok'
                                    });
                                }else {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        html: res.error,
                                        icon: 'error',
                                        confirmButtonText: 'Redo'
                                    })
                                }
                            }
                        })
                      },800);
                  }
              })
            });
//---------------------------------------------------- Reset

            $(document).on('click', '.btnReset', function (e) {
              e.preventDefault();
              var id = $(this).data("id");
              let nama = $(this).data('name');
              Swal.fire({
                  title: 'Yakin ?',
                  html: '<p>Apakah anda yakin ingin mengatur ulang Sandi :</p>' +
                      '<p><b>' + nama + '</b></p>',
                  showCancelButton: true,
                  confirmButtonText: 'Reset Password',
                  icon: 'question',
                  cancelButtonColor: '#d61c0f',
                  confirmButtonColor: '#198754',
                  cancelButtonText: 'Batal',
                  customClass: {
                      actions: 'my-actions',
                      cancelButton: 'order-1 right-gap',
                      confirmButton: 'order-2',
                      denyButton: 'order-3',
                  }
              }).then((result) => {
                  if (result.isConfirmed) {
                      let url = '{{ route('user.reset', ':id') }}';
                      url = url.replace(':id', id);

                      Swal.fire({
                        title: 'Loading',
                        html: 'Please Wait....',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                          swal.showLoading();
                        }
                      });

                      setTimeout(function () {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            success: function (res) {
                              console.log(res);
                                if(res.status == true) {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: res.pesan,
                                        icon: 'success',
                                        confirmButtonText: 'Ok'
                                    });
                                    $('#myTable').DataTable().ajax.reload();
                                } else if(res.status == false) {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: res.pesan,
                                        icon: 'error',
                                        confirmButtonText: 'Ok'
                                    });
                                }else {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        html: res.error,
                                        icon: 'error',
                                        confirmButtonText: 'Redo'
                                    })
                                }
                            }
                        })
                      },800);
                  }
              })
            });
//---------------------------------------------------- tombol batal --}}
            {{-- $(document).on('click', '.btnCancel', function (e) {
                $('#Modal').modal("hide");
            })
        });
    </script> --}}
@endsection