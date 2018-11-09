<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Master Data Nationality | HRIS</title>
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
                        Nationality Editor
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Employee</a></li>  
                        <li>Master Data</li>
                        <li>Nationality</li>
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
                                <form action="<?php echo base_url('nationality/').$formAction?>" method="post">
                                    <div class="box-body">
                                        <?php 
                                            $nationalityName = "";
                                            $nationalityID = "";
                                            $nationalityType = "";
                                            if($action == "edit"){
                                                foreach ($nationality->result() as $row) : 
                                                    $nationalityName = $row->nationality_name;
                                                    $nationalityID = $row->nationality_id;
                                                    $nationalityType = $row->nationality_type;                                                    
                                                endforeach;
                                            }
                                        ?>                                        
                                        <div class="form-group">
                                            <label for="nationalityName">Nationality Name</label>
                                            <input type="text" class="form-control" name="nationalityName" id="nationalityName" placeholder="Example : Indonesia" required value="<?php echo $nationalityName ?>">
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label>Nationality</label>         
                                            <select class="form-control select2" id="nationalityType" name="nationalityType" required>
                                                <option value="">Select...</option>
                                                <option <?= $nationalityType == "WNI" ? "selected" : "" ?> value="WNI">Warga Negara Indonesia</option>
                                                <option <?= $nationalityType == "WNA" ? "selected" : "" ?> value="WNA">Warga Negara Asing</option>
                                            </select>                                     
                                        </div>
                                        <div class="form-group">                                            
                                            <input type="hidden" class="form-control" name="nationalityID" id="nationalityID" value="<?php echo $nationalityID ?>">
                                        </div>
                                    </div>                                                                
                                    <div class="box-footer">                                                                                                            
                                        <button type="submit" class="btn btn-primary"><?= ucwords($formAction) ?></button>
                                        <a href="<?php echo base_url('nationality')?>" class="btn btn-default"> Cancel</a>
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