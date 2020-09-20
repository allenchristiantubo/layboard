<div class="page-content p-5" id="content">

  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-dark bg-dark rounded-pill shadow-sm px-4 mb-4">
    <small class="text-uppercase font-weight-bold">Toggle</small>
  </button>

  <!-- Page content -->

</div>

<?php if(is_array($load_js)):?>
<?php foreach($load_js as $row): ?>
<script src="<?php echo base_url(); ?>/assets/js/<?=$row;?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<script>
$(function() {
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});

</script>