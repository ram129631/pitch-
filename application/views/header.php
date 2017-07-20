<!DOCTYPE html>
<!--[if lt IE 7]>   <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>      <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>      <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>      <html class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    
    <title><?=$Title;?></title>
    <meta name="description" content="" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link href="<?=base_url();?>resources/css/cssBundle.css" rel="stylesheet" />
    <!--link href="https://www.aimstesting.org/css/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet" / -->
	<link href="<?=base_url();?>resources/css/intro.css" rel="stylesheet" />
    <script src="<?=base_url();?>resources/js/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript">
    	var strBaseURL = "<?=base_url();?>";
        var arrAvailableLevels = <?=json_encode($this->config->item('AvailableLevels'));?>
    </script>    
</head>
<body>