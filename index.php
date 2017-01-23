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
          $q1 = mysqli_query($koneksi, "SELECT * FROM tb_tamu");
          while($r1 = mysqli_fetch_array($q1))
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

    </div>

    <?php include "part_footer.php";  ?>

  </body>
</html>
