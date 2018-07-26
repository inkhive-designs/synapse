<?php
/*
** Customizer Controls
*/
if (class_exists('WP_Customize_Control')) {
    class Synapse_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'synapse' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }

    class Synapse_WP_Customize_Product_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'synapse' ),
                    'option_none_value' => '0',
                    'taxonomy'          => 'product_cat',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }

    class WP_Customize_Upgrade_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            printf(
                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $this->description
            );
        }
    }


// Advertisement
    class synapse_Custom_Ads_Control extends WP_Customize_Control {
        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <textarea rows="10" style="width:100%;" <?php $this->link(); ?>><?php echo $this->value(); ?></textarea>
            </label>
            <?php
        }
    }

    class Synapse_Skin_Chooser extends WP_Customize_Control{
        public $type = 'skins';

        public function render_content(){
            ?>

            <span class="customize-control-title">
            <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
            	<?php echo wp_kses_post($this->description); ?>
            </span>
            <?php } ?>

            <?php $name = '_customize-skin-' . $this->id;
            $img_path   =   get_template_directory_uri() . '/assets/images/';
            foreach ($this->choices as $key=>$value) { ?>
                <label>
                    <input type="radio" class="custom_skin_control"  value="<?php echo esc_attr($value); ?>" <?php $this->link(); ?> name="<?php echo esc_attr( $name ); ?>" <?php checked( $this->value(), $value ); ?> />
                    <img src="<?php echo $img_path . $key . '.png'; ?>" alt="<?php echo $value ?>" />
                </label>

            <?php }
        }
    }
}


