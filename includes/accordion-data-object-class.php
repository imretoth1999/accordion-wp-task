<?php
require_once(plugin_dir_path(__FILE__) . 'accordion-item.php');

class Accordion_Data_Object {
    public $accordion_items;

    public function __construct() {
        $this->accordion_items = array();
    }

    public function add_item($id, $title, $description) {
        $item = new Accordion_Item($id, $title, $description);
        $this->accordion_items[] = $item;
    }
}
