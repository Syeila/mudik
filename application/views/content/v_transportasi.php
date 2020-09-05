  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Transportasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transportasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <a onclick="add_data()" class="btn btn-primary btn-md mb-2">Tambah</a>
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Transportasi</th>
                    <th>Rute</th>
                    <th>Jadwal</th>
                    <th>Slot</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                     <input type="hidden" value="" name="id_login"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Moda Tranportasi</label>
                            <div class="col-md-9">
                                <input name="transportasi" placeholder="Moda Tranportasi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Jadwal</label>
                            <div class="col-md-9">
                                <input name="jadwal" placeholder="Jadwal" class="form-control" type="date">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rute</label>
                            <div class="col-md-9">
                                <input name="rute" placeholder="Rute" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Slot</label>
                            <div class="col-md-9">
                                <input name="slot" placeholder="Slot" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="ajax_save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->




<script type="text/javascript" rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url()?>assets/Atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>


<script type="text/javascript">
  var table;
    var save_method; //for save method string
    var base_url = '<?php echo base_url();?>';

    
$(document).ready(function() {

        //datatables
        table = $('#example1').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('mudik/datatables')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
              { 
                  "targets": [ -1 ], //last column
                  "orderable": false, //set not orderable
              },
            ],

        });

        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    
}); 
    // dokumen ready function

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function add_data()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Data'); // Set Title to Bootstrap modal title
        
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        // $('#photo-preview').hide(); // hide photo preview modal
        // $('#label-photo').text('Upload Photo');
    }

    function ajax_save()
    {
        $('#btn_save').text('saving...'); //change button text
        $('#btn_save').attr('disabled',true); //set button disable 
        var url;
     
        if(save_method == 'add') {
            url = "<?php echo site_url('mudik/store')?>";
        } else {
            url = "<?php echo site_url('mudik/update')?>";
        }
     
        // ajax adding data to database
        var formData = new FormData($('#form')[0]);
        // formData.append('content', CKEDITOR.instances['content'].getData());

        $.ajax({
            url : url,
            type: "POST",
            data: formData, //$('#form_blog').serialize(),
            contentType : false, 
            processData : false,
            dataType: "JSON",
            success: function(data)
            {
     
                if(data.status) //if success close modal and reload ajax table
                {
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Data Successfully Added',
                        message: "<?php echo $this->session->flashdata('success'); ?>",
                        position: 'topRight'
                        
                    });
                    $('#modal_form').modal('hide');
                    reload_table();
                }else{
                    
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                
                }
                $('#btn_save').text('Save'); //change button text
                $('#btn_save').attr('disabled',false); //set button enable 
     
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Error Adding / Update Data',
                        message: "<?php echo $this->session->flashdata('success'); ?>",
                        position: 'topRight'
                        
                });
                // alert('Error adding / update data');
                $('#btn_save').text('Save'); //change button text
                $('#btn_save').attr('disabled',false); //set button enable 
     
            }
        });
    }

    function ajax_edit(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        // $('.invalid-feedback').empty(); // clear error string
       // $('#modal_blog').modal('show'); // show bootstrap modal
       // $('.modal-title').text('Edit Blog'); // Set Title to Bootstrap modal title
     
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('mudik/edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="transportasi"]').val(data.transportasi);
                $('[name="jadwal"]').val(data.jadwal);
                $('[name="rute"]').val(data.rute);
                $('[name="slot"]').val(data.slot);
           
                // $('[name="image"]').val(data.image);
                
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Error get data from ajax',
                        message: "<?php echo $this->session->flashdata('success'); ?>",
                        position: 'topRight'
                        
                });
                // alert('Error get data from ajax');
            }
        });
    }

    

    function ajax_delete(id)
    {

        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure about that?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
                    $.ajax({
                        url : "<?php echo site_url('mudik/destroy')?>/"+id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            //if success reload ajax table

                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                    title: 'Data Successfully Deleted',
                                    message: "<?php echo $this->session->flashdata('success'); ?>",
                                    position: 'topRight'
                                    
                            });
                            $('#modal-create').modal('hide');
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            iziToast.warning({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                    title: 'Error deleting data',
                                    message: "<?php echo $this->session->flashdata('success'); ?>",
                                    position: 'topRight'
                                    
                            });
                            // alert('Error deleting data');
                        }
                    });

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
         
                }, true],
                ['<button>NO</button>', function (instance, toast) {
         
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
         
                }],
            ],
            onClosing: function(instance, toast, closedBy){
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy){
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
        // if(confirm('Are you sure delete this data?'))
        // {
        //     // ajax delete data to database
            // $.ajax({
            //     url : "<?php echo site_url('mudik/destroy')?>/"+id,
            //     type: "POST",
            //     dataType: "JSON",
            //     success: function(data)
            //     {
            //         //if success reload ajax table
            //         $('#modal-create').modal('hide');
            //         reload_table();
            //     },
            //     error: function (jqXHR, textStatus, errorThrown)
            //     {
            //         alert('Error deleting data');
            //     }
            // });
     
        // }
    }
</script>
</body>
</html>