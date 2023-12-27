<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<div class="container mt-4">
<h1>Students List</h1>

  

  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>S.No</th>
             <th>Name</th>
             <th>Course</th>
             <th>Department</th>

          </tr>
       </thead>
       <tbody>
         <?php if(isset($student_details) && !empty($student_details)){

         	$i=1;
         	foreach($student_details as $val){
         ?>
          <tr>
             <td> <?php echo($i)?></td>
             <td><?php echo($val['name'])?></td>
             <td><?php echo($val['degree'])?></td>
             <?php if($val['dept_id']==1){ ?>
             <td> CS </td>
             <?php } elseif($val['dept_id']==2){ ?>
              <td> Maths </td>
              <?php } elseif($val['dept_id']==3){ ?>
              <td> Physics </td>
              <?php } elseif($val['dept_id']==4){ ?>
              <td> Chemistry </td>
              <?php } elseif($val['dept_id']==5){ ?>
              <td> Tamil </td>
              <?php } elseif($val['dept_id']==6){ ?>
              <td> English </td>
             <?php } ?>

          </tr>
        <?php  $i++; } } ?>
       </tbody>
     </table>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );
</script>
</body>
</html>
