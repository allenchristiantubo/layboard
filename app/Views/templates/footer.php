        </div>
            <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
 
 
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url();?>/assets/js/jquery/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>



<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php if(is_array($load_js)):?>
<?php foreach($load_js as $row): ?>
<script src="<?php echo base_url(); ?>/assets/js/<?=$row;?>"></script>

<?php endforeach; ?>
<?php endif; ?>



</body>
</html>