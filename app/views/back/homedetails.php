

<?php require("header.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Home Content</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home </a></li>
            <li class="breadcrumb-item active">home Details</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 mx-auto col-12">
         
          <div class="card">
              <div class="card-header">
                <a  href="home" class="btn btn-info ml-1">add </a>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class=" table table-bordered ">
                  <thead>
                    <tr>
                      <th >Title</th>
                      <th>Discription</th>
                      <th>Image</th>
                      <th>UserId</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data as $post) : ?>
                    <tr>
                      <td> <?=$post['title']; ?></td>
                      <td> <p style="overflow: scroll; width:100px ;height:150px" class=" overflow-hidden">

                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                       Quos, hic recusandae tempora earum laudantium blanditiis.
                        Eveniet veniam quibusdam mollitia quae vero accusamus,
                         similique ad voluptatum in blanditiis voluptatibus distinctio et!</p></td>
                      <td><img width="100" height="150" src="<?=PATH.'back/uploud/'.$post['img']; ?>" alt=""></td>
                      
                   
                      <td> <?=$post['userId']; ?></td>
                      <td> <a href="homeupdate/?id=<?= $post['id'];?>" type="submit"  class="btn btn-primary">Update</a> </td>
                      <td> <a href="delete/?id=<?= $post['id'];?>" type="submit" class="btn btn-danger">Delete</a> </td>
                     
                    </tr>
                    <?php endforeach; ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require("footer.php"); ?>