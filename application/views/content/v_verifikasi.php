  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Penumpang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penumpang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Transportasi</th>
                    <th>Rute</th>
                    <th>Jadwal</th>
                    <th>Jumlah Penumpang</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                    foreach($data as $row){ 
                  ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row->nama ?></td>
                  <td><?php echo $row->transportasi ?></td>
                  <td><?php echo $row->rute ?></td>
                  <td><?php echo $row->jadwal ?></td>
                  <td><?php echo $row->jumlahpenumpang ?></td>
                  <td><?php echo $row->status ?></td>
                  <td>
                       <a class="btn <?php echo ($row->status === 'Belum Diverifikasi')?'btn-danger' : 'btn-primary' ?>"  style="float:center" data-toggle="modal" data-target="#exampleModal<?=$row->id;?>">Verifikasi</a>
                  </td>
                </tr>
                <div class="modal fade" id="exampleModal<?=$row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Verifikasi Tiket</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="<?php echo site_url('mudik/verfikasitiket'); ?>" method="POST">
                        <input type="hidden" class="form-control" value="<?=$row->id?>" name="id" id="id">
                      <div class="form-group">
                           <label for="exampleInputPassword1">Kelas</label>
                              <select id="status" name="status" class="form-control">
                                <option value="">Verifikasi Tiket</option>
                                <option value="Setuju">Setuju</option>
                                <option value="Tidak Setuju">Tidak Setuju</option>
                              </select>
                        </div>
                          <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                      </form>
                    </div>
                  
                  </div>
                </div>
              </div>
                <?php } ?>
                  </tbody>
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
  </div>
</script>
</body>
</html>