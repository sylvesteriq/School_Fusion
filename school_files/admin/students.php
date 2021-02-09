<?php include_once 'includes/admin_header.php'; ?>
    <div id="wrapper">

        <!-- Navigation -->
<?php include_once 'includes/admin_navigation.php';  ?>
        
        
        
        
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                
                <?php 
                    if($_GET['source']){
                        $source = clean_input($_GET['source']);
                        switch ($source){
                            case "":
                                include_once 'add_student.php';;
                            default :
                                
                        }
                
                    include_once 'includes/add_student.php'; 
                    
                    }
                    
                    
                    ?>
                
                
            </div>
            <!-- /.container-fluid -->

            
            
<?php include_once 'includes/admin_footer.php'; ?>