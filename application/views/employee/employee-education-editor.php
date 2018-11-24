<?php       
    $formAction = "";                          
    if($action == "add"){                                
        $formAction = "save";                                        
    } else if($action == "edit"){                                
        $formAction = "update";                                        
    }
?>
<?php           
    
    $educationID = "";
    $almaMater = "";
    $department = "";
    $yearStart = "";
    $yearEnd = "";    
    $employeeEducationID = "";
    
    if($action == "edit"){
        foreach ($employeeEducation->result() as $row) :             
            $educationID = $row->education_id;
            $almaMater = $row->alma_mater;
            $department = $row->department;
            $yearStart = $row->year_start;
            $yearEnd = $row->year_end;            
            $employeeEducationID = $row->emp_education_id;
        endforeach;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Employee Education Editor | HRIS</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" >
        <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" > 
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.css');?>">        
        
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
                        Employee Competency Editor
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
                        <li>Employee</li>
                        <li>Employee Competency</li>
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
                                <form action="<?php echo base_url('employeeEducation/').$formAction?>" method="post">
                                    <div class="box-body">                                                                                                                                                               
                                        <div class="form-group">
                                            <label>Education Level</label>         
                                            <select class="form-control select2" id="education" name="education" required>
                                                <option value="">Select...</option> 
                                                <?php foreach ($education->result() as $row) : ?>                                                                                                
                                                    <option <?= $educationID == $row->education_id ? "selected='selected'" : "" ?> value="<?php echo $row->education_id ?>"><?php echo $row->education_level ?></option>
                                                <?php endforeach; ?>
                                            </select>                                     
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="almaMater">Alma Mater</label>
                                            <input type="text" class="form-control" name="almaMater" id="almaMater" placeholder="Example : Universitas Indonesia" required value="<?php echo $almaMater ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control" name="department" id="department" placeholder="Example : Jurusan Ilmu Manajemen" required value="<?php echo $department ?>">
                                        </div>                                                                               
                                        <div class="form-group">
                                            <label>Year Start</label>
                                            <select class="form-control select2" id="yearStart" name="yearStart" required>
                                                <option value="">Select...</option> 
                                                <?php for($i = (int)date("Y"); $i >= 1950; $i-- ) { ?>
                                                    <option <?= $yearStart == $i ? "selected='selected'" : "" ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php } ?>
                                            </select>                                                                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Year End</label>
                                            <select class="form-control select2" id="yearEnd" name="yearEnd" required>
                                                <option value="">Select...</option> 
                                                <?php for($i = (int)date("Y"); $i >= 1950; $i-- ) { ?>
                                                    <option <?= $yearEnd == $i ? "selected='selected'" : "" ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php } ?>
                                            </select>                                                                                          
                                        </div>                                                                               
                                        <div class="form-group">                                            
                                            <input type="hidden" class="form-control" name="employeeEducationID" id="employeeEducationID" value="<?= $employeeEducationID ?>">                                            
                                            <input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?= $employeeID ?>">
                                            <input type="hidden" class="form-control" name="companyID" id="companyID" value="<?= $companyID ?>">
                                            <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?= $divisionID ?>">
                                            <input type="hidden" class="form-control" name="departmentID" id="departmentID" value="<?= $departmentID ?>">
                                        </div>
                                    </div>                                                                
                                    <div class="box-footer">                                                                                                            
                                        <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>
                                        <a href="<?= base_url('employee/education/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID)?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back to Employee Competency List</a>
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
        <script src="<?php echo base_url('assets/moment/min/moment.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js');?>"></script>  
         
        <script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>" ></script>   
        <script>
            $(function () {
                $('.select2').select2()
            })
        </script>
        <script>
            $(function(){
                $('#issuedDate').daterangepicker({                    
                    singleDatePicker: true,                                                
                    showDropdowns : true,
                    drops : "down",
                    opens : 'right',                    
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                })
                $('#yearStart').daterangepicker({                    
                    singleDatePicker: true,                                                
                    showDropdowns : true,
                    drops : "down",
                    opens : 'right',                    
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                }) 
                $('#yearEnd').daterangepicker({                    
                    singleDatePicker: true,                                                
                    showDropdowns : true,
                    drops : "down",
                    opens : 'right',                    
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                }) 
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#competencyArea').change(function(){
                    var id = $(this).val();                                           
                    $.ajax({
                        url : "<?php echo base_url(); ?>competency/getCompetencyByAreaAjax/" + id,                              
                        method : "GET",                                                
                        dataType : 'json',
                        success: function(data){                                      
                            var html = '<option value="">Select...</option>';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].competency_id+'">'+data[i].competency_name+'</option>';                                
                            }                            
                            $('#competency').html(html);                                                        
                        }
                        
                    });
                });
            });
        </script>        
    </body>
</html>