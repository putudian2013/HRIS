<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Employee List | HRIS</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" >
        <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" > 
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css');?>">
        
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
                        Employee List
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
                        <li>Employee List</li>
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
                                                <th>Payroll Number</th>
                                                <th>Full Name</th>                                                
                                                <th>Company</th>
                                                <th>Division</th>
                                                <th>Department</th>
                                                <th>Section</th>
                                                <th>Position</th>
                                                <th>Category</th>                                                
                                                <th>Commencing Date</th>                                                
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php
                                                $no = 0;
                                                foreach ($employee->result() as $row) :
                                                    $no++;
                                            ?>                                                                                                
                                                    <tr>
                                                        <td width="5%"><?php echo $no; ?></td>                                               
                                                        <td><?php echo $row->payroll_number; ?></td>
                                                        <td><?php echo $row->full_name; ?></td>    
                                                        <td><?php echo $row->company_name; ?></td>
                                                        <td><?php echo $row->division_name; ?></td>
                                                        <td><?php echo $row->department_name; ?></td>
                                                        <td><?php echo $row->section_name; ?></td>
                                                        <td><?php echo $row->position_name; ?></td>
                                                        <td><?php echo $row->emp_category_name; ?></td>
                                                        <td><?php echo $row->commencing_date; ?></td>                                                        
                                                        <td width="10%">                                                   
                                                            <a href="<?php echo base_url('employee/edit/') . $row->employee_id; ?>" title="Edit" class="btn btn-success"> <i class="fa fa-pencil"></i> </a>
                                                            <a href="<?php echo base_url('employee/delete/') . $row->employee_id; ?>" title="Delete" class="btn btn-danger"> <i class="fa fa-times"></i> </a>                                                    
                                                        </td>
                                                    </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
    </body>
</html>