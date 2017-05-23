<?php
    $hasheading = ($PAGE->heading);
    $hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
    $hasfooter = (empty($PAGE->layout_options['nofooter']));
    $hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
    $hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
    $haslogininfo = (empty($PAGE->layout_options['nologininfo']));

    $showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
    $showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

    $custommenu = $OUTPUT->custom_menu();
    $hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

    $hasfootnote = (!empty($PAGE->theme->settings->footnote));

    $courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';
    if (empty($PAGE->layout_options['nocourseheaderfooter'])) {
        $courseheader = $OUTPUT->course_header();
        $coursecontentheader = $OUTPUT->course_content_header();
        if (empty($PAGE->layout_options['nocoursefooter'])) {
            $coursecontentfooter = $OUTPUT->course_content_footer();
            $coursefooter = $OUTPUT->course_footer();
        }
    }

    $bodyclasses = array();
    if ($showsidepre && !$showsidepost) {
        if (!right_to_left()) {
            $bodyclasses[] = 'side-pre-only';
        } else {
            $bodyclasses[] = 'side-post-only';
        }
    } else if ($showsidepost && !$showsidepre) {
        if (!right_to_left()) {
            $bodyclasses[] = 'side-post-only';
        } else {
            $bodyclasses[] = 'side-pre-only';
        }
    } else if (!$showsidepost && !$showsidepre) {
        $bodyclasses[] = 'content-only';
    }

    /* Sidebar */
    $sidebar = "";
    if($showsidepre)
        $sidebar = "LEFT";
    else if($showsidepost)
        $sidebar = "RIGHT";
    else
        $sidebar = "NONE";

    echo $OUTPUT->doctype();
?>

<html <?php echo $OUTPUT->htmlattributes() ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $PAGE->title; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <?php echo $OUTPUT->loadGoogleFont(); ?>
        

        <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>">
        
        <?php echo $OUTPUT->googleAnalytics() ?>
        <?php echo $OUTPUT->standard_head_html() ?>
     

    </head>

    <body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
        <?php echo $OUTPUT->standard_top_of_body_html(); ?>

        <?php include 'header.php'; ?>
        
        <?php echo $OUTPUT->slider('general'); ?>
        
        <div id="contentarea" class="row">
            <div class="sklt-container">
                
                <?php 
                    echo $OUTPUT->breadcrumb($PAGE);
                ?>
                
                <?php if($sidebar == "LEFT") { ?>
                    <div class="four columns leftsidebar">
                        <div id="region-pre" class="block-region">
                            <div class="region-content">
                                <?php echo $OUTPUT->blocks_for_region('side-pre'); ?>
                            </div>
                        </div>
                    </div>
                <?php } else if ($hassidepre) { 
                        echo $OUTPUT->blocks_for_region('side-pre'); 
                    }
                ?>

                <div class="<?php echo (($sidebar == "NONE")?"sixteen omega":"twelve"); ?> columns">
                    <div id="page-wrapper">
                        <div id="page">
                            <div id="page-content">
                                <div id="region-main-box">
                                    <div id="region-pre-box">
                                        <div id="region-main">
                                            <div class="region-content">
                                                <?php echo $coursecontentheader; ?>
                                                <?php echo $OUTPUT->main_content() ?>
                                                <?php echo $coursecontentfooter; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                
                <?php if($sidebar == "RIGHT") { ?>
                    <div class="four columns omega rightsidebar">
                        <div id="region-post" class="block-region">
                            <div class="region-content">
                                <?php echo $OUTPUT->blocks_for_region('side-post'); ?>
                            </div>
                        </div>
                    </div>
                <?php } else if ($hassidepost) { 
                        echo $OUTPUT->blocks_for_region('side-post'); 
                    }
                ?>
            </div>
        </div>
        
        <?php 
            include 'footer.php';
            echo $OUTPUT->standard_footer_html();
            echo $OUTPUT->standard_end_of_body_html(); 
        ?>
        <script>var jQuery = $;</script>
<!--
        <link rel="stylesheet" href="http://aktivamedia.com/iaip/lib/jquery/jquery-ui-1.11.3.custom/jquery-ui.css">
        <link rel="stylesheet" href="http://aktivamedia.com/iaip/lib/jquery/jquery-ui-1.11.3.custom/jquery-ui.theme.min.css">
        <script src="http://aktivamedia.com/iaip/lib/jquery/jquery-ui-1.11.3.custom/jquery-ui.js"></script>
-->
         <script>
         if ( $( ".accordion" ).length ) {             
                $( ".accordion" ).accordion({ heightStyle: "content" });
          }
          if ( $( ".tabs" ).length ) {             
                $( ".tabs" ).tabs({ active: 0 });
          }
           if ( ($(".dialogo1" ).length) && ($("#dialogo1" ).length))  {             
                $( ".dialogo1" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo1" ).click(function() {
                      $( ".dialogo1" ).dialog( "open" );
                });
          }
          if ( ($(".dialogo2" ).length) && ($("#dialogo2" ).length))  {             
                $( ".dialogo2" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo2" ).click(function() {
                      $( ".dialogo2" ).dialog( "open" );
                });
          } 
          if ( ($(".dialogo3" ).length) && ($("#dialogo3" ).length))  {             
                $( ".dialogo3" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo3" ).click(function() {
                      $( ".dialogo3" ).dialog( "open" );
                });
          } 
          if ( ($(".dialogo4" ).length) && ($("#dialogo4" ).length))  {             
                $( ".dialogo4" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo4" ).click(function() {
                      $( ".dialogo4" ).dialog( "open" );
                });
          } 
          if ( ($(".dialogo5" ).length) && ($("#dialogo5" ).length))  {             
                $( ".dialogo5" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo5" ).click(function() {
                      $( ".dialogo5" ).dialog( "open" );
                });
          } 
          if ( ($(".dialogo6" ).length) && ($("#dialogo6" ).length))  {             
                $( ".dialogo6" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo6" ).click(function() {
                      $( ".dialogo6" ).dialog( "open" );
                });
          } 
          if ( ($(".dialogo7" ).length) && ($("#dialogo7" ).length))  {             
                $( ".dialogo7" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo7" ).click(function() {
                      $( ".dialogo7" ).dialog( "open" );
                });
          } 
          if ( ($(".dialogo8" ).length) && ($("#dialogo8" ).length))  {             
                $( ".dialogo8" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo8" ).click(function() {
                      $( ".dialogo8" ).dialog( "open" );
                });
          } 
          if ( ($(".dialogo9" ).length) && ($("#dialogo9" ).length))  {             
                $( ".dialogo9" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#dialogo9" ).click(function() {
                      $( ".dialogo9" ).dialog( "open" );
                });
          } 
           if ( ($(".refe" ).length) && ($("#refe" ).length))  {             
                $( ".refe" ).dialog({autoOpen: false, modal: true, title: "Referencia", resizable: true, width: 600});
                $( "#refe" ).click(function() {
                      $( ".refe" ).dialog( "open" );
                });
          } 
        
         </script>
    </body>
</html>