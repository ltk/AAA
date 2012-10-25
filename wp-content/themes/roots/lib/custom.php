<?php

// Custom functions
function tjg_input_check( $var, $value, $type ) {
	if ( $var == $value && $type == 'check' ) { return 'checked="checked"'; }
	if ( $var == $value && $type == 'select' ) { return 'selected="selected"'; }
}