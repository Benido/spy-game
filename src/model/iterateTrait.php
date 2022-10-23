<?php

trait iterateTrait {
    /**
     * @return array
     */
    function iterateValues (): array
    {
        $values = [];
        foreach ($this as $key => $value) {
            $values[] = $value;
        }
        return $values;
    }

    /**
     * @return array
     */
    public static function iterateProperties(): array
    {
        $properties = [];
        foreach (array_keys(get_class_vars(__CLASS__)) as $property) {
            $properties[] = $property;
        }
        return $properties;
    }
}