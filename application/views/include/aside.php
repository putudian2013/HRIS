<?php $segment = $this->uri->segment(1); ?>

<aside class="main-sidebar">
    <section class="sidebar">                                       
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><center>System Menu</center></li>
            
        <li class="<?php echo $segment == 'dashboard' ? 'active' : '' ?>"><a href="<?php echo base_url('dashboard') ?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview <?php echo $segment == 'employee' || $segment == 'employeeCategory' || $segment == 'level' || $segment == 'religion'  || $segment == 'maritalStatus'   ? 'active' : '' ?>">
            <a href="#"><i class="fa fa-users"></i> <span>Employee</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $segment == 'employee' || $segment == 'level'  || $segment == 'religion'  || $segment == 'maritalStatus' ? 'active' : '' ?>"><a href="<?php echo base_url('employee') ?>"> <i class="fa fa-circle-o"></i> <span>Employee List</span></a></li>
                <li class="treeview <?php echo $segment == 'employeeCategory' || $segment == 'level' || $segment == 'religion'  || $segment == 'maritalStatus' ? 'active' : '' ?>">
                    <a href="#"><i class="fa fa-list"></i> <span>Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo $segment == 'employeeCategory' ? 'active' : '' ?>"><a href="<?php echo base_url('employeeCategory') ?>"> <i class="fa fa-circle-o"></i> <span>Employee Category</span></a></li>                                   
                        <li class="<?php echo $segment == 'level' ? 'active' : '' ?>"><a href="<?php echo base_url('level') ?>"> <i class="fa fa-circle-o"></i> <span>Level</span></a></li>
                        <li class="<?php echo $segment == 'religion' ? 'active' : '' ?>"><a href="<?php echo base_url('religion') ?>"> <i class="fa fa-circle-o"></i> <span>Religion</span></a></li>
                        <li class="<?php echo $segment == 'maritalStatus' ? 'active' : '' ?>"><a href="<?php echo base_url('maritalStatus') ?>"> <i class="fa fa-circle-o"></i> <span>Marital Status</span></a></li>
                    </ul>
                </li>                
            </ul>
        </li>
        
        <li class="treeview <?php echo $segment == 'company' || $segment == 'division' || $segment == 'department' || $segment == 'section' || $segment == 'position' ? 'active' : '' ?>">
            <a href="#"><i class="fa fa-sitemap"></i> <span>Organization</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview <?php echo $segment == 'company' || $segment == 'division' || $segment == 'department' || $segment == 'section' || $segment == 'position'  ? 'active' : '' ?>">
                    <a href="#"><i class="fa fa-list"></i> <span>Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu active">
                        <li class="<?php echo $segment == 'company' ? 'active' : '' ?>"><a href="<?php echo base_url('company') ?>"> <i class="fa fa-circle-o"></i> <span>Company</span></a></li>           
                        <li class="<?php echo $segment == 'division' ? 'active' : '' ?>"><a href="<?php echo base_url('division') ?>"> <i class="fa fa-circle-o"></i> <span>Division</span></a></li>            
                        <li class="<?php echo $segment == 'department' ? 'active' : '' ?>"><a href="<?php echo base_url('department') ?>"> <i class="fa fa-circle-o"></i> <span>Department</span></a></li>
                        <li class="<?php echo $segment == 'section' ? 'active' : '' ?>"><a href="<?php echo base_url('section') ?>"> <i class="fa fa-circle-o"></i> <span>Section</span></a></li>
                        <li class="<?php echo $segment == 'position' ? 'active' : '' ?>"><a href="<?php echo base_url('position') ?>"> <i class="fa fa-circle-o"></i> <span>Position</span></a></li>
                    </ul>
                </li>                
            </ul>
        </li>
        
        <li class="treeview <?php echo $segment == 'taxStatus' ? 'active' : '' ?>">
            <a href="#"><i class="fa fa-dollar"></i> <span>Payroll</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview <?php echo $segment == 'taxStatus'  ? 'active' : '' ?>">
                    <a href="#"><i class="fa fa-list"></i> <span>Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu active">
                        <li class="<?php echo $segment == 'taxStatus' ? 'active' : '' ?>"><a href="<?php echo base_url('taxStatus') ?>"> <i class="fa fa-circle-o"></i> <span>Tax Status</span></a></li>                                   
                    </ul>
                </li>                
            </ul>
        </li>                              
            
        </ul>
    </section>
</aside>