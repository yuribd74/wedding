<!-- #import -->
<div id="import" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#tab1"><?php esc_html_e('Import Demo', 'veda-importer');?></a></li>
        </ul>

        <?php $content = array(
                '--' => esc_html('All', 'veda-importer'),
                'pages'  => esc_html('Pages', 'veda-importer'),
                'posts' => esc_html('Posts', 'veda-importer'),
                'portfolios' => esc_html('Portfolio', 'veda-importer'),
                'contactforms' => esc_html('Contact Forms', 'veda-importer')
            );

            function veda_sort( $array ) {
                asort( $array );
                return $array;
            }

            $veda_demos = array(
                'architecture' =>  array(
                    'label' => 'Architecture',
                    'link' => 'http://wedesignthemes.com/veda/architecture/',
                    'content' => $content
                ),
                'attorney' => array(
                   'label' =>  'Attorney',
                   'link' => 'http://wedesignthemes.com/veda/attorney/',
                   'content' => veda_sort( $content + array( 'attorneys' => esc_html('Attorneys', 'veda-importer') ) )
                ),
                'biz' => array(
                    'label' =>  'Business',
                    'link' => 'http://wedesignthemes.com/veda/biz/',
                    'content' => $content
                ),
                'event' => array(
                    'label' =>  'Event',
                    'link' => 'http://wedesignthemes.com/veda/event/',
                    'content' => $content
                ),
                'fashion' => array(
                    'label' =>  'Fashion',
                    'link' => 'http://wedesignthemes.com/veda/fashion/',
                    'content' => $content
                ),
                'fitness' => array(
                    'label' =>  'Fitness',
                    'link' => 'http://wedesignthemes.com/veda/fitness/',
                    'content' => veda_sort( $content + array( 'programs' => esc_html('Programs', 'veda-importer'), 'trainers' => esc_html('Trainers', 'veda-importer') ) )
                ),
                'hosting' => array(
                    'label' =>  'Hosting',
                    'link' => 'http://wedesignthemes.com/veda/hosting/',
                    'content' => $content
                ),
                'hotel' => array(
                    'label' =>  'Hotel',
                    'link' => 'http://wedesignthemes.com/veda/hotel/',
                    'content' => $content
                ),
                'insurance' => array(
                    'label' =>  'Insurance',
                    'link' => 'http://wedesignthemes.com/veda/insurance/',
                    'content' => $content
                ),
                'jewel' => array(
                    'label' =>  'Jewel',
                    'link' => 'http://wedesignthemes.com/veda/jewel/',
                    'content' => $content
                ),
                'medical' => array(
                    'label' =>  'Medical',
                    'link' => 'http://wedesignthemes.com/veda/medical/',
                    'content' => veda_sort( $content + array( 'doctors' => esc_html('Doctors', 'veda-importer') ) )
                ),
                'model' => array(
                    'label' =>  'Model',
                    'link' => 'http://wedesignthemes.com/veda/model/',
                    'content' => veda_sort( $content + array( 'models' => esc_html('Models', 'veda-importer') ) )
                ),
                'nightclub' => array(
                    'label' =>  'Nightclub',
                    'link' => 'http://wedesignthemes.com/veda/nightclub/',
                    'content' => veda_sort( $content + array( 'djs' => esc_html('DJs', 'veda-importer') ) )
                ),
                'photography' => array(
                    'label' =>  'Photography',
                    'link' => 'http://wedesignthemes.com/veda/photography/',
                    'content' => $content
                ),
                'plumber' => array(
                    'label' =>  'Plumber',
                    'link' => 'http://wedesignthemes.com/veda/plumber/',
                    'content' => $content
                ),
                'restaurant' => array(
                    'label' =>  'Restaurant',
                    'link' => 'http://wedesignthemes.com/veda/restaurant/',
                    'content' => veda_sort( $content + array( 'chefs' => esc_html('Chefs', 'veda-importer'), 'menus' => esc_html('Menus', 'veda-importer') ) )
                ),
                'spa' => array(
                    'label' =>  'Spa',
                    'link' => 'http://wedesignthemes.com/veda/spa/',
                    'content' => $content
                ),
                'university' => array(
                    'label' =>  'University',
                    'link' => 'http://wedesignthemes.com/veda/university/',
                    'content' => veda_sort( $content + array( 'courses' => esc_html('Courses', 'veda-importer'), 'faculties' => esc_html('Faculties', 'veda-importer') ) )
                ),
                'wedding' => array(
                    'label' =>  'Wedding',
                    'link' => 'http://wedesignthemes.com/veda/wedding/',
                    'content' => $content
                ),
                'yoga' => array(
                    'label' =>  'Yoga',
                    'link' => 'http://wedesignthemes.com/veda/yoga/',
                    'content' => veda_sort( $content + array( 'poses' => esc_html('Poses', 'veda-importer'), 'programs' => esc_html('Programs', 'veda-importer'), 
									'styles' => esc_html('Styles', 'veda-importer'), 'teachers' => esc_html('Teachers', 'veda-importer'), 'videos' => esc_html('Videos', 'veda-importer') ) )
                ),
                'financial' => array(
                    'label' =>  'Financial',
                    'link' => 'http://wedesignthemes.com/veda/financial/',
                    'content' => $content
                ),
                'flower' => array(
                    'label' =>  'Flower',
                    'link' => 'http://wedesignthemes.com/veda/flower/',
                    'content' => $content
                ),
                'wind-energy' => array(
                    'label' =>  'Wind Energy',
                    'link' => 'http://wedesignthemes.com/veda/wind-energy/',
                    'content' => $content
                ),
                'it-company' => array(
                    'label' =>  'IT Company',
                    'link' => 'http://wedesignthemes.com/veda/it-company/',
                    'content' => $content
                ),
                'baby-photography' => array(
                    'label' =>  'Baby Photography',
                    'link' => 'http://wedesignthemes.com/veda/baby-photography/',
                    'content' => $content
                ),
                'construction' => array(
                    'label' =>  'Construction',
                    'link' => 'http://wedesignthemes.com/veda/construction/',
                    'content' => $content
                ),
                'flooring' => array(
                    'label' =>  'Flooring',
                    'link' => 'http://wedesignthemes.com/veda/flooring/',
                    'content' => veda_sort( $content + array( 'models' => esc_html('Models', 'veda-importer') ) )
                ),
                'moving' => array(
                    'label' =>  'Moving',
                    'link' => 'http://wedesignthemes.com/veda/moving/',
                    'content' => $content
                ),
                'tattoo' => array(
                    'label' =>  'Tattoo',
                    'link' => 'http://wedesignthemes.com/veda/tattoo/',
                    'content' => $content
                ),
                'wall-decor' => array(
                    'label' =>  'Wall Decor',
                    'link' => 'http://wedesignthemes.com/veda/wall-decor/',
                    'content' => $content
                ),
                'personal-portfolio' => array(
                    'label' =>  'Personal Portfolio',
                    'link' => 'http://wedesignthemes.com/veda/personal-portfolio/',
                    'content' => $content
                ),
                'pizza' => array(
                    'label' =>  'Pizza',
                    'link' => 'http://wedesignthemes.com/veda/pizza/',
                    'content' => $content
                ),
                'portfolio-agency' => array(
                    'label' =>  'Portfolio Agency',
                    'link' => 'http://wedesignthemes.com/veda/portfolio-agency/',
                    'content' => $content
                ),
                'portfolio-creative' => array(
                    'label' =>  'Portfolio Creative',
                    'link' => 'http://wedesignthemes.com/veda/portfolio-creative/',
                    'content' => $content
                ),
                'aquarium' => array(
                    'label' =>  'Aquarium',
                    'link' => 'http://wedesignthemes.com/veda/aquarium/',
                    'content' => $content
                ),
                'bike' => array(
                    'label' =>  'Bike',
                    'link' => 'http://wedesignthemes.com/veda/bike/',
                    'content' => $content
                ),
                'energy' => array(
                    'label' =>  'Energy',
                    'link' => 'http://wedesignthemes.com/veda/energy/',
                    'content' => $content
                ),
                'logistic' => array(
                    'label' =>  'Logistic',
                    'link' => 'http://wedesignthemes.com/veda/logistic/',
                    'content' => $content
                ),
                'wine' => array(
                    'label' =>  'Wine',
                    'link' => 'http://wedesignthemes.com/veda/wine/',
                    'content' => $content
                ),
                'aqua' => array(
                    'label' =>  'Aqua',
                    'link' => 'http://wedesignthemes.com/veda/aqua/',
                    'content' => $content
                ),
                'charity' => array(
                    'label' =>  'Charity',
                    'link' => 'http://wedesignthemes.com/veda/charity/',
                    'content' => $content
                ),
                'lifestyle' => array(
                    'label' =>  'Lifestyle',
                    'link' => 'http://wedesignthemes.com/veda/lifestyle/',
                    'content' => $content
                ),
                'security' => array(
                    'label' =>  'Security',
                    'link' => 'http://wedesignthemes.com/veda/security/',
                    'content' => $content
                ),
                'taxi' => array(
                    'label' =>  'Taxi',
                    'link' => 'http://wedesignthemes.com/veda/taxi/',
                    'content' => $content
                ),
                'bar' => array(
                    'label' =>  'Bar',
                    'link' => 'http://wedesignthemes.com/veda/bar/',
                    'content' => veda_sort( $content + array( 'menus' => esc_html('Menus', 'veda-importer') ) )
                ),
                'cafe' => array(
                    'label' =>  'Cafe',
                    'link' => 'http://wedesignthemes.com/veda/cafe/',
                    'content' => $content
                ),
                'modern-portfolio' => array(
                    'label' =>  'Modern Portfolio',
                    'link' => 'http://wedesignthemes.com/veda/modern-portfolio/',
                    'content' => $content
                ),
                'modern-portfolio-filtered' => array(
                    'label' =>  'Modern Portfolio Filtered',
                    'link' => 'http://wedesignthemes.com/veda/modern-portfolio-filtered/',
                    'content' => $content
                ),
                'style-shop' => array(
                    'label' =>  'Style Shop',
                    'link' => 'http://wedesignthemes.com/veda/style-shop/',
                    'content' => $content
                ),
                'magazine' => array(
                    'label' =>  'Magazine',
                    'link' => 'http://wedesignthemes.com/veda/magazine/',
                    'content' => veda_sort( $content + array( 'grids' => esc_html('Grid Builder', 'veda-importer') ) )
                ),
                'fire-protection' => array(
                    'label' =>  'Fire Protection',
                    'link' => 'http://wedesignthemes.com/veda/fire-protection/',
                    'content' => $content
                ),
                'gym' => array(
                    'label' =>  'Gym',
                    'link' => 'http://wedesignthemes.com/veda/gym/',
                    'content' => $content
                ),
                'hr-management' => array(
                    'label' =>  'HR Management',
                    'link' => 'http://wedesignthemes.com/veda/hr-management/',
                    'content' => $content
                ),
                'organizer' => array(
                    'label' =>  'Organizer',
                    'link' => 'http://wedesignthemes.com/veda/organizer/',
                    'content' => $content
                ),
                'security-system' => array(
                    'label' =>  'Security System',
                    'link' => 'http://wedesignthemes.com/veda/security-system/',
                    'content' => $content
                ),
                'advt-new' => array(
                    'label' =>  'Advertisement',
                    'link' => 'http://wedesignthemes.com/veda/advt-new/',
                    'content' => $content
                ),
                'cottage' => array(
                    'label' =>  'Cottage',
                    'link' => 'http://wedesignthemes.com/veda/cottage/',
                    'content' => veda_sort( $content + array( 'rooms' => esc_html('Rooms', 'veda-importer') ) )
                ),
                'easy-seo' => array(
                    'label' =>  'Easy Seo',
                    'link' => 'http://wedesignthemes.com/veda/easy-seo/',
                    'content' => $content
                ),
                'inside' => array(
                    'label' =>  'Inside',
                    'link' => 'http://wedesignthemes.com/veda/inside/',
                    'content' => $content
                ),
                'leisure' => array(
                    'label' =>  'Leisure',
                    'link' => 'http://wedesignthemes.com/veda/leisure/',
                    'content' => veda_sort( $content + array( 'rooms' => esc_html('Rooms', 'veda-importer') ) )
                ),
                'look-magazine' => array(
                    'label' =>  'Look Magazine',
                    'link' => 'http://wedesignthemes.com/veda/look-magazine/',
                    'content' => $content
                ),
                'private-teacher' => array(
                    'label' =>  'Private Teacher',
                    'link' => 'http://wedesignthemes.com/veda/private-teacher/',
                    'content' => $content
                ),
                'roofing' => array(
                    'label' =>  'Roofing',
                    'link' => 'http://wedesignthemes.com/veda/roofing/',
                    'content' => $content
                ),
                'solar-energy' => array(
                    'label' =>  'Solar Energy',
                    'link' => 'http://wedesignthemes.com/veda/solar-energy/',
                    'content' => $content
                ),
            );

		$veda_demos = veda_sort($veda_demos); ?>

        <!-- #tab1 -->
        <div id="tab1" class="tab-content">
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Import Demo', 'veda-importer');?></h3>
                </div>
                <div class="box-content dttheme-import">

                    <!-- 1. Choose Demo -->
                    <p class="note">
                        <?php esc_html_e('Before starting the import, you need to install all plugins that you want to use.', 'veda-importer'); ?>
                        <br /><?php esc_html_e('If you are planning to use the shop, please install WooCommerce plugin.', 'veda-importer');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="column one-third"><label><?php esc_html_e('Demo', 'veda-importer');?></label></div>
                    <div class="column two-third last">
                        <select name="demo" class="demo medium dt-chosen-select">
                            <option data-link="http://wedesignthemes.com/veda/" value="">-- <?php esc_html_e('Select', 'veda-importer');?> --</option>
                            <?php foreach( $veda_demos as $key => $veda_demo ) : ?>
                                    <option data-link="<?php echo esc_attr( $veda_demo['link'] ); ?>" value="<?php echo esc_attr($key); ?>"><?php echo esc_html( $veda_demo['label'] ); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <a class="lnk-onlinedemo" href="http://wedesignthemes.com/veda/" target="_blank"><?php esc_html_e('Online Demo', 'veda-importer');?></a>                        
                    </div> 
                    <div class="hr_invisible"> </div>

                    <!-- 2. Choose Content -->
                    <?php foreach($veda_demos as $veda_demo_key => $veda_demo) :?>
                            <div class="veda-demos <?php echo esc_attr($veda_demo_key); ?>-demo hide">
                                <div class="column one-third"><label><?php esc_html_e('Import', 'veda-importer');?></label></div>
                                <div class="column two-third last">
                                    <select name="import" class="import medium dt-chosen-select">
                                        <option value="">-- <?php esc_html_e('Select', 'veda-importer');?> --</option>
                                        <option value="all"><?php esc_html_e('All', 'veda-importer') ?></option>
                                        <option value="content"><?php esc_html_e('Content', 'veda-importer') ?></option>
                                        <option value="menu"><?php esc_html_e('Menu', 'veda-importer') ?></option>
                                        <option value="options"><?php esc_html_e('Options', 'veda-importer') ?></option>
                                        <option value="widgets"><?php esc_html_e('Widgets', 'veda-importer') ?></option>
                                    </select>
                                </div>

                                <div class="hr_invisible"> </div>

                                <!-- 2.1. Content Type  -->
                                <div class="row-content hide">
                                    <div class="column one-third">
                                        <label for="content"><?php esc_html_e('Content', 'veda-importer');?></label>
                                    </div>
                                    <div class="column two-third last">
                                        <select name="content" class="medium dt-chosen-select">
                                            <?php foreach( $veda_demo['content'] as $key => $value ): ?>
                                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html($value); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;?>

                    <!-- 3. Attachment -->
                    <div class="row-attachments hide">
                        <div class="column one-third"><?php esc_html_e('Attachments', 'veda-importer');?></div>
                        <div class="column two-third last">
                            <fieldset>
                                <label for="attachments"><input type="checkbox" value="0" id="attachments" name="attachments"><?php esc_html_e('Import attachments', 'veda-importer');?></label>
                                <p class="description"><?php esc_html_e('Download all attachments from the demo may take a while. Please be patient.', 'veda-importer');?></p>
                            </fieldset>
                        </div>
                        <div class="hr_invisible"> </div>
                    </div>

                    <!-- Import Button -->
                    <div class="column one-column">
                        <div class="hr_invisible"> </div>
                        <div class="column one-third">&nbsp;</div>
                        <div class="column two-third last">
                            <a href="#" class="dttheme-import-button bpanel-button black-btn" title="<?php esc_html_e('Import demo data', 'veda');?>"><?php esc_html_e('Import Demo Data', 'veda');?></a>
                        </div>
                    </div>
                    <div class="hr"></div>
                </div>            
            </div>
        </div>
    </div>
</div><!-- #import end-->