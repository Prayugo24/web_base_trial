<footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.cafeimers.com">CimoL Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <!-- <script src="<?php echo base_url('assets/js/jquery-3.1.1.js'); ?>" type="text/javascript"></script> -->
    <!-- <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>" type="text/javascript"></script> -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('assets/validator/validator.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/js/custom.min.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>" type="text/javascript"></script> -->

    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo base_url('assets/js/bootstrap-checkbox-radio-switch.js'); ?>"></script>

    <!--  Charts Plugin -->
    <!-- <script src="<?php echo base_url('assets/js/chartist.min.js'); ?>"></script> -->

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo base_url('assets/js/light-bootstrap-dashboard.js'); ?>"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>

    <!-- Table Bootstrap -->
    <script src="<?php echo base_url('assets/js/bootstrap-table.js'); ?>"></script>

    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>


</html>
