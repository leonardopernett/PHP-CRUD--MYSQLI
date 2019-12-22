<?php include_once('db.php'); ?>
<?php include_once('./include/header.php'); ?>

<?php

//selecte
  $query = "SELECT * FROM tasks";
  $resultado = mysqli_query($connect , $query)
?>


<?php

 if(isset($_GET['id'])){
     $id = $_GET['id'];
    $quer = "SELECT * FROM tasks WHERE id=$id";
    $result = mysqli_query($connect, $quer);
    $rows = mysqli_fetch_array($result);

 }

?>
 
    <div class="container">
        <div class="row">
           <div class="col-md-4 mt-5">
           <?php if(isset($_SESSION['message'])){  ?>
              <div class="alert alert-<?php echo $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
                  <?php echo $_SESSION['message'] ; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

                 <?php session_unset(); } ?>
             <div class="card">
               <div class="card-body">
               
               <?php if(!$_GET): ?>
               <h4>create task</h4>
                 <form action="save.php" method="post">
                    <div class="form-group">
                      <input type="text" name="title" class="form-control" placeholder="titulo" autofocus>
                    </div>
                    <div class="form-group">
                      <textarea name="description" class="form-control" rows="2" placeholder="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">save</button>
                 </form>
                 <?php endif ?>

                 <?php if($_GET): ?>
                 <h4>edit task</h4>
                 <form action="edit.php" method="post">
                    <div class="form-group">
                      <input type="text" name="title" value="<?php echo $rows['title'] ?>" class="form-control" value placeholder="titulo" autofocus>
                    </div>
                    <div class="form-group">
                      <textarea name="description" class="form-control" rows="2" placeholder="description"><?php echo $rows['description'] ?>
                      
                      </textarea>
                    </div>
                    <input type="hidden" value="<?php echo $rows['id'] ?>" name="id" >
                    <button type="submit" class="btn btn-warning btn-block">update</button>
                 </form>
                 <?php endif ?>
               </div>
             </div>
           </div>
           <div class="col-md-8 mt-5">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>title</th>
                        <th>description</th>
                        <th>created</th>
                        <td>action</td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php  while($row = mysqli_fetch_array($resultado)){  ?>
                       <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                            <a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                         </td>
                        
                       </tr>      
                    <?php } ?>
                  </tbody>
               </table>
           </div>
        </div>
    </div>

<?php include_once('./include/footer.php'); ?>
