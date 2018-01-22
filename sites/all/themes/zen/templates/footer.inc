<footer class="footer_full">
    <div class="pw_container">
        <div class="pw_row">
            <div class="pw_grid md9">
                <div class="pw_row">
            <?php
            $FmenuTree = menu_tree_all_data('menu-footer-menu');
            $options = array('absolute' => TRUE);


            if (count($FmenuTree)) {
                $fmenu = '  <div class="pw_grid md3 xs6 nav_group">
                        <ul class="pw_nav foot_nav">';
                $i = 1;
                foreach ($FmenuTree as $link) {
                    if ($link['link']['hidden'] == 0) {

                        $url = url($link['link']['link_path'], $options);
                        if (trim($link['link']['title']) == 'Institutes' || trim($link['link']['title']) == 'Departments') {
                            $fmenu .= '</ul></div><div class="pw_grid md3 xs6 nav_group"><ul class="pw_nav foot_nav"><li class="nav_head">' . $link['link']['title'];
                        } else {
                            $fmenu .= '<li class="nav_head"><a href="' . $url . '">' . $link['link']['title'] . ' </a>';
                        }

                        if (count($link['below'])) {

                            if (count($link['below'])) $cll = "abouttab"; else $cll = '';

                            $p = 0;

                            foreach ($link['below'] as $childs) {
                                $p++;
                                if (count($childs['below'])) $cl = "arrow"; else $cl = "";
                                if ($childs['link']['hidden'] == 0) {
                                    //echo $childs['link']['title']."<br>";
                                    if ($childs['link']['title'] == "Development" || $childs['link']['title'] == "Management Services") {
                                        $url = "";
                                    } else {
                                        $url = url($childs['link']['link_path'], $options);
                                    }
                                    if ($childs['link']['title'] == "Development" || $childs['link']['title'] == "Management Services") {
                                        $fmenu .= '  <li class="' . $cl . ' dev-no"> ' . $childs['link']['title'] . '';
                                    } else {

                                        $fmenu .= '  <li class="' . $cl . '"><a href="' . $url . '"> ' . $childs['link']['title'] . '</a>';
                                        if (trim($childs['link']['title']) == 'Laboratory Medicine') {
                                            $fmenu .= ' </ul>
                    </div>
                    <div class="pw_grid md3 xs6">
                        <ul class="pw_nav foot_nav">
                            <li class="nav_head hide_xs"> &nbsp;</li>';
                                        }
                                    }
                                    if (count($childs['below'])) {

                                        $fmenu .= '<ul class="pw_nav nav_items"> ';
                                        foreach ($childs['below'] as $subchilds) {
                                            if ($subchilds['link']['hidden'] == 0) {
                                                if (count($subchilds['below'])) $clt = "arrow"; else $clt = '';
                                                if ($subchilds['link']['title'] == "Residential" || $subchilds['link']['title'] == "Commercial & Retail" || $subchilds['link']['title'] == "Industrial" || $subchilds['link']['title'] == "Completed Projects") {
                                                    $url = "javascript:void(0);";
                                                } else {
                                                    $url = url($subchilds['link']['link_path'], $options);
                                                }
                                                if ($subchilds['link']['title'] == "Residential" || $subchilds['link']['title'] == "Commercial & Retail" || $subchilds['link']['title'] == "Industrial" || $subchilds['link']['title'] == "Completed Projects") {
                                                    $fmenu .= '<li class="' . $clt . '"><a>' . $subchilds['link']['title'] . '</a>';
                                                } else {
                                                    $fmenu .= '<li class="' . $clt . '"><a href="' . $url . '">' . trim($subchilds['link']['title']) . '</a>';

                                                }

                                                if ($subchilds['below']) {
                                                    if ($subchilds['link']['title'] == 'Industrial') $nwcl = 'indus'; else $nwcl = '';
                                                    $fmenu .= '<ul class="' . $nwcl . '"> ';
                                                    foreach ($subchilds['below'] as $subchildsbl) {//echo $subchilds['link']['title']."<br>";$childs['link']['link_path'];
                                                        if ($subchildsbl['link']['hidden'] == 0) {
                                                            $url = url($subchildsbl['link']['link_path'], $options);


                                                            $fmenu .= '<li><a href="' . $url . '">' . $subchildsbl['link']['title'] . '</a></li>';


                                                        }
                                                    }

                                                    $fmenu .= '</ul></li>';
                                                }
                                            }
                                        }
                                        $fmenu .= '</ul>';
                                    }
                                    $fmenu .= '</li>';
                                }
                            }
                            $fmenu .= '</ul>';

                        }
                        $fmenu .= '</li>';
                        $i++;
                    }
                }
                $fmenu .= '</ul>';

                $fmenu .= '</div>';
            }

            //print the menu
            print $fmenu;
            ?>
                </div>
            </div>

            <div class="pw_grid md3">
                <div class="enquiry_form">
                    <div class="title sm">Quick Enquiry</div>
                    <?php $quick_enq_form = node_view(node_load(145), 'full', NULL); print render($quick_enq_form); ?>

                </div>
            </div>
        </div>
        <div class="copyright">
            &copy; Copyright <?php echo date('Y'); ?> <span></span>Jaypee Hospital. <br>All Rights Reserved<br>
            <a href="#">Privacy Policy</a>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p><?php $get_quote_form = node_view(node_load(410), 'full', NULL); print render($get_quote_form); ?></p>
        </div>

    </div>
</footer>

<script src="<?php print $theme_path; ?>/js/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php print $theme_path; ?>/js/owl.carousel.min.js"></script>
<script src="<?php print $theme_path; ?>/js/pw.js"></script>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    var sndEnq = document.getElementById("sndEnq");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
    sndEnq.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<script>
    $(document).ready(function () {




        var paf = $("#paf").val();
        $("#edit-submitted-position-applied-for").val(paf);
        $("#department").hide();
        $("#clinic").hide();
        $("#clinics").hide();
        $("#dept").hide();
        $('.contact_form .form-item input').each(function() {
            $(this).removeClass('pw_form').addClass('pw_form lg');
        });

        $(".tab_slider").owlCarousel({
            margin: 10,
            items: 6,
            nav: true,
            dots: false,
            autoWidth: true
        });
        $(".package_slider").owlCarousel({
            margin: 40,
            items: 3,
            nav: true,
            dots: false,
            mouseDrag: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                580: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });

        $(".magzine_owl").owlCarousel({
            margin: 0,
            items: 1,
            nav: false,
            dots: true,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            smartSpeed: 1000,
            mouseDrag: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                580: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });

        $(".main_slider").owlCarousel({
            margin:0,
            items:1,
            nav: false,
            dots:true,
            loop: true,
            animateOut: 'fadeOut',
            autoplay: true,
            mouseDrag:false
        });

        $("#case_study_slider").owlCarousel({
            margin:80,
            items:2,
            nav:true,
            dots:false,
            responsiveClass: true,
            responsive: {
                0: {
                    items:1,
                    margin:20
                },
                992: {
                    items: 2
                }
            }
        });

        $(".facts_scroller").owlCarousel({
            margin:20,
            items:3,
            nav:true,
            dots:false,
            mouseDrag:false,
            responsiveClass: true,
            responsive: {
                0: {
                    items:1
                },
                580: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
        //Faq section
        $(".faq_list").on("click", "li", function () {
            if ($(this).hasClass("active")) {
                return false;
            } else {
                $(".faq_list li").removeClass("active");
                $(".faq_data").slideUp(300);
                $(this).addClass("active");
                $(this).find(".faq_data").slideDown(300);
            }
        });
    });
    var tabSlider = $(".tab_item");
    tabSlider.click(function(e){
        e.preventDefault();
        var tabData = $(this).attr("href");
        tabSlider.removeClass("active");
        $(this).addClass("active");
        var ajax_url = '<?php echo $base_url; ?>/ajax_call';
        var nid = $(this).attr("cat_id");
        var pa_id = $(this).parent().attr("id");
        //console.log(pa_id);
        $.ajax({

            url : ajax_url,
            type : 'POST',
            data : {
                'nid' : nid,
                'type' : pa_id,
                'format' : 'simple',
            },
            success : function(data) {
                //$(".tab_slider_data").hide();
                if(pa_id=='institute') {
                    $("#inst").html(data).fadeIn(100);
                }else if(pa_id=='department'){
                    $("#dept").html(data).fadeIn(100);
                }else if(pa_id=='clinics'){
                    $("#clinic").html(data).fadeIn(100);
                }
            },
            error : function(request,error)
            {
                console.log("Request: "+request);
            }
        });

    });
    var tabSliderActive = $(".tab_item.active");
    $(".tab_slider_data").load(tabSliderActive.attr("href")).fadeIn(300);
    //doctor search
    $('#dct_list').click(function(e){
        e.preventDefault();
       var inst = $("#institute option:selected").val();
       var dept = $("#doc_department option:selected").val();
     //  var doctors = $("#doctors:selected").val();
       var doctors = $("#doctors").val();
//        if()
        var ajax_url = '<?php echo $base_url; ?>/ajax_doctor';
        if(inst!=''){
            var nid = inst;
            var pa_id = 'institute';
        }else if(dept!=''){
            var nid = dept;
            var pa_id = 'department';
        }else if(doctors!=''){
            var nid = doctors;
            var pa_id = 'doctors';
        }

        $.ajax({

            url : ajax_url,
            type : 'POST',
            data : {
                'nid' : nid,
                'type' : pa_id,
                'format' : 'simple',
            },
            success : function(data) {
                //$(".tab_slider_data").hide();
                    $(".doctor_listing").html(data).fadeIn(100);

            },
            error : function(request,error)
            {
                console.log("Request: "+request);
            }
        });
    });
    $('body').on('click','.btn_arrow_reset',function(e) {
        $("#institute").attr("disabled", false);
        $("#doc_department").attr("disabled", false);
        $(".doctor_listing").load(location.href + " .doctor_listing");
    });

    function hideInstSelect(dept_id){
        if(dept_id != ''){
            $("#institute").attr("disabled", true);
        }else{
            $("#institute").attr("disabled", false);
        }
    }

    function hideDeptSelect(inst_id){
        if(inst_id != ''){
                $("#doc_department").attr("disabled", true);
            }else{
                $("#doc_department").attr("disabled", false);
            }
    }
    function myPrintFunction(){
        window.print();
    }
    <?php if (strpos($_SERVER['REQUEST_URI'], 'doctors') !== false) { ?>

    $(function() {


        var doctorList = JSON.parse($('#search_doc_res').val());

        $("#doctors").autocomplete({
            source: doctorList
        });
    });

    <?php } ?>
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'af,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
