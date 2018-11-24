<?php       
    $formAction = "";                          
    if($action == "add"){                                
        $formAction = "save";                                        
    } else if($action == "edit"){                                
        $formAction = "update";                                        
    }
?>
<?php    

    $familyID = "";
    $employeeID = "";    
    $fullName = "";
    $idCardNumber = "";
    $gender = "";
    $birthPlace = "";
    $birthDate = "";
    $religionID = "";
    $educationID = "";
    $maritalStatusID = "";
    $relationshipID = "";
    $nationalityID = "";   
    $address = "";
    $phoneNumber = "";        

    if($action == "edit"){
        foreach ($family->result() as $row) :             
            $familyID = $row->emp_family_id;
            $employeeID = $row->employee_id;              
            $fullName = $row->full_name;
            $idCardNumber = $row->id_card_number;
            $gender = $row->gender;
            $birthPlace = $row->birth_place;    
            $birthDate = $row->birth_date;    
            $religionID = $row->religion_id;         
            $educationID = $row->education_id;         
            $maritalStatusID = $row->marital_status_id;         
            $relationshipID = $row->relationship_id;         
            $nationalityID = $row->nationality_id;    
            $address = $row->address;
            $phoneNumber = $row->phone_number;            
        endforeach;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Family Member Editor | HRIS</title>
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
                        Employee Family Editor
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
                        <li>Employee</li>
                        <li>Employee Family</li>
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
                                <form action="<?php echo base_url('family/').$formAction?>" method="post">
                                    <div class="box-body">                                                                                                                                                               
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Example : John Doe" required value="<?php echo $fullName ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="idCardNumber">ID Card Number</label>
                                            <input type="text" class="form-control" name="idCardNumber" id="idCardNumber" placeholder="Example : 5102" required value="<?php echo $idCardNumber ?>">
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label>Gender</label>         
                                            <select class="form-control select2" id="gender" name="gender" required>
                                                <option value="">Select...</option>
                                                <option <?= $gender == "0" ? "selected" : "" ?> value="0">Male</option>
                                                <option <?= $gender == "1" ? "selected" : "" ?> value="1">Female</option>
                                            </select>                                     
                                        </div>
                                        <div class="form-group">
                                            <label for="birthPlace">Birth Place</label>
                                            <input type="text" class="form-control" name="birthPlace" id="birthPlace" placeholder="Example : Indonesia" required value="<?php echo $birthPlace ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Birth Date</label>                                           
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="birthDate" name="birthDate" value="<?= $birthDate ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Religion</label>         
                                            <select class="form-control select2" id="religion" name="religion" required>
                                                <option value="">Select...</option> 
                                                <?php foreach ($religion->result() as $row) : ?>                                                                                                
                                                    <option <?= $religionID == $row->religion_id ? "selected='selected'" : "" ?> value="<?php echo $row->religion_id ?>"><?php echo $row->religion_name ?></option>
                                                <?php endforeach; ?>
                                            </select>                                     
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label>Education Level</label>         
                                            <select class="form-control select2" id="educationLevel" name="education" required>
                                                <option value="">Select...</option>  
                                                <?php foreach ($education->result() as $row) : ?>                                                                                                
                                                    <option <?= $educationID == $row->education_id ? "selected='selected'" : "" ?> value="<?php echo $row->education_id ?>"><?php echo $row->education_level ?></option>
                                                <?php endforeach; ?>
                                            </select>                                     
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label>Marital Status</label>         
                                            <select class="form-control select2" id="maritalStatus" name="maritalStatus" required>
                                                <option value="">Select...</option>  
                                                <?php foreach ($maritalStatus->result() as $row) : ?>                                                                                                
                                                    <option <?= $maritalStatusID == $row->marital_status_id ? "selected='selected'" : "" ?> value="<?php echo $row->marital_status_id ?>"><?php echo $row->marital_status_name ?></option>
                                                <?php endforeach; ?>
                                            </select>                                     
                                        </div>
                                        <div class="form-group">
                                            <label>Relationship</label>         
                                            <select class="form-control select2" id="relationship" name="relationship" required>
                                                <option value="">Select...</option> 
                                                <?php foreach ($relationship->result() as $row) : ?>                                                                                                
                                                    <option <?= $relationshipID == $row->relationship_id ? "selected='selected'" : "" ?> value="<?php echo $row->relationship_id ?>"><?php echo $row->relationship_name ?></option>
                                                <?php endforeach; ?>
                                            </select>                                     
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label>Nationality</label>         
                                            <select class="form-control select2" id="race" name="nationality" required>
                                                <option value="">Select...</option>   
                                                <?php foreach ($nationality->result() as $row) : ?>                                                                                                
                                                    <option <?= $nationalityID == $row->nationality_id ? "selected='selected'" : "" ?> value="<?php echo $row->nationality_id ?>"><?php echo $row->nationality_name ?></option>
                                                <?php endforeach; ?>
                                            </select>                                     
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Example : Victoria Street" required value="<?= $address ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Example : +62361" required value="<?= $phoneNumber ?>">
                                        </div>
                                        <div class="form-group">                                            
                                            <input type="hidden" class="form-control" name="familyID" id="familyID" value="<?= $familyID ?>">                                            
                                            <input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?= $employee ?>">
                                            <input type="hidden" class="form-control" name="companyID" id="companyID" value="<?= $companyID ?>">
                                            <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?= $divisionID ?>">
                                            <input type="hidden" class="form-control" name="departmentID" id="departmentID" value="<?= $departmentID ?>">
                                        </div>
                                    </div>                                                                
                                    <div class="box-footer">                                                                                                            
                                        <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>
                                        <a href="<?= base_url('employee/family/' . $employeeID . '/' . $companyID . '/' . $divisionID  . '/' . $departmentID)?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back to Family List</a>
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
                $('#birthDate').daterangepicker({                    
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
    </body>
</html>