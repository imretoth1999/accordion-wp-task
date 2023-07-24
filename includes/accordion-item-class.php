<?php

// Define the Accordion Item class
class Accordion_Item {
    public $id;
    public $title;
    public $description;

    public function __construct($id, $title, $description) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }
}
