@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>






<div class="content-wrapper">
    <div class="container-full">

     
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add nilai siswa </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form id="formNilai" method="POST" action="{{ route('store.nilai.siswa') }}">
                        @csrf
                         <div class="row">
                           <div class="col-12">	

                            <div class="add_item">

                            <div class="form-group">
                                <h5>Nama <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="siswa_id"  required="" class="form-control">
                                        <option value="" selected="" disabled="" >Select Nama siswa</option>
                                        @foreach ($siswa as $data)

                                        <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->jurusan}}</option>

                                        @endforeach
                                    </select>
                                
                                </div>
                            </div> 
                            {{-- end form group --}}
                         

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mata pelajaran <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subject_id[]"  required="" class="form-control">
                                                <option value="" selected="" disabled="" >Select Mata pelajaran</option>
                                                @foreach ($mapel as $pelajaran)
                                                <option value="{{ $pelajaran->id }}" {{ old('subject_id') == $pelajaran->id  ? 'selected' : null}}>{{ $pelajaran->name }}</option>
                                                @endforeach
                                            </select>   
                                        
                                        </div>
                                    </div> {{-- end form group --}}
                                    
                                </div> {{-- end col md 4 --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Nilai Mata pelajaran <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="nilai_mapel" required name="nilai_mapel[]" class="form-control" value="{{ old('nilai_mapel') }}">
                                        </div>
                                        
                                    </div>  
                                </div> {{-- end col md 3 --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Nilai Keaktifan <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="nilai_keaktifan" required name="nilai_keaktifan[]" class="form-control" value="{{ old('nilai_keaktifan') }}">
                                        </div>

                                    </div>  
                                </div> {{-- end col md 3 --}}

                                <div class="col-md-2" style="padding-top: 25px;">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                </div> {{-- end col md 2 --}}
                            </div>  {{-- end row --}}
                        </div> {{-- end add_item --}}

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" >
                               <a href="{{ route('nilai.siswa.view') }}" class="btn btn-rounded btn-primary mb-5">Back</a>
                           </div>

                        </form> {{--end formNilai --}}
   
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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Mata pelajaran <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subject_id[]"  required="" class="form-control">
                                    <option value="" selected="" disabled="" >Select Mata pelajaran</option>
                                    @foreach ($mapel as $pelajaran)
                                    <option value="{{ $pelajaran->id }}" {{ old('subject_id') == $pelajaran->id  ? 'selected' : null}}>{{ $pelajaran->name }}</option>
                                    @endforeach
                                </select>
    
                                @error('subject_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            
                            </div>
                        </div> {{-- end form group --}}
                        
                    </div> {{-- end col md 4 --}}
    
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Nilai Mata pelajaran <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="nilai_mapel[]" required class="form-control" value="{{ old('nilai_mapel') }}">
    
                            </div>
                            
                        </div>  
                    </div> {{-- end col md 3 --}}
    
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Nilai Keaktifan <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="nilai_keaktifan[]" required class="form-control" value="{{ old('nilai_keaktifan') }}">
    
                            </div>
                            
                        </div>  
                    </div> {{-- end col md 3 --}}
    
    
                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore">
                            <i class="fa fa-plus-circle"></i>
                        </span>
                        <span class="btn btn-danger removeeventmore">
                            <i class="fa fa-minus-circle"></i>
                        </span>
                    </div> {{-- end col md 2 --}}
    
                </div>
        </div>
    </div>
</div>

{{-- validation script --}}
<script>
   $("#formNilai").validate();
</script>

{{-- button plus script --}}
<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click", ".addeventmore", function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter-=1;
        });


    });
 </script>

@endsection