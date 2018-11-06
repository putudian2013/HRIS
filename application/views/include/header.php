<header class="main-header">
    <a href="index.php" class="logo">
        <span class="logo-mini">HRIS</span>                    
        <span class="logo-lg">HR System</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">                                                                                                                
                <li class="user user-menu">                               
                    <a>
                        <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?></span>                        
                    </a>
                </li>                            
                <li class="user user-menu">                               
                    <a href="<?php echo base_url('') ?>">                        
                        <span class="hidden-xs"><i class="fa fa-sign-out"></i>Logout</span>                    
                    </a>
                </li>                            
            </ul>
        </div>
    </nav>
</header>  
