<?php

require 'color.class.php';

class PostIt
{
    public $title;
    public $description;
    public $content;
    public $date;
    private $color;

    public function __construct($title, $description, $content, $date) {
        $this->title = $title;
        $this->description = $description;  
        $this->content = $content;
        $this->date = $date;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    } 
    
    public function render()
    {
        echo "<div class='post-it'>
                <h2>$this->title</h2>
                <p>$this->description</p>
                <p>$this->content</p>
                <p>$this->date</p>
            </div>";
    }

    public function applyForm($formData) {
        $this->title = $formData['title'];
        $this->description = $formData['description'];
        $this->content = $formData['content'];
        $this->date = $formData['date'];
    }
}