<?php
    $hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
    $hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
    $showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
    $showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

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
    if($showsidepre)
        $sidebar = "LEFT";
    else if($showsidepost)
        $sidebar = "RIGHT";
    else
        $sidebar = "NONE";
    
    $showfeaturedcourses = get_config("theme_genesis","showfeaturedcourses");
    $showlinkboxes = get_config("theme_genesis","showlinkboxes");
    
    echo $OUTPUT->doctype();
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en" <?php echo $OUTPUT->htmlattributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en" <?php echo $OUTPUT->htmlattributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en" <?php echo $OUTPUT->htmlattributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" <?php echo $OUTPUT->htmlattributes(); ?>> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $PAGE->title; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php echo $OUTPUT->loadGoogleFont(); ?>
    
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>">
    
    <?php echo $OUTPUT->googleAnalytics() ?>
    <?php echo $OUTPUT->standard_head_html() ?>
    
    <noscript>
        <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/genesis/css/nojs.css" />
    </noscript>

</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
    <?php echo $OUTPUT->standard_top_of_body_html(); ?>
    <?php include 'header.php'; ?>
    
    <?php echo $OUTPUT->slider('frontpage'); ?>
    
    <div id="contentarea" class="row">
        <div class="sklt-container">
            
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
            
            <div class="<?php echo (($sidebar == "NONE")?"sixteen":"twelve"); ?> columns">
                <!-- Courses List -->
                <?php 
                    if($showfeaturedcourses){
                ?>

                        <div class="<?php echo (($sidebar != "NONE")?"twelve":"sixteen"); ?> columns alpha" id="featuredCourses">
                            <div class="p"><?php echo get_string('featuredcourses','theme_genesis');?></div>
                             
                            <div id="allCourses">
                                <a href="<?php echo $CFG->wwwroot; ?>/course/"><div><?php echo get_string('allcourses','theme_genesis'); ?></div></a>
                            </div>
                        </div>
                
                <?php
                        echo $OUTPUT->featuredcourses($CFG,$sidebar);
                    }
                ?>
                
                <!-- Link Box -->
                <div class="<?php echo (($sidebar == "NONE")?"sixteen":"twelve"); ?> columns alpha">
                    <?php 
                        if($showlinkboxes){
                            echo $OUTPUT->linkbox($CFG,$sidebar); 
                        }
                    ?>
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
    
    <?php include 'footer.php'; ?>

</body>

<?php 
    echo "<div style='display: none;'>".$OUTPUT->main_content()."</div>"; 
    echo $OUTPUT->standard_end_of_body_html();

    $PAGE->requires->js('/theme/genesis/javascript/slideshow.php');
?>
   <script>
    // $( document ).ready(function() {
    //         $(".cs-style-3").append('<li> <figure> <a href="http://aktivamedia.com/iaip/course/view.php?id=2"> <img src="http://aktivamedia.com/iaip/pluginfile.php/19/course/overviewfiles/course_icon.jpg" alt="Curso de acreditación para Oficiales de Información"> </a> <figcaption> <h3>Curso de acreditación para Oficiales de Información</h3> <div> <a href="http://aktivamedia.com/iaip/course/view.php?id=2">Take a Look</a> </div></figcaption> </figure> </li>')
    // });
    </script>