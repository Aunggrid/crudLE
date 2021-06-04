
<?php 

    require_once('connection.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $db->prepare("SELECT * FROM tb_mooc WHERE mooc_id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        // Delete an original record from db
        $delete_stmt = $db->prepare('DELETE FROM tb_mooc WHERE mooc_id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header('Location:index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/boostrap/css/bootstrap.min.css">
    
</head>
<body>

    <div style="padding-left:-50px;margin-left:-10px" class="container">
    <div class="display-3 text-center">LE</div>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#ADDCourse">
  ADD(+)</button>
  
  <table id="LE-table" class="display">
        <thead>
            <tr>
               <th>Edit Name</th>
                <th>Delete</th>
                <th>id</th>
                <th>Course Name</th>
                <th>Course year</th>
                <th>Image</th>
                <th>pay</th>
                <th>Order</th>
                <th>Course_price</th>
                <th>Discount</th>
                <th>Cs_project_id</th>
                <th>Cs_confirm</th>
                <th>Preview</th>

               
            </tr>
        </thead>

        <tbody>
            <?php 
                $select_stmt = $db->prepare("SELECT * FROM tb_mooc");
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <tr>
                <td><a href="edit.php?update_id=<?php echo $row["mooc_id"]; ?>" button type="button" class="btn btn-warning">Edit</a></td>
                      
                
                    <td><a href="?delete_id=<?php echo $row["mooc_id"]; ?>" class="btn btn-danger">Delete</a></td>
                <td><?php echo $row['mooc_id']; ?> </td>
                    <td><div style="width :200px"><?php echo $row["mooc_name"]; ?></td>
                    <td><?php echo $row["mooc_course_year"]; ?></td>
                    <td><img style="width: 200px;height:160px;" src='<?php echo $row["mooc_images"]; ?>'></td>
                    <td><?php echo $row["mooc_pay"]; ?></td>
                    <td><?php echo $row["mooc_order"]; ?></td>
                    <td><?php echo $row['mooc_course_price']; ?> </td>
                    <td><?php echo $row['mooc_course_discount']; ?> </td>
                    <td><?php echo $row['cs_project_mooc_id']; ?> </td>
                    <td><?php echo $row['cs_project_confirm']; ?> </td>
                    <td><?php echo $row['preview']; ?> </td>

                    
                   
                </tr>

            <?php } ?>
        </tbody>
    </table>
    </div>


    <!-- Modal -->
<div class="modal fade" id="ADDCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ADDCourse" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ADDCourse">ADD NEW COURSE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <?php include "add.php"; 
     
      
      
     ?>
     

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
  
</div>
<!-- Modal Edit COURSE -->
<div class="modal fade" id="EditCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditCourse" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditCourse">Edit COURSE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <?php include "edit.php"; 
     
      
      
     ?>
     

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
  
</div>

    
    
<script src="assets\js\jQuery\jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script> $(document).ready(function() {
        $('#LE-table').DataTable({
            
            "order": [[ 2, "asc" ]],
        "columnDefs":[{
       "targets": [0,1,5],
       "orderable":false
        }]
      } );
    } )
    ;     </script>
    
<script src="assets/js/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>