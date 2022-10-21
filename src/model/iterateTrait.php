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
    public function iterateProperties(): array
    {
        $properties = [];
        foreach ($this as $key => $value) {
            $properties[] = $key;
        }
        return $properties;
    }
}