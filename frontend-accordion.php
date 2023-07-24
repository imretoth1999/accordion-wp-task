<?php
// Create a custom shortcode to display the accordion
add_shortcode('accordion_task', 'display_accordion_shortcode');

function display_accordion_shortcode() {
    $accordion_items = get_option('accordion_items', array());
    $accordion_number = 0;
    // Based on the index, I will go trough the array and show the theme color. the colors will be grey=>green=>dark=>blue and then they will repeat
    $accordion_colors = ['grey', 'green', 'dark', 'blue'];
    // If the option is not yet set or empty, initialize it as an empty array
    if (!is_array($accordion_items)) {
        $accordion_items = array();
    }

    ob_start();
    ?>
    <div id="accordion-wrapper">
        <?php foreach ($accordion_items as $index => $item) : ?>
            <!-- each accordion based on it's index will be accordion-item dark or accordion-item blue etc-->
            <div class="accordion-item <?php echo $accordion_colors[$index % 4] ?>">
                <h2 class="accordion-header" id="heading<?php echo $index ?>">
                    <button class="accordion-button <?php echo $accordion_colors[$index % 4] ?> collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index ?>" aria-expanded="false" aria-controls="collapse<?php echo $index ?>">
                        <?php echo esc_html($item['title']); ?>
                    </button>
                </h2>
            <div id="collapse<?php echo $index ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index ?>" data-bs-parent="#accordion-wrapper">
                <div class="accordion-body">
                    <?php echo esc_html($item['description']); ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
