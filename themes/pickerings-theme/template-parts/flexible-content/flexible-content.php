<?php

if(get_row_layout() === 'flexible_block') :
    get_template_part('template-parts/flexible-content/flexible-blocks/flexible-block');
endif;

if(get_row_layout() === 'flexible_form') :
    get_template_part('template-parts/flexible-content/flexible-blocks/flexible-form');
endif;

if(get_row_layout() === 'flexible_artists') :
    get_template_part('template-parts/flexible-content/flexible-blocks/flexible-artists');
endif;

if(get_row_layout() === 'content_division') :
    get_template_part('template-parts/flexible-content/flexible-blocks/content-division');
endif;