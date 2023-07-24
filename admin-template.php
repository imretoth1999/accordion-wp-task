<?php
// Define a function to render the backend settings page
function accordion_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('accordion_settings_group');
            do_settings_sections('accordion_settings_page');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Define a function to register the backend settings
function accordion_register_settings() {
    register_setting('accordion_settings_group', 'accordion_items', 'accordion_sanitize_data');
    add_settings_section('accordion_section', 'Accordion Items', 'accordion_section_callback', 'accordion_settings_page');
    add_settings_section('accordion_items_field', '', 'accordion_items_callback', 'accordion_settings_page', 'accordion_section');
}

// Define a callback function to render the accordion settings section
function accordion_section_callback() {
    echo '<p class="starting-section-accordion">Enter data for each Accordion item.</p>';
}

// Define a callback function to render the accordion items fields
function accordion_items_callback() {
    $accordion_items = get_option('accordion_items', array());

    //if accordion_items are missing from options create an empty array
    if (!is_array($accordion_items) || count($accordion_items) === 0) {
        $accordion_items = array();
    }

    // Display the fields for each accordion item
    foreach ($accordion_items as $index => $item) {
        ?>
        <div class="accordion-item">
            <h3>Accordion Item <?php echo $index + 1; ?></h3>
            <label for="accordion_title_<?php echo $index; ?>">Title:</label>
            <input type="text" id="accordion_title_<?php echo $index; ?>" name="accordion_items[<?php echo $index; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" required>
            <br>
            <label style="vertical-align:top!important;" for="accordion_description_<?php echo $index; ?>">Description:</label>
            <textarea id="accordion_description_<?php echo $index; ?>" name="accordion_items[<?php echo $index; ?>][description]" required><?php echo esc_textarea($item['description']); ?></textarea>
            <!-- Add Button that removes an item -->
            <button type="button" class="button button-secondary delete-accordion-item">Delete</button>
            <hr>
        </div>
        <?php
    }

    // Add a button to add new accordion items
    ?>
    <button type="button" class="button button-secondary" id="add_new_accordion">Add New Accordion Item</button>
    <script>
        jQuery(document).ready(function($) {

            //If no accordion items exist, render directly the form to input one
            if (!$('.accordion-item').length) {
                renderAccordionOption();
            }
            // JavaScript to handle adding new accordion items
            $('#add_new_accordion').on('click', function() {
                renderAccordionOption();
            });
            
            function renderAccordionOption() {
                const index = $('.accordion-item').length;
                const newItemHtml = `
                <div class="accordion-item">
                    <h3>Accordion Item ${index + 1}</h3>
                    <label for="accordion_title_${index}">Title:</label>
                    <input type="text" id="accordion_title_${index}" name="accordion_items[${index}][title]" required>
                    <br>
                    <label style="vertical-align:top;" for="accordion_description_${index}">Description:</label>
                    <textarea id="accordion_description_${index}" name="accordion_items[${index}][description]" required></textarea>
                    <hr>
                </div>
                `;
                //If there is an accordion item, add it after the last one. else add it directly after starting selection
                if ($('.accordion-item').length) {
                    $('.accordion-item:last-of-type').after(newItemHtml);
                }
                else {
                    $('.starting-section-accordion').after(newItemHtml);
                }
            }

            //Function that deletes an accordion item
            $('.delete-accordion-item').on('click', function() {
                $(this).closest('.accordion-item').remove();
            });
        });
    </script>
    <?php
}

// Define a function to sanitize the data before saving
function accordion_sanitize_data($input) {
    foreach ($input as $index => $item) {
        $input[$index]['title'] = sanitize_text_field($item['title']);
        $input[$index]['description'] = sanitize_textarea_field($item['description']);
    }
    return $input;
}

// Hook the functions to WordPress actions
add_action('admin_menu', 'accordion_admin_menu');
function accordion_admin_menu() {
    add_options_page('Accordion Settings', 'Accordion Settings', 'manage_options', 'accordion_settings_page', 'accordion_settings_page');
}

add_action('admin_init', 'accordion_register_settings');
