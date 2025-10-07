<?php

class Color {
    public $color;

    public function setRandomColor() {
        echo 'De kleur van deze postit is: ' . $this->color = rand(0, 99999);
    }

    public function setColor($color) {
        $this->color = $color;
        echo 'De kleur van deze postit is: ' . $this->color;
    }

    public function getColor() {
        return $this->color;
    }
}