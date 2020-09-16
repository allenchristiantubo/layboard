<?php if(is_array($load_js)):?>
<?php foreach($load_js as $row): ?>
<script src="<?php echo base_url(); ?>/assets/js/<?=$row;?>"></script>
<?php endforeach; ?>
<?php endif; ?>
</body>
</html>