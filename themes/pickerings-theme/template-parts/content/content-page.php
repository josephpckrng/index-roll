<?php

if(get_row_layout() === 'content_division') :
    get_template_part('template-parts/divisions/mobile-division');
endif;

if(get_row_layout() === 'banner') :
    get_template_part('template-parts/full-width/banner');
endif;

if(get_row_layout() === 'flexible_columns') :
    get_template_part('template-parts/flexible-content/flexible-column');
endif;

