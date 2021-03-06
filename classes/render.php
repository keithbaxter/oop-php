<?php

class Render
{
    public static function listIngredients($ingredients) {
        $output = "";
        foreach ($ingredients as $ingredient) {
            $output .= $ingredient["amount"] . " " . $ingredient["measure"] . " " . $ingredient["item"];
            $output .= "\n";
        }
        return $output;
    }

    public static function displayRecipe($recipe) {
        $output = "";
        $output .= $recipe->getTitle() . " by " . $recipe->getSource();
        $output .= "\n";
        $output .= implode(", ", $recipe->getTags());
        $output .= "\n\n";
        $output .= self::listIngredients($recipe->getIngredients());
        $output .= "\n";
        $output .= implode("\n", $recipe->getInstructions());
        $output .= "\n";
        $output .= $recipe->getYield();

        return $output;
    }
}