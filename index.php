<?php
$directory = 'file';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));


$subfolder = (isset($_GET['dir'])) ? $_GET['dir'] : '' ;
$scanned_Sub_directory = array_diff(scandir($directory.'/'.$subfolder), array('..', '.'));
// var_dump($scanned_directory);

$listfolder = array_values($scanned_directory);

$listfile = array_values($scanned_Sub_directory);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Files</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dist/css/dashboard.css" rel="stylesheet">
    
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">FILES</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>

              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Folder List</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
              
              <?php
              foreach ($listfolder as $key => $value) {
                if (is_dir('file/'.$value)) {
                  # code...
                
              ?>
              <li class="nav-item">
                <a class="nav-link" href="?dir=/<?php echo $value ?>">
                  <span data-feather="folder"></span>
                  <?php echo $value ?>
                </a>
              </li>
              <?php
              }
              }
              ?>
                
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="table-responsive">
            <table class="table table-striped table-sm" id='tailieu'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Key</th>
                  <th>Type</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($listfile as $key => $value) {
                
              ?>
                <tr>
                  <td><?php echo $key+1 ?></td>
                  
                  <td><?php echo substr($value,0,8) ?></td>
                  <?php
                  if (is_dir('file'.$subfolder.'/'.$value)) {
                    ?>
                      <td><span data-feather="folder"></span></td>
                      <td><a href="?dir=<?php echo $subfolder.'/'.$value ?>"><?php echo $value ?></a></td>
                    <?php
                  }else{
                    ?>
                      <td><span data-feather="file-text"></span></td>
                      <td><a href="file<?php echo $subfolder.'/'.$value ?>"><?php echo $value ?></a></td>
                    <?php
                  }
                  
                  ?>
                  

                </tr>
               <?php
               }
               ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/jquery-3.3.1.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <script src="dist/js/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.dataTables.min.js"></script>
    

    <!-- Icons -->
    <script src="dist/js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <!-- <script src="dist/js/Chart.min.js"></script> -->
    <script>
      $(document).ready(function() {
            $('#tailieu').DataTable();
        } );
    </script>
  </body>
</html>
