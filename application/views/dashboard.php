<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard | HRIS</title>
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
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            
            <?php
                $this->load->view('include/header');
                $this->load->view('include/aside');
            ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>                                                
                    </ol>
                </section>

                <section class="content container-fluid">
                    <!-- START CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">       
                                    <b>EXPIRED EMPLOYEE CONTRACT REMINDER</b>
                                </div>                                
                                
                                <div class="box-body">                                                                        
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>                                
                                            <div class="info-box-content">                                    
                                                <span class="info-box-text"> Today</span>                                                
                                                <span class="info-box-number"><?= $endContractToday->num_rows() ?></span>
                                                <div class="pull-right">
                                                    <a href="#" class="btn btn-success btn-sm" id="endContractToday" data-toggle="modal" data-target="#dueToday" title="View Task Due Today"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>                                      
                                        </div>                                                                                    
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>                                
                                            <div class="info-box-content">                                    
                                                <span class="info-box-text"> This Month</span>
                                                <span class="info-box-number"><?= $endContractThisMonth->num_rows() ?></span>
                                                <div class="pull-right">
                                                    <a href="#" class="btn btn-success btn-sm" id="endContractThisMonth" data-toggle="modal" data-target="#dueToday" title="View Task Due Today"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>                                      
                                        </div>                                                                                    
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>                                
                                            <div class="info-box-content">                                    
                                                <span class="info-box-text"> Next 3 Months</span>
                                                <span class="info-box-number"><?= $endContractNextThreeMonths->num_rows() ?></span>
                                                <div class="pull-right">
                                                    <a href="#" class="btn btn-success btn-sm" id="endContractNextThreeMonths" data-toggle="modal" data-target="#dueToday" title="View Task Due Today"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>                                      
                                        </div>                                                                                    
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-exclamation"></i></span>                                
                                            <div class="info-box-content">                                    
                                                <span class="info-box-text"> Outstanding </span>
                                                <span class="info-box-number"><?= $endContractOutstanding->num_rows() ?></span>
                                                <div class="pull-right">
                                                    <a href="#" class="btn btn-success btn-sm" id="endContractOutstanding" data-toggle="modal" data-target="#dueToday" title="View Task Due Today"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>                                      
                                        </div>                                                                                    
                                    </div>
                                </div>                                
                                
                                <div class="box-footer">                                                                        
                                    
                                </div>                                 
                            </div>                            
                        </div>
                        
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">       
                                    
                                </div>                                
                                
                                <div class="box-body">                                                                        
                                    <center>WELCOME</center>
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
        
        <div class="modal fade" id="modalReminderContract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>                        
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>                            
                    </div>                        
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js');?>" ></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>" ></script>
        <script src="<?php echo base_url('assets/moment/min/moment.min.js');?>" ></script>
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js');?>"></script>
         
        <script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>" ></script>  
        <script>                       
            $("#endContractToday").click(function(){               
                
                $("#modalReminderContract").modal();   
                $(".modal-title").html("Today Expired Employee Contract");   
                
                $.post("<?= base_url('reminder/employeeContract') ?>",
                {
                    method: 'today'
                },
                function(data){
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
                    $(".modal-body").html(data);
                });
            }); 
            $("#endContractThisMonth").click(function(){               
                
                $("#modalReminderContract").modal();   
                $(".modal-title").html("This Month Expired Employee Contract");   
                
                $.post("<?= base_url('reminder/employeeContract') ?>",                
                {
                    method: 'thisMonth'
                },
                function(data){        
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
                    $(".modal-body").html(data);  
                });
            }); 
            $("#endContractNextThreeMonths").click(function(){               
                
                $("#modalReminderContract").modal();          
                $(".modal-title").html("Expired Employee Contract in Next 3 Months");   
                
                $.post("<?= base_url('reminder/employeeContract') ?>",
                {
                    method: '3Months'
                },
                function(data){
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
                    $(".modal-body").html(data);
                });
            }); 
            $("#endContractOutstanding").click(function(){               
                
                $("#modalReminderContract").modal();      
                $(".modal-title").html("Outstanding Expired Employee Contract");  
                
                $.post("<?= base_url('reminder/employeeContract') ?>",
                {
                    method: 'outstanding'            
                },
                function(data){
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
                    $(".modal-body").html(data);
                });
            }); 
            
        </script>
    </body>
</html>