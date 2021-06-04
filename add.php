<?php  

require_once('connection.php');
if(isset($_REQUEST['btn_insert'])){
    $mooc_id = $_REQUEST['txt_id'];
    $mooc_name = $_REQUEST['txt_name'];
    $mooc_course_year = $_REQUEST['txt_year'];
    $mooc_pay = $_REQUEST['txt_pay'];
    $mooc_images = $_REQUEST['txt_images'];
    $mooc_order = $_REQUEST['txt_order'];
    $mooc_course_price = $_REQUEST['txt_course_price'];
    $mooc_course_discount = $_REQUEST['txt_course_discount'];
    $cs_project_mooc_id = $_REQUEST['txt_project_mooc_id'];
    $cs_project_confirm = $_REQUEST['txt_project_confirm'];
    $preview = $_REQUEST['txt_preview'];

    if (empty($mooc_id)){
        $errorMsg = "Please enter Id";
    }else if (empty($mooc_name)){
        $errorMsg = "Please enter name";
    }else if (empty($mooc_course_year)){
        $errorMsg = "Please enter course_year";
    }else if (empty($mooc_images)){
        $errorMsg = "Please enter image-link";
    }else if (empty($mooc_order)){
        $errorMsg = "Please enter mooc_order";
    }else if (empty($mooc_course_price)){
        $errorMsg = "Please enter course_price";
    }else if (empty($mooc_course_discount)){
        $errorMsg = "Please enter course_discount";
    }else if (empty($cs_project_mooc_id)){
        $errorMsg = "Please enter project_mooc_id";
    }else if (empty($preview)){
        $errorMsg = "Please enter preview";
    }else{
        try{
            if (!isset($errorMsg)){
                $insert_stmt = $db->prepare("INSERT INTO tb_mooc(mooc_id,mooc_name,mooc_course_year,mooc_pay,mooc_images,mooc_order,
                mooc_course_price,mooc_course_discount,cs_project_mooc_id,cs_project_confirm,preview) VALUES(:mid,:mname,:myear,:mpay,:mimg,:morder,:mprice,:mdiscount,:csid,:csconfirm,:preview)");
                $insert_stmt->bindParam(':mid', $mooc_id);
                $insert_stmt->bindParam(':mname', $mooc_name);
                $insert_stmt->bindParam(':myear', $mooc_course_year);
                $insert_stmt->bindParam(':mpay', $mooc_pay);
                $insert_stmt->bindParam(':mimg', $mooc_images);
                $insert_stmt->bindParam(':morder', $mooc_order);
                $insert_stmt->bindParam(':mprice', $mooc_course_price);
                $insert_stmt->bindParam(':mdiscount', $mooc_course_discount);
                $insert_stmt->bindParam(':csid', $cs_project_mooc_id);
                $insert_stmt->bindParam(':csconfirm', $cs_project_confirm);
                $insert_stmt->bindParam(':preview', $preview);
                
                
            if($insert_stmt->execute()){
                
                $insertMsg="Insert SuccessFully";
                echo "<script>parent.window.location.reload();</script>";
                
                
                
            }
            }

        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }




}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/boostrap/css/bootstrap.min.css">
    <script src="assets\js\jQuery\jquery-3.6.0.min.js"></script>
    
  <h1><center>Add new COURSE!!</center></ha>
    
</head>
<body>
    <div class="container justify-content-md-center">
<?php
 if(isset($errorMsg)){
?>
<div class="alert alert-danger">
    <strong>Wrong! <?php echo $errorMsg; ?></strong>
</div>

 <?php } ?>
 <?php
 if(isset($insertMsg)){
?>
<div class="alert alert-success">
    <strong>Succcess! <?php echo $insertMsg; ?></strong>
</div>

 <?php } ?>

 <form metod="post" class="form-label">
     <div class="form-group text-center">

         <div class="row">
    <label for="mooc_id" class="col control-label">ID</label>
    <div class="col-sm-6">
        <input type='text' name="txt_id" class="form-control" placeholder="Enter Id....">  
    </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="mooc_name" class="col control-label">Name</label>
    <div class="col-sm-6">
        <input type='text' name="txt_name" class="form-control" placeholder="Enter Name....">   </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="mooc_course_year" class="col control-label">Course Year</label>
    <div class="col-sm-6">
        <input type='text' name="txt_year" class="form-control" placeholder="Enter Year....">   </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="mooc_pay" class="col control-label">Pay</label>
    <div class="col-sm-6">
        <input type='text' name="txt_pay" class="form-control" placeholder="Enter Pay....">  </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="mooc_images" class="col control-label">Image</label>
    <div class="col-sm-6">
        <input type='text' name="txt_images" class="form-control" placeholder="Enter Image Link....">   </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="mooc_order" class="col control-label">Order</label>
    <div class="col-sm-6">
        <input type='text' name="txt_order" class="form-control" placeholder="Enter Order....">  </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="mooc_course_price" class="col control-label">Course Price</label>
    <div class="col-sm-6">
        <input type='text' name="txt_course_price" class="form-control" placeholder="Enter Price....">  </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="mooc_course_discount" class="col control-label">Course Discount</label>
    <div class="col-sm-6">
        <input type='text' name="txt_course_discount" class="form-control" placeholder="Enter Discount....">  </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="cs_project_mooc_id" class="col control-label">Project mooc id</label>
    <div class="col-sm-6">
        <input type='text' name="txt_project_mooc_id" class="form-control" placeholder="Enter Project mooc ID....">  </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="cs_project_confirm" class="col control-label">Project Confirm</label>
    <div class="col-sm-6">
        <input type='text' name="txt_project_confirm" class="form-control" placeholder="Enter Project Confirm...."> </div>
 </div>
 <div class="form-group">
 <div class="row">
    <label for="preview" class="col control-label">Preview</label>
    <div class="col-sm-6">
        <input type='text' name="txt_preview" class="form-control" placeholder="Enter preview....">  </div>
 </div>
 <div class="form-group">
     
    
    <center><div class="col-sm-6">
 <input type='submit'  name="btn_insert"  class="btn btn-success" value="insert"> 
        <a href="index.php" class="btn btn-danger">Cancel</a>
 </div></center>


 </form>
 </div>

 



    
 <script src="assets/js/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>