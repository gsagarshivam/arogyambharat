<?php
   session_start();
   if(!isset($_SESSION['userid']) || $_SESSION['role']!='Admin')
   {
    header('Refresh:0;URL=error.php');
   }
   else{
   
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Nutriveda Details </title>
    <?php
        include("inc/head.php");
    ?>

</head>

<body>

   
    <div id="main-wrapper">

        <?php
            include("inc/nav.php");
        ?>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Nutriveda Details 
                            </div>
                        </div>
                        <?php
            				include("inc/header.php");
        				?>
                    </div>
                </nav>
            </div>
        </div>
        <?php
            include("inc/sidebar.php");
        ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Landing Page</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Nutriveda Details </a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nutriveda Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                               <th class="th-sm">S.No</th>
                                               <th class="th-sm">Name</th>
                                               <th class="th-sm">Email</th>
                                               <th class="th-sm">Mobile Numer</th>  
                                               <th class="th-sm">Message</th>
                                               <th class="th-sm">Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               include("conn.php");
                                               $x = "0";
                                               $result_set="SELECT * FROM nutriveda ORDER BY id DESC";
                                               $result = mysqli_query($connect, $result_set) or die(mysqli_error($connect));

                                              
                                               
                                               $select = array();
                                               while( $row = mysqli_fetch_assoc($result) ) {
                                                       $select[] = $row;
                                                       }
                                              
                                               foreach ($select as $key => $row) {
                                                ?>
                                                 <tr>
                                                   <th scope="row"><?php echo ++$x; ?></th>
                                                   <td><?php echo $row['name']; ?> </td>
                                                   <td><?php echo $row['email']; ?> </td>
                                                   <td><?php echo $row['mobile_number']; ?> </td>
                                                   <td><?php echo $row['address']; ?> </td>
                                                   <td><?php echo $row['created_at']; ?> </td>
                                                 
                                                </tr>
                                                <?php
                                               }

                                             ?>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
         <?php
            include("inc/footer.php");
         ?>
    </div>
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [ {
                    extend: 'excelHtml5',
                    autoFilter: true,
                    sheetName: 'Exported data',
                    text: 'Export',
                    className: 'btn btn-primary'

                }
                
                
             ]
            } );
        } );
    </script>

</body>
</html>
<?php } ?>