<?php

class Recipe
{
    private $title;
    private $ingredients = [];
    private $instructions = [];
    private $yield;
    private $tag = [];
    private $source = "Alena Holligan";

    private $measurements = [
        "tsp",
        "tsbp",
        "cup",
        "oz",
        "lb",
        "fl oz",
        "pint",
        "quart",
        "gallon",
    ];

    public function setTitle($title) {
        $this->title = ucwords($title);
    }

    public function getTitle() {
        return $this->title;
    }

    public function addIngredient($item, $amount = null, $measure = null) {
        if($amount != null && !is_float($amount) && !is_int($amount)) {
            exit("The amount must be a float: " . gettype($amount) . " $amount given.");
        }
        if($measure != null && !in_array(strtolower($measure), $this->measurements)) {
            exit("Please enter a valid measurement: " . implode(", ", $this->measurements));
        }
        $this->ingredients[] = [
            "item" => ucwords($item),
            "amount" => $amount,
            "measure" => $measure,
        ];
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function addInstruction($instruction) {
        $this->instructions[] = $instruction;
    }

    public function getInstructions() {
        return $this->instructions;
    }

    public function addTag($tag) {
        $this->tags[] = strtolower($tag);
    }

    public function getTags() {
        return $this->tags;
    }

    public function setYield($yield) {
        $this->yield = $yield;
    }

    public function getYield() {
        return $this->yield;
    }

    public function setSource($source) {
        $this->source = ucwords($source);
    }

    public function getSource() {
        return $this->source;
    }

    public function displayRecipe() {
        return $this->title . " by " . $this->source;
    }
}