<?php 
    $menubar = empty($PAGE->layout_options['nomenubar']);
    $noslider = !empty($PAGE->layout_options['noslider']);
    $topbutton = (isset($PAGE->layout_options['topbutton']))?$PAGE->layout_options['topbutton']:'logout';

    $OUTPUT->get_header($CFG, $menubar, $noslider, $topbutton);
?>

