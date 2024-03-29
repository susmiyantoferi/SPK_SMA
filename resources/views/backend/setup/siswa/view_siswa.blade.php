@extends('admin.admin_master')

@section('admin')



<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
            
              </div>
          </div>
      </div>
       <!-- end Content Header (Page header) -->

      
      <!-- Main content -->
<section class="content">
    <div class="row">

      <div class="col-12">

       <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> Daftar Siswa</h3>
            <a href="{{ route('add.siswa') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add data </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="5%">No</th>
                          <th>Name</th>
                          <th>Jenis Kelamin</th>
                          <th>Kelas</th>
                          <th>jurusan</th>
                          <th width="25%">Action</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($alldata as $key => $siswa)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $siswa->nama }}</td>
                          <td>{{ $siswa->jenis_kelamin }}</td>
                          <td>{{ $siswa->kelas }}</td>
                          <td>{{ $siswa->jurusan }}</td>
                          <td>
                            <a href="{{ route('data.siswa.edit',$siswa->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('data.siswa.delete',$siswa->id) }}" class="btn btn-danger" id="delete">Delete</a>
                          </td>
                          
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                      
                  </tfoot>
                </table>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- /.box -->          
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->






@endsection