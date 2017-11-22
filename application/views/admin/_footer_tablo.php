<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js') ;?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ;?>
"></script>
<!-- FastClick -->
<script src="<?php echo base_url('vendors/fastclick/lib/fastclick.js') ;?>"></script>

<!-- Datatables -->
<script src="<?php echo base_url('vendors/datatables.net/js/jquery.dataTables.min.js') ;?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ;?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ;?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ;?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/js/buttons.flash.min.js') ;?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/js/buttons.html5.min.js') ;?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/js/buttons.print.min.js') ;?>"></script>

<script src="<?php echo base_url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ;?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ;?>"></script>
<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.js'); ?>"></script>
<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.buttons.js'); ?>"></script>
<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.nonblock.js'); ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('build/js/custom.js') ;?>"></script>

<?php if ($this->session->flashdata('succes_message')){ ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            new PNotify({
                title: 'Success',
                text: '<?=$this->session->flashdata('succes_message') ?>',
                type: 'success',
                styling: 'bootstrap3',
                nonblock: {nonblock: true}
            });
        });
    </script>
<?php } ?>


</body>
</html>

