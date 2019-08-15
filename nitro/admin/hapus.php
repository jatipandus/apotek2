<!DOCTYPE html>
<html lang='en'>
<head>
 
 <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Menampilkan Modal Bootstrap | AmazingLight</title>

   <link href='../css/bootstrap.min.css' rel='stylesheet'>
  
</head>

<body>

<div class='container'>

  
  <!-- Modal -->
  <div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog modal-sm'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Data kelahiran</h4>
        </div>
        <div class='modal-body'>
          <p>Data berhasil di masukan</p>
        </div>
        <div class='modal-footer'>

           <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip"  href="datakelahiran.php">Ok</a>
              
          <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" target="_blank" href="datakelahiran.php"><span class="glyphicon glyphicon-print"></span></a><br>
                    
        </div>
      </div>
    </div>
  </div>
</div>

<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script type='text/javascript'>
   $('#myModal').modal('show');

</script>
</body>
</html>