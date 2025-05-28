<?php

namespace App\Cores;

class Validate {

    protected $errors = [];

    public function validate($data,$rules){
        foreach ($rules as $field => $rule) {
            $value = $data[$field] ?? null;

            foreach (explode('|',$rule) as $condition) {
                
                if ($condition === 'required' && empty($value)) {
                    $this->errors[$field][] = "{$field} is required.";
                }
                
            }
            
        }

    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

}