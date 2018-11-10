<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Master Data Division | HRIS</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" >
        <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" > 
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.min.css');?>">
        
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
    <body class="hold-transition skin-blue sidebar-mini
          ">
        <div class="wrapper">
            
            <?php
                $this->load->view('include/header');
                $this->load->view('include/aside');
            ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Division Editor
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Organization</a></li>  
                        <li>Master Data</li>
                        <li>Division</li>
                    </ol>
                </section>

                <section class="content container-fluid">                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    
                                </div>
                                <?php       
                                    $formAction = "";                          
                                    if($action == "add"){                                
                                        $formAction = "save";                                        
                                    } else if($action == "edit"){                                
                                        $formAction = "update";                                        
                                    }
                                ?>
                                <form action="<?php echo base_url('division/').$formAction?>" method="post">
                                    <div class="box-body">
                                        <?php 
                                            $divisionName = "";
                                            $divisionID = "";
                                            $companyID = "";
                                            if($action == "edit"){
                                                foreach ($division->result() as $row) : 
                                                    $divisionName = $row->division_name;
                                                    $divisionID = $row->division_id;
                                                    $companyID = $row->company_id;
                                                endforeach;
                                            }
                                        ?>
                                        <div class="form-group" style="width: 100%;">
                                            <label>Company</label>         
                                            <select class="form-control select2"  id="companyID" name="companyID" required>
                                                <option value="">Select...</option>
                                                <?php foreach ($company->result() as $row) : ?>                                                                                                
                                                    <option <?= $companyID == $row->company_id ? "selected='selected'" : "" ?> value="<?php echo $row->company_id ?>"><?php echo $row->company_name ?></option>>
                                                <?php endforeach; ?>
                                            </select>                                     
                                        </div>
                                        <div class="form-group">
                                            <label for="divisionName">Division Name</label>
                                            <input type="text" class="form-control" name="divisionName" id="divisionName" placeholder="Example : Head Office" required value="<?php echo $divisionName ?>">
                                        </div>
                                        <div class="form-group">                                            
                                            <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?php echo $divisionID ?>">
                                        </div>
                                    </div>                                                                                                     
                                    <div class="box-footer">                                                                                                            
                                        <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>
                                        <a href="<?php echo base_url('division')?>" class="btn btn-default"> Cancel</a>
                                    </div> 
                                </form>
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
        <script src="<?php echo base_url('assets/select2/js/select2.full.min.js');?>"></script>
         
        <script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>" ></script>    
        <script>
            $(function () {
                $('.select2').select2()
            })
        </script>
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