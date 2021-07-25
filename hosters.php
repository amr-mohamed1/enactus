<?php 
  ob_start(); 
  session_start();
  $page_name = "Hosters";
  $style = "hosters.css";
  $script = "";
  include "init.php"; 
  $HosterData = selectHighBoard();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card mt-4">
            <div class="card-header">
              <h3 class="card-title">Hosters</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
              <div class="hosters_options mb-2">
                <a href="add_hoster.php" class="btn btn-info">Add <i class="fas fa-user-plus ml-1"></i></a>
              </div>
              <table style="width: 100% !important" class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Commity</th>
                    <th>Position</th>
                    <th>State</th>
                    <th>Edit</th>
                    <th>Profile</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach($HosterData as $HosterDataInfo){
                  ?>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td><?php echo $i?></td>
                    <td>
                      <?php 
                        if($HosterDataInfo['position_name'] == 'President'){
                          echo "<i class='fas fa-chess-queen'></i> ";
                        }
                        echo $HosterDataInfo['first_name'] . " " . $HosterDataInfo['last_name']
                      ?>
                    </td> 
                    <td><?php echo $HosterDataInfo['email']?></td>
                    <td><?php echo $HosterDataInfo['phone']?></td>
                    <td><?php echo $HosterDataInfo['commity_name']?></td>
                    <td><?php echo $HosterDataInfo['position_name']?></td>

                    <td><?php 
                    
                        if($HosterDataInfo['old'] == "1"){
                          echo " Old Board ";
                        }else{
                          echo " current Board ";
                        }

                    ?></td>

                    <td><a href="update_hoster.php?id=<?php echo $HosterDataInfo['id']?>" class="btn btn-primary"><i class="table_icon far fa-edit ml-1"></i></a></td>
                    <td><a href="profile.php?from=hosters&id=<?php echo $HosterDataInfo['id']?>" class="btn btn-warning"><i class="table_icon far fa-id-badge ml-1"></i></a></td>
                    <td><a href="delete.php?from=hosters&id=<?php echo  $HosterDataInfo['id'];?>" class="btn btn-danger"><i class="table_icon far fa-trash-alt ml-1"></i></a></td>
                    </td>
                  </tr>
                  <?php 
                      $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>


<?php 
?>