<!-- footer area start-->
<footer>
    <div class="footer-area">
        <p>© Copyright 2020. All right reserved. Template by : rifalnurchya kasep </a>.</p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->
<div class="offset-area">
    <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
        <li><a data-toggle="tab" href="#settings">Settings</a></li>
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
            <div class="recent-activity">
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
            </div>
        </div>
        <div id="settings" class="tab-pane fade">
            <div class="offset-settings">
                <h4>General Settings</h4>
                <div class="settings-list">
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch1" />
                                <label for="switch1">Toggle</label>
                            </div>
                        </div>
                        <p>Keep it 'On' When you want to get all the notification.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show recent activity</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch2" />
                                <label for="switch2">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show your emails</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch3" />
                                <label for="switch3">Toggle</label>
                            </div>
                        </div>
                        <p>Show email so that easily find you.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show Task statistics</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch4" />
                                <label for="switch4">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch5" />
                                <label for="switch5">Toggle</label>
                            </div>
                        </div>
                        <p>Use checkboxes when looking for yes or no answers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offset area end -->
<!-- jquery latest version -->
<script src="<?= base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap-select.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/js/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.slicknav.min.js"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="<?= base_url(); ?>assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="<?= base_url(); ?>assets/js/pie-chart.js"></script>
<!-- others plugins -->
<script src="<?= base_url(); ?>assets/js/plugins.js"></script>
<script src="<?= base_url(); ?>assets/js/scripts.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    
    $('select').selectpicker();

    $('#language_name').change(function(){
        $('#hide_lang').val($('#language_name').val());
    });
    
    $('#release_date').datepicker({
         format: "d MM yyyy"
       });
    
    $('.up_language').change(function(){
        $('$up_lang').val($('#up_language').val());
    });

    
    
    

    $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
    $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass('selected').html(fileName);
    });

$('.form-check-input').on('click', function(){

const menuId = $(this).data('menu');
const roleId = $(this).data('role');

$.ajax({
    url : "<?= base_url('admin/changeAccess');?>",
    type : 'post',
    data : {
        menuId : menuId,
        roleId : roleId
    },

    success: function(){
        document.location.href = "<?= base_url('admin/role_access/'); ?>" + roleId;
    }
});


});


});




</script>

</body>

</html>