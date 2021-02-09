<?php ob_start(); ?>
<?php
include_once 'functions_home.php';

$unique_url = get_school_abbreviation(get_max_school_id())."/admin/";
header("Location:$unique_url");

//insert_admin("nnamdi", "phone");
//delete_tables("st_augustine");
?>
