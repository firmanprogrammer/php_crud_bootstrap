<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "part_header.php";  ?>
  </head>
  <body>
    <?php include "part_nav.php";  ?>
    <br/><br/><br/>
    <div class="container">

      <!-- Modal Add-->
      <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form method="post" action="aksi.php">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Data</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="txtname">Name</label>
                  <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="txtemail">Email</label>
                  <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="txturl">Website</label>
                  <input type="text" class="form-control" id="txturl" name="txturl" placeholder="Website/Url">
                </div>
                <div class="form-group">
                  <label for="txtpesan">Message</label>
                  <textarea id="txtpesan" name="txtpesan" class="form-control" rows="3" placeholder="Message"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-success">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Add-->

      <!--Search-->
      <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-8">
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
          <form class="form" method="get" action="cari.php"> <!-- form-inline -->
            <div class="form-group">
              <div class="input-group">
                <?php
                  $txtcari = "";
                  if(isset($_GET["txtcari"])){
                    $txtcari = $_GET["txtcari"];
                  }
                ?>
                <input type="text" class="form-control" id="txtcari" name="txtcari" value="<?php echo $txtcari;?>" placeholder="Type here and press Enter">
                <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--Search-->
      <br><br>

      <table class="table table-hover">
        <thead>
          <tr>
              <td class="text-center"><b>Id</b></td>
              <td class="text-center"><b>Time</b></td>
              <td class="text-center"><b>Name</b></td>
              <td class="text-center"><b>Email</b></td>
              <td class="text-center"><b>Website</b></td>
              <td class="text-center"><b>Message</b></td>
              <td class="text-center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
              </td>
          </tr>
        </thead>
        <tbody>
          <?php
          $num_rec_per_page=2;
          if (isset($_GET["page"]))
          {
            $page  = $_GET["page"];
          }
          else
          {
            $page=1;
          };
          $start_from = ($page-1) * $num_rec_per_page;
          $txtcari = "";
          if(isset($_GET["txtcari"])){
            $txtcari = $_GET["txtcari"];
          }else{
            $txtcari = "";
          }
          $q1 = mysqli_query($koneksi,"SELECT * FROM tb_tamu WHERE nama like '%$txtcari%' ORDER by id desc LIMIT $start_from, $num_rec_per_page");
          while($r1 = mysqli_fetch_assoc($q1))
          {
          ?>
          <tr>
            <td><?php echo $r1['id']; ?></td>
            <td class="text-center"><?php echo $r1['time']; ?></td>
            <td class="text-center"><?php echo $r1['nama']; ?></td>
            <td class="text-center"><?php echo $r1['email']; ?></td>
            <td class="text-center"><?php echo $r1['url']; ?></td>
            <td class="text-center"><?php echo $r1['pesan']; ?></td>
            <td class="text-center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit<?php echo $r1['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
              <a href="aksi.php?btndelete=<?php echo $r1['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              <!-- Modal Edit-->
              <div class="modal fade text-left" id="ModalEdit<?php echo $r1['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="post" action="aksi.php">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Change Data (<?php echo $r1['id']; ?>)</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="txtname">Name</label>
                          <input type="hidden" id="txtid" name="txtid" value="<?php echo $r1['id']; ?>">
                          <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Name" value="<?php echo $r1['nama']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="txtemail">Email</label>
                          <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Email" value="<?php echo $r1['email']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="txturl">Website</label>
                          <input type="text" class="form-control" id="txturl" name="txturl" placeholder="Website/Url" value="<?php echo $r1['url']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="txtpesan">Message</label>
                          <textarea id="txtpesan" name="txtpesan" class="form-control" rows="3" placeholder="Message"><?php echo $r1['pesan']; ?></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnupdate" name="btnupdate" class="btn btn-success">Save Changed</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal Edit-->
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>

      <?php
        $rs_result = mysqli_query($koneksi,"SELECT * FROM tb_tamu WHERE nama like '%$txtcari%' Order by id desc");
        $total_records = mysqli_num_rows($rs_result);
        $total_pages = ceil($total_records / $num_rec_per_page);

        $cari = "";
        if (isset($_GET["txtcari"])){
          $cari = "&txtcari=".$txtcari;
        }

        $pagenow = 1;
        if (isset($_GET["page"])) {
          $pagenow = $_GET["page"];
        }

        $pageLast = $pagenow + 9;
        if($pageLast>$total_pages){
          $pagenow = $total_pages - 9;
          if($pagenow<=0){
            $pagenow = 1;
          }
          $pageLast = $total_pages;
        }
      ?>

      <!-- paging -->
      <div class="text-center">
          <ul class="pagination">
            <li><a href="cari.php?page=1<?php echo $cari; ?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a></li>
            <?php
              if ($pagenow>3) {
                $pagenow = $pagenow-3;
              }else if ($pagenow>2) {
                $pagenow = $pagenow-2;
              }else if ($pagenow>1) {
                $pagenow = $pagenow-1;
              }
              for ($i=$pagenow; $i<=$pageLast; $i++){
                 if (!isset($_GET["page"]) && $i==1) {
                     echo '<li class="active"><a href="cari.php?page='.$i.$cari.'">'.$i.'</a></li>';
                 }else if (isset($_GET["page"]) && $i==$_GET["page"]) {
                     echo '<li class="active"><a href="cari.php?page='.$i.$cari.'">'.$i.'</a></li>';
                 }else {
                     echo '<li><a href="cari.php?page='.$i.$cari.'">'.$i.'</a></li>';
                 }
              }
              if ($pageLast<$total_pages) {
                echo '<li><a>...</a></li>';
              }
            ?>
            <li><a href="cari.php?page=<?php echo $total_pages.$cari;?>" ><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></a></li>
          </ul>
      </div>
      <!-- paging -->

    </div>

    <?php include "part_footer.php";  ?>

  </body>
</html>
