<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layboard</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/images/LayboardLogoBoard.png">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <?php if(is_array($load_css)):?>
    <?php foreach($load_css as $row): ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/<?=$row;?>">
    <?php endforeach; ?>
    <?php endif; ?>
    <script> var baseURL = "<?php echo base_url();?>";</script>
    
</head>
<body class="bg-main">