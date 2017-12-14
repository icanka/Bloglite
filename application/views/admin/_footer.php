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
<script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<!-- FastClick -->
<script src="<?php echo base_url('vendors/fastclick/lib/fastclick.js'); ?>"></script>

<!-- NProgress -->
<script src="<?php echo base_url('vendors/nprogress/nprogress.js'); ?>"></script>

<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.js'); ?>"></script>
<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.buttons.js'); ?>"></script>
<script src="<?php echo base_url('vendors/pnotify/dist/pnotify.nonblock.js'); ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('build/js/custom.js'); ?>"></script>

<script src="<?php echo base_url('src/js/fullscreen.js'); ?>"></script>

<?php if ($this->session->flashdata('succes_message')){ ?>
    <script>notification_Pnotify('<?=$this->session->flashdata('succes_message')?>');</script>
<?php } ?>


</body>
</html>