@extends('admin.admin_master')

@section('admin')

{{-- jQuery Ajax CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- HandleBars CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Monthly Salary</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">

        <div class="col-12">

          <div class="box bb-3 border-warning">
            <div class="box-header">
            <h4 class="box-title">Employee <strong>Monthly Salary</strong></h4>
            </div>
  
            <div class="box-body">
              

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">
                        <h5> Attendance Date <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        
                    </div>

                   </div> {{--end col md 6 --}}

                   <div class="col-md-6" style="padding-top: 25px;">
                      
                    <a id="search" class="btn btn-primary" name="search">Search</a>

                   </div> {{--end col md 6 --}}

                </div> {{--end row --}}


                {{-- Registration Fee Table --}}

                <div class="row ">
                  <div class="col-md-12">
                      
                    <div id="DocumentResults">

                        <script id="document-template" type="text/x-handlebars-template">
                        <table class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    @{{{thsource}}}
                                </tr>
                            </thead>
                            <tbody>
                                @{{#each this}}
                                <tr>
                                    @{{{tdsource}}}
                                </tr>
                                @{{/each}}
                            </tbody>

                        </table>
                      </script>
                        

                    </div>

                  </div>

                </div>

                
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>


<script type="text/javascript">
  $(document).on('click','#search',function(){
    var date = $('#date').val();
     $.ajax({
      url: "{{ route('employee.monthly.salary.get')}}",
      type: "get",
      data: {'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>


@endsection