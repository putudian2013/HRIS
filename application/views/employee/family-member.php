<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Employee Family | HRIS</title>
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">                
    </head>    
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">
            
            <?php
                $this->load->view('include/header');
                $this->load->view('include/aside');
            ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Employee Family
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
                        <li>Employee</li>
                        <li>Employee Family</li>
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
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>                                                                                                
                                                <th>Full Name</th>
                                                <th>ID Card Number</th>
                                                <th>Gender</th>
                                                <th>Birth Place</th>
                                                <th>Birth Date</th>
                                                <th>Religion</th>
                                                <th>Education Level</th>                                                
                                                <th>Marital Status</th>                                                
                                                <th>Relationship</th>
                                                <th>Nationality</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>                                                
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php
                                                $no = 0;
                                                foreach ($family->result() as $row) :
                                                    $no++;
                                            ?>                                                                                                
                                                    <tr>
                                                        <td width="5%"><?php echo $no; ?></td>                                               
                                                        <td><?php echo $row->full_name; ?></td>        
                                                        <td><?php echo $row->id_card_number; ?></td>        
                                                        <td><?php echo $row->gender; ?></td>        
                                                        <td><?php echo $row->birth_place; ?></td>
                                                        <td><?php echo $row->birth_date; ?></td>
                                                        <td><?php echo $row->religion_name; ?></td>
                                                        <td><?php echo $row->education_level; ?></td>
                                                        <td><?php echo $row->marital_status_name; ?></td>                                                        
                                                        <td><?php echo $row->relationship_name; ?></td>
                                                        <td><?php echo $row->nationality_name; ?></td>                                                                                                            
                                                        <td><?php echo $row->address; ?></td>
                                                        <td><?php echo $row->phone_number; ?></td>                                                        
                                                        <td>                                                   
                                                            <a href="<?php echo base_url('family/edit/') . $row->emp_family_id . '/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID ; ?>" title="Edit" class="btn btn-success"> <i class="fa fa-pencil"></i> </a>
                                                            <a data-id="<?= $row->emp_family_id; ?>" title="Delete" class="btn btn-danger btn-delete"> <i class="fa fa-times"></i> </a>
                                                        </td>
                                                    </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>                                
                                
                                <div class="box-footer"> 
                                    <a href="<?= base_url('employee/edit/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID)?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back to Personal Data</a>
                                    <a href="<?= base_url('family/add/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID) ?>" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> Add New Employee Family</a>
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
                    'autoWidth'   : true,
                    scrollX: true
                })                           
            })
        </script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $('.btn-delete').click(function(){
                    var id = $(this).data("id"); 
                    swal({
                        title: 'Are You Sure to Delete this Family Member ?',                        
                        type: 'warning',
                        text : 'Deleted Data Cannot be Restored',
                        confirmButtonText: 'Delete',
                        showCancelButton: true,                                             
                        width:'46rem',
                        focusCancel: true
                    }).then(result => {
                        if (result.value) {
                            
                            $.ajax({
                                url : "<?php echo base_url(); ?>family/delete/" + id,                        
                                method : "GET",                                                                                
                                success: function(data){
                                    
                                    //swal('Level Deleted','Deleted Data Cannot Be Restored','success');
                                    swal({
                                        title: 'Family Member Deleted',                                          
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
                                        title: 'Family Member Cannot Deleted',                                          
                                        type: 'error',
                                        text : 'Make Sure This Family Member is not Used by Other Module or Contact Your System Administator',                                        
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