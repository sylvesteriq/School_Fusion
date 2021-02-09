<?php ob_start() ;?>
<?php include_once 'includes/database.php';  ?>
<?php require_once 'admin/includes/functions.php';  ?>
<?php if(!isset($_SESSION['school_id'])){
    session_set_cookie_params(0, getcwd());
    session_start();
    $_SESSION['school_id'] = get_school_id();
    
    //get school details for use across site
    
    $details = get_school_details($_SESSION['school_id']);
    $_SESSION['school_name'] = $details['school_full_name'];
    $_SESSION['school_abbr'] = $details['school_abbreviation'];
    $_SESSION['school_logo_name'] = $details['school_logo_name'];
    $_SESSION['school_address'] = $details['school_address'];
    $_SESSION['school_phone'] = $details['school_phone'];
    
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>