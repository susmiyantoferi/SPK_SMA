@extends('admin.admin_master')

@section('admin')

{{-- jQuery Ajax CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-wrapper">
    <div class="container-full">

     
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add data siswa </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('update.data.siswa', $alldata->id) }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                         
                            <div class="row"> {{--first 1st row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama" class="form-control" required="" value="{{ $alldata->nama}}">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jenis kelamin <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jenis_kelamin" id="gender" required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Gender</option>
                                          <option value="Laki - Laki" {{ ($alldata->jenis_kelamin == 'Laki - Laki')? 'selected': '' }}>Laki - Laki</option>
                                          <option value="Perempuan" {{ ($alldata->jenis_kelamin == 'Perempuan')? 'selected': '' }}>Perempuan</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 1st row --}}


                             <div class="row"> {{--first 2nd row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Kelas <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="kelas" class="form-control" required="" value="{{ $alldata->kelas}}">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jurusan <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jurusan"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Jurusan</option>
                                          <option value="IPA" {{ ($alldata->jurusan == 'IPA')? 'selected': '' }}>IPA</option>
                                          <option value="IPS" {{ ($alldata->jurusan == 'IPS')? 'selected': '' }}>IPS</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 2nd row --}}  


                             <div class="row"> {{--first 3nd row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama Ayah <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama_ayah" class="form-control" required="" value="{{ $alldata->nama_ayah}}">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Pekerjaan Ayah <span class="text-danger">*</span></h5>
                                  <div class="controls">

                                    <select name="pekerjaan_ayah"  required="" class="form-control">
                                      <option value="" selected="" disabled="" >Select pekerjaan</option>
                                      <option value="20" {{ ($alldata->pekerjaan_ayah == '20')? 'selected': '' }}>PNS</option>
                                      <option value="50" {{ ($alldata->pekerjaan_ayah == '50')? 'selected': '' }}>Karyawan</option>
                                      <option value="79" {{ ($alldata->pekerjaan_ayah == '79')? 'selected': '' }}>Nelayan</option>
                                      <option value="100" {{ ($alldata->pekerjaan_ayah == '100')? 'selected': '' }}>Buruh</option>
                                      <option value="60" {{ ($alldata->pekerjaan_ayah == '60')? 'selected': '' }}>Pedagang</option>
                                      <option value="30" {{ ($alldata->pekerjaan_ayah == '30')? 'selected': '' }}>Penambak Ikan</option>
                                      <option value="0" {{ ($alldata->pekerjaan_ayah == '0')? 'selected': '' }}>Tidak Bekerja</option>
                                      <option value="70" {{ ($alldata->pekerjaan_ayah == '70')? 'selected': '' }}>Petani</option>
                                   </select>

                                      @error('pekerjaan_ayah')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 3nd row --}}   

                             <div class="row"> {{--first 4nd row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama Ibu <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama_ibu" class="form-control" required="" value="{{ $alldata->nama_ibu}}">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Pekerjaan Ibu <span class="text-danger">*</span></h5>
                                  <div class="controls">

                                    <select name="pekerjaan_ibu"  required="" class="form-control">
                                      <option value="" selected="" disabled="" >Select pekerjaan</option>
                                      <option value="20" {{ ($alldata->pekerjaan_ibu == '20')? 'selected': '' }}>PNS</option>
                                      <option value="50" {{ ($alldata->pekerjaan_ibu == '50')? 'selected': '' }}>Karyawan</option>
                                      <option value="70" {{ ($alldata->pekerjaan_ibu == '70')? 'selected': '' }}>Petani</option>
                                      <option value="79" {{ ($alldata->pekerjaan_ibu == '79')? 'selected': '' }}>Nelayan</option>
                                      <option value="100" {{ ($alldata->pekerjaan_ibu == '100')? 'selected': '' }}>Buruh</option>
                                      <option value="60" {{ ($alldata->pekerjaan_ibu == '60')? 'selected': '' }}>Pedagang</option>
                                      <option value="30" {{ ($alldata->pekerjaan_ibu == '30')? 'selected': '' }}>Penambak Ikan</option>
                                      <option value="0" {{ ($alldata->pekerjaan_ibu == '0')? 'selected': '' }}>Tidak Bekerja</option>
                                   </select>

                                      @error('pekerjaan_ibu')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 4nd row --}} 

                             {{--first 5nd row foto --}} 
                             <div class="row">

                              <div class="col-md-6">

                               <div class="form-group">
                                   <h5>Lampiran <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                       <input type="file" name="lampiran" id="lampiran" class="form-control" > 
                                   </div>
                                   
                               </div>
                             </div> {{-- End md-6 form input --}}

                             <div class="class col-md-6">
                              <div class="form-group">
                                <div class="controls">
                                    <img id="showLampiran" src="{{ (!empty($siswa->lampiran)) ? url('upload/lampiran_images/'.$siswa->lampiran) : url('upload/no_image.jpg') }}" 
                                    style="width: 100px; width: 100px; boarder: 1px solid #000000">
                                </div>
                                
                              </div>
                          </div>   {{-- end md-6 show foto --}}


                             </div>  {{--end 5nd row --}} 

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" >
                               <a href="{{ route('siswa') }}" class="btn btn-rounded btn-primary mb-5">Back</a>
                           </div>
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>


    
    </div>
</div>

{{-- Show Change Image JS --}}
<script type="text/javascript">

  $(document).ready(function(){
    $('#lampiran').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showLampiran').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
  
    });
  
  });
  
  </script>

@endsection