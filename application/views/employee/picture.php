<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Employee Picture | HRIS</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" >
        <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" > 
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert2/dist/sweetalert2.min.css');?>">
        
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>" >   
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-blue.min.css');?>" >          
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?picture=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">                
    </head>    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            
            <?php
                $this->load->view('include/header');
                $this->load->view('include/aside');
            ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Employee Picture
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
                        <li>Employee</li>
                        <li>Employee Picture</li>
                    </ol>
                </section>

                <section class="content container-fluid">
                    <!-- START CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">       
                                    
                                </div>                                
                                
                                <div class="box-body">
                                    <div class="col-md-8">
                                        <img style="width: 100%" src="<?php echo base_url('media/employee/picture/') . $pictureName ?>" class="user-image " alt="Employee Picture">                                                                                                                                                                        
                                    </div>                                    
                                    <div class="col-md-4">
                                        
                                        <form method="post" action="<?= base_url('picture/upload') ?>" enctype="multipart/form-data" accept-charset="utf-8">
                                            <div class="form-group">                                            
                                                <input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?= $employeeID ?>">
                                                <input type="hidden" class="form-control" name="companyID" id="companyID" value="<?= $companyID ?>">
                                                <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?= $divisionID ?>">
                                                <input type="hidden" class="form-control" name="departmentID" id="departmentID" value="<?= $departmentID ?>">
                                            </div>                                            
                                            <div class="form-group">
                                                <label for="fileToUpload">Employee Picture</label>    
                                                <input type="file" name="fileToUpload"/>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="<?= base_url('employee/edit/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID) ?>" class="btn btn-default">Cancel</a>
                                        </form>
                                        <br />
                                        <a style="color: red">Note : File Size must less than 1MB</a>
                                    </div>
                                </div>                                
                                
                                <div class="box-footer">                                    
                                </div>
                            </div>                            
                        </div>
                    </div>                    
                </section>
            </div>                        
            
            <?php
                $this->load->view('include/footer');
            ?>

        </div>

        <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js');?>" ></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>" ></script>
        <script src="<?php echo base_url('assets/moment/min/moment.min.js');?>" ></script>
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/sweetalert2/dist/sweetalert2.min.js');?>"></script>
         
        <script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>" ></script>       
        <script>
            $(function () {                
                $('#dataTable').DataTable({
                    'paging'      : false,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true
                })                           
            })
        </script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $('.btn-delete').click(function(){
                    var id = $(this).data("id"); 
                    swal({
                        title: 'Are You Sure to Delete this Employee ?',                        
                        type: 'warning',
                        text : 'Deleted Data Cannot be Restored',
                        confirmButtonText: 'Delete',
                        showCancelButton: true,                                             
                        width:'46rem',
                        focusCancel: true
                    }).then(result => {
                        if (result.value) {
                            
                            $.ajax({
                                url : "<?php echo base_url(); ?>employee/delete/" + id,                        
                                method : "GET",                                                                                
                                success: function(data){
                                    
                                    //swal('Level Deleted','Deleted Data Cannot Be Restored','success');
                                    swal({
                                        title: 'Employee Deleted',                                          
                                        type: 'success',
                                        timer: 1000,
                                        text : 'Deleted Data Cannot be Restored',                                        
                                        width:'52rem'                                        
                                    }).then(result => {
                                        location.reload();
                                    });                                                                       
                                },
                                error : function(data){
                                    swal({
                                        title: 'Employee Cannot Deleted',                                          
                                        type: 'error',
                                        text : 'Make Sure This Employee is not Used by Other Module or Contact Your System Administator',                                        
                                        width:'52rem'                                        
                                    })
                                }
                            });
                                                        
                            
                        }                     
                    });
                });
            })
        </script>
    </body>
</html>