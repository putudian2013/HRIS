<?php       
    $formAction = "";                          
    if($action == "add"){                                
        $formAction = "save";                                        
    } else if($action == "edit"){                                
        $formAction = "update";                                        
    }
?>
<?php    
    
    $employeeID = "";
    $payrollNumber = "";    
    $fullName = "";
    $primaryAddress = "";
    $secondaryAddress = "";
    $phoneNumber = "";
    $gender = "";
    $birthPlace = "";
    $birthDate = "";    
    $religionID = "";
    $maritalStatusID = "";
    $bloodType = "";
    $raceID = "";
    $nationalityID = "";
    $idCardType = "";
    $idCardNumber = "";
    $email = "";
    $companyID = "";
    $divisionID = "";
    $departmentID = "";
    $sectionID = "";
    $positionID = "";
    $commencingDate = "";  
    $bpjsKesehatanNumber = "";  
    $bpjsKesehatanJoinDate = "";  
    $bpjsKetenagakerjaanNumber = "";  
    $bpjsKetenagakerjaanJoinDate = "";  
    $taxStatusID = "";
    $empCategoryID = "";
    $levelID = "";
    $contractEndDate = "";

    if($action == "edit"){
        foreach ($employee->result() as $row) :             
            $employeeID = $row->employee_id;
            $payrollNumber = $row->payroll_number;    
            $fullName = $row->full_name;
            $primaryAddress = $row->primary_address;
            $secondaryAddress = $row->secondary_address;
            $phoneNumber = $row->phone_number;
            $gender = $row->gender;
            $birthPlace = $row->birth_place;
            $birthDate = $row->birth_date;    
            $religionID = $row->religion_id;
            $maritalStatusID = $row->marital_status_id;
            $bloodType = $row->blood_type;            
            $raceID = $row->race_id;
            $nationalityID = $row->nationality_id;
            $idCardType = $row->id_card_type;
            $idCardNumber = $row->id_card_number;
            $email = $row->email;
            $companyID = $row->company_id;
            $divisionID = $row->division_id;
            $departmentID = $row->department_id;
            $sectionID = $row->section_id;
            $positionID = $row->position_id;
            $commencingDate = $row->commencing_date;  
            $bpjsKesehatanNumber = $row->bpjs_kesehatan_number;  
            $bpjsKesehatanJoinDate = $row->bpjs_kesehatan_join_date;  
            $bpjsKetenagakerjaanNumber = $row->bpjs_ketenagakerjaan_number;  
            $bpjsKetenagakerjaanJoinDate = $row->bpjs_ketenagakerjaan_join_date;  
            $taxStatusID = $row->tax_status_id;
            $empCategoryID = $row->emp_category_id;
            $levelID = $row->level_id;
            $contractEndDate = $row->contract_end_date;
        endforeach;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Employee Editor | HRIS</title>
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
                        Employee Editor
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Employee</a></li>  
                        <li>Employee List</li>                        
                    </ol>
                </section>                 
                <section class="content container-fluid">                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <?php 
                                        if($action == "edit"){ 
                                    ?>  
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Personal Data
                                                    <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= base_url('employee/family/') . $row->employee_id . "/" . $row->company_id . "/" . $row->division_id . "/" . $row->department_id;?>"> Family Member</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="<?= base_url('employee/competency/') . $row->employee_id . "/" . $row->company_id . "/" . $row->division_id . "/" . $row->department_id;?>"> Competency</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="<?= base_url('employee/education/') . $row->employee_id . "/" . $row->company_id . "/" . $row->division_id . "/" . $row->department_id;?>"> Education</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="<?= base_url('employee/experience/') . $row->employee_id . "/" . $row->company_id . "/" . $row->division_id . "/" . $row->department_id;?>"> Experience</a></li>                                                    
                                                    <li class="divider"></li>
                                                    <li><a href="<?= base_url('employee/picture/') . $row->employee_id . "/" . $row->company_id . "/" . $row->division_id . "/" . $row->department_id;?>"> Picture</a></li>                                                    
                                                </ul>
                                            </div>                                            
                                            <div class="input-group-btn">
                                                <button style="margin-left: 5px" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Company Data
                                                    <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url('career') . "/" . $employeeID?>"> Career Path</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="<?php echo base_url('training') . "/" . $employeeID?>"> Training History</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="<?php echo base_url('warningReprimand') . "/" . $employeeID?>"> Warning & Reprimand</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="<?php echo base_url('award') . "/" . $employeeID?>"> Award</a></li>                                                    
                                                </ul>
                                            </div>
                                            
                                            <a style="margin-left: 5px" href="<?php echo base_url('employee/document/') . $row->employee_id . "/" . $row->company_id . "/" . $row->division_id . "/" . $row->department_id;?>" class="btn btn-primary"> Document</a>
                                            
                                            
                                            <a href="<?php echo base_url('level')?>" class="btn btn-danger pull-right"> Resignation</a>
                                            <a style="margin-right: 5px" href="<?php echo base_url('level')?>" class="btn btn-success pull-right"> Mutation</a>
                                        </div>
                                    
                                        
                                    <?php
                                        }
                                    ?>
                                </div>                            
                                <?php 
                                    if($action == "add"){ 
                                ?>
                                        <form action="<?php echo base_url('employee/').$formAction?>" method="post">
                                <?php
                                    }
                                ?>                                
                                    <div class="box-body">                                                                               
                                        <div class="col-md-6">
                                            <div class="box box-primary box-data">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Personal Data</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php 
                                                    if($action == "edit"){ 
                                                ?>
                                                <form action="<?php echo base_url('employee/updatePersonalData')?>" method="post">
                                                <?php
                                                    }
                                                ?>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="payrollNumber">Payroll Number</label>
                                                        <input type="text" class="form-control" name="payrollNumber" id="payrollNumber" placeholder="Example : 2018" required value="<?php echo $payrollNumber ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fullName">Full Name</label>
                                                        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Example : John Doe" required value="<?php echo $fullName ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="primaryAddress">Primary Address</label>
                                                        <input type="text" class="form-control" name="primaryAddress" id="primaryAddress" placeholder="Example : Victoria Street" required value="<?php echo $primaryAddress ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="secondaryAddress">Secondary Address</label>
                                                        <input type="text" class="form-control" name="secondaryAddress" id="secondaryAddress" placeholder="Example : Victoria Street" required value="<?php echo $secondaryAddress ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phoneNumber">Phone Number</label>
                                                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Example : +62361" required value="<?php echo $phoneNumber ?>">
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
                                                        <label>Marital Status</label>         
                                                        <select class="form-control select2" id="maritalStatus" name="maritalStatus" required>
                                                            <option value="">Select...</option>  
                                                            <?php foreach ($maritalStatus->result() as $row) : ?>                                                                                                
                                                                <option <?= $maritalStatusID == $row->marital_status_id ? "selected='selected'" : "" ?> value="<?php echo $row->marital_status_id ?>"><?php echo $row->marital_status_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Blood Type</label>         
                                                        <select class="form-control select2" id="bloodType" name="bloodType" required>
                                                            <option value="">Select...</option>
                                                            <option <?= $bloodType == "A" ? "selected" : "" ?> value="A">A</option>
                                                            <option <?= $bloodType == "B" ? "selected" : "" ?> value="B">B</option>
                                                            <option <?= $bloodType == "AB" ? "selected" : "" ?> value="AB">AB</option>
                                                            <option <?= $bloodType == "O" ? "selected" : "" ?> value="O">O</option>
                                                        </select>                                     
                                                    </div>
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Race</label>         
                                                        <select class="form-control select2" id="race" name="race" required>
                                                            <option value="">Select...</option>    
                                                            <?php foreach ($race->result() as $row) : ?>                                                                                                
                                                                <option <?= $raceID == $row->race_id ? "selected='selected'" : "" ?> value="<?php echo $row->race_id ?>"><?php echo $row->race_name ?></option>
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
                                                        <label for="idCardNumber">ID Card Number</label>  
                                                        <table border="0" width="100%">
                                                            <tr>
                                                                <td width="20%">
                                                                    <select class="form-control select2" id="idCardType" name="idCardType" required>
                                                                        <option value="">Select...</option>
                                                                        <option <?= $idCardType == "KTP" ? "selected" : "" ?> value="KTP">KTP</option>
                                                                        <option <?= $idCardType == "SIM" ? "selected" : "" ?> value="SIM">SIM</option>
                                                                        <option <?= $idCardType == "KITAS" ? "selected" : "" ?> value="KITAS">KITAS</option>
                                                                        <option <?= $idCardType == "KIPEM" ? "selected" : "" ?> value="KIPEM">KIPEM</option>
                                                                    </select>
                                                                </td>
                                                                <td width="80%"><input type="text" class="form-control" name="idCardNumber" id="idCardNumber" placeholder="Example : 5102010000000123" required value="<?php echo $idCardNumber ?>"></td>
                                                            </tr>
                                                        </table>                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Example : hris@gmail.com" required value="<?php echo $email ?>">
                                                    </div>
                                                    <div class="form-group">                                            
                                                        <input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?php echo $employeeID ?>">
                                                        <input type="hidden" class="form-control" name="companyID" id="companyID" value="<?php echo $companyID ?>">
                                                        <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?php echo $divisionID ?>">
                                                        <input type="hidden" class="form-control" name="departmentID" id="departmentID" value="<?php echo $departmentID ?>">
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <?php 
                                                        if($action == "edit") {                                                            
                                                    ?>
                                                    <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                <?php 
                                                    if($action == "edit"){ 
                                                ?>
                                                </form>
                                                <?php
                                                    }
                                                ?>                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Company Data</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php 
                                                    if($action == "edit"){ 
                                                ?>
                                                <form action="<?php echo base_url('employee/updateCompanyData')?>" method="post">
                                                <?php
                                                    }
                                                ?>
                                                <div class="box-body">                                                    
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Company</label>         
                                                        <select class="form-control select2" id="company" name="company" required>
                                                            <option value="">Select...</option>
                                                            <?php foreach ($company->result() as $row) : ?>                                                                                                
                                                                <option <?= $companyID == $row->company_id ? "selected='selected'" : "" ?> value="<?php echo $row->company_id ?>"><?php echo $row->company_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>                                                     
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Division</label>         
                                                        <select class="form-control select2" id="division" name="division" required>
                                                            <option value="">Select...</option>
                                                            <?php foreach ($division as $row) : ?>                                                                                                
                                                                <option <?= $divisionID == $row->division_id ? "selected='selected'" : "" ?> value="<?php echo $row->division_id ?>"><?php echo $row->division_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>                                                                                              
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Department</label>         
                                                        <select class="form-control select2" id="department" name="department" required>
                                                            <option value="">Select...</option> 
                                                            <?php foreach ($department as $row) : ?>                                                                                                
                                                                <option <?= $departmentID == $row->department_id ? "selected='selected'" : "" ?> value="<?php echo $row->department_id ?>"><?php echo $row->department_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>                                                                                               
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Section</label>         
                                                        <select class="form-control select2" id="section" name="section" required>
                                                            <option value="">Select...</option>     
                                                            <?php foreach ($section as $row) : ?>                                                                                                
                                                                <option <?= $sectionID == $row->section_id ? "selected='selected'" : "" ?> value="<?php echo $row->section_id ?>"><?php echo $row->section_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>                                                
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Position</label>         
                                                        <select class="form-control select2" id="position" name="position" required>
                                                            <option value="">Select...</option>    
                                                            <?php foreach ($position->result() as $row) : ?>                                                                                                
                                                                <option <?= $positionID == $row->position_id ? "selected='selected'" : "" ?> value="<?php echo $row->position_id ?>"><?php echo $row->position_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Employee Category</label>         
                                                        <select class="form-control select2" id="empCategory" name="empCategory" required>
                                                            <option value="">Select...</option>    
                                                            <?php foreach ($empCategory->result() as $row) : ?>                                                                                                
                                                                <option <?= $empCategoryID == $row->emp_category_id ? "selected='selected'" : "" ?> value="<?php echo $row->emp_category_id ?>"><?php echo $row->emp_category_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Level</label>         
                                                        <select class="form-control select2" id="level" name="level" required>
                                                            <option value="">Select...</option>    
                                                            <?php foreach ($level->result() as $row) : ?>                                                                                                
                                                                <option <?= $levelID == $row->level_id ? "selected='selected'" : "" ?> value="<?php echo $row->level_id ?>"><?php echo $row->level_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Commencing Date</label>                                           
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" id="commencingDate" name="commencingDate" value="<?php echo $commencingDate ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contract End Date</label>                                           
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" id="contractEndDate" name="contractEndDate" value="<?php echo $contractEndDate ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">                                            
                                                        <input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?php echo $employeeID ?>">
                                                        <input type="hidden" class="form-control" name="companyID" id="companyID" value="<?php echo $companyID ?>">
                                                        <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?php echo $divisionID ?>">
                                                        <input type="hidden" class="form-control" name="departmentID" id="departmentID" value="<?php echo $departmentID ?>">
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <?php 
                                                        if($action == "edit") {                                                            
                                                    ?>
                                                    <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                <?php 
                                                    if($action == "edit"){ 
                                                ?>
                                                </form>
                                                <?php
                                                    }
                                                ?> 
                                            </div>
                                            <?php 
                                                if($action == "edit"){ 
                                            ?>
                                            <form action="<?php echo base_url('employee/updateBPJSData')?>" method="post">
                                            <?php
                                                }
                                            ?>
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">BPJS Data</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="box-body">                                                    
                                                    <div class="form-group">
                                                        <label for="bpjsKesehatanNumber">BPJS Kesehatan Number</label>
                                                        <input type="text" class="form-control" name="bpjsKesehatanNumber" id="bpjsKesehatanNumber" placeholder="Example : 12345" value="<?php echo $bpjsKesehatanNumber ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>BPJS Kesehatan Join Date</label>                                           
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" id="bpjsKesehatanJoinDate" name="bpjsKesehatanJoinDate" value="<?php echo $bpjsKesehatanJoinDate ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bpjsKetenagakerjaanNumber">BPJS Ketenagakerjaan Number</label>
                                                        <input type="text" class="form-control" name="bpjsKetenagakerjaanNumber" id="bpjsKetenagakerjaanNumber" placeholder="Example : 12345" value="<?php echo $bpjsKetenagakerjaanNumber ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>BPJS Ketenagakerjaan Join Date</label>                                           
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" id="bpjsKetenagakerjaanJoinDate" name="bpjsKetenagakerjaanJoinDate" value="<?php echo $bpjsKetenagakerjaanJoinDate ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">                                            
                                                        <input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?php echo $employeeID ?>">
                                                        <input type="hidden" class="form-control" name="companyID" id="companyID" value="<?php echo $companyID ?>">
                                                        <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?php echo $divisionID ?>">
                                                        <input type="hidden" class="form-control" name="departmentID" id="departmentID" value="<?php echo $departmentID ?>">
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <?php 
                                                        if($action == "edit") {                                                            
                                                    ?>
                                                    <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                <?php 
                                                    if($action == "edit"){ 
                                                ?>
                                                </form>
                                                <?php
                                                    }
                                                ?> 
                                            </div>                                            
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Payroll Data</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php 
                                                    if($action == "edit"){ 
                                                ?>
                                                <form action="<?php echo base_url('employee/updatePayrollData')?>" method="post">
                                                <?php
                                                    }
                                                ?>
                                                <div class="box-body">                                                    
                                                    <div class="form-group" style="width: 100%;">
                                                        <label>Tax Status</label>         
                                                        <select class="form-control select2" id="taxStatus" name="taxStatus" required>
                                                            <option value="">Select...</option> 
                                                            <?php foreach ($taxStatus->result() as $row) : ?>                                                                                                
                                                                <option <?= $taxStatusID == $row->tax_status_id ? "selected='selected'" : "" ?> value="<?php echo $row->tax_status_id ?>"><?php echo $row->tax_status_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                     
                                                    </div>
                                                    <div class="form-group">                                            
                                                        <input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?php echo $employeeID ?>">
                                                        <input type="hidden" class="form-control" name="companyID" id="companyID" value="<?php echo $companyID ?>">
                                                        <input type="hidden" class="form-control" name="divisionID" id="divisionID" value="<?php echo $divisionID ?>">
                                                        <input type="hidden" class="form-control" name="departmentID" id="departmentID" value="<?php echo $departmentID ?>">
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <?php 
                                                        if($action == "edit") {                                                            
                                                    ?>
                                                    <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                <?php 
                                                    if($action == "edit"){ 
                                                ?>
                                                </form>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>                                            
                                    </div>                                                                
                                    <div class="box-footer">
                                        <?php 
                                            if($action == "add") {                                                            
                                        ?>
                                        <button type="submit" class="btn btn-primary pull-right"><?= ucwords($formAction) ?></button>
                                        <a href="<?php echo base_url('employee')?>" class="btn btn-default"> Cancel</a>
                                        <?php
                                            } else {
                                        ?>
                                        <a href="<?php echo base_url('employee')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back to Employee List</a>
                                        <?php
                                            }
                                        ?>                                        
                                    </div> 
                                <?php 
                                    if($action == "add"){ 
                                ?>
                                        </form>
                                <?php 
                                    }
                                ?>
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
        <script>            
            $(function(){
                $('#birthDate, #bpjsKesehatanJoinDate, #bpjsKetenagakerjaanJoinDate, #commencingDate, #contractEndDate').daterangepicker({                    
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#company').change(function(){
                    var id = $(this).val();   
                    $.ajax({
                        url : "<?php echo base_url(); ?>division/getDivisionByCompanyAjax/" + id,                        
                        method : "GET",                                                
                        dataType : 'json',
                        success: function(data){                            
                            var html = '<option value="">Select...</option>';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].division_id+'">'+data[i].division_name+'</option>';
                            }
                            $('#division').html(html);                            
                            $('#department').html('<option value="">Select...</option>');
                            $('#section').html('<option value="">Select...</option>');
                        },
                        error : function(data){
                            $('#division').html('<option value="">Select...</option>');                            
                            $('#department').html('<option value="">Select...</option>');
                            $('#section').html('<option value="">Select...</option>');
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#division').change(function(){
                    var id = $(this).val();   
                    $.ajax({
                        url : "<?php echo base_url(); ?>department/getDepartmentByDivisionAjax/" + id,                        
                        method : "GET",                                                
                        dataType : 'json',
                        success: function(data){                            
                            var html = '<option value="">Select...</option>';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].department_id+'">'+data[i].department_name+'</option>';
                            }
                            $('#department').html(html);                                                        
                            $('#section').html('<option value="">Select...</option>');
                        },
                        error : function(data){                                                   
                            $('#department').html('<option value="">Select...</option>');
                            $('#section').html('<option value="">Select...</option>');
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#department').change(function(){
                    var id = $(this).val();                       
                    $.ajax({
                        url : "<?php echo base_url(); ?>section/getSectionByDepartmentAjax/" + id,                        
                        method : "GET",                                                
                        dataType : 'json',
                        success: function(data){                            
                            var html = '<option value="">Select...</option>';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].section_id+'">'+data[i].section_name+'</option>';
                            }
                            $('#section').html(html);                                                                                    
                        }                        
                    });
                });
            });
        </script>
    </body>
</html>