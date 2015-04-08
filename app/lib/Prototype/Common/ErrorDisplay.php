<?php
namespace Prototype\Common;


class ErrorDisplay
{
    
    private static $instance;
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function displayAll($errors)
    {
        
        return \View::make('layouts.elements.displays.all_errors', compact("errors"));
    }
    
    public function displayIndividual($errors, $field)
    {
        
        return \View::make('layouts.elements.displays.field_errors', compact("errors", "field"));
    }
}
