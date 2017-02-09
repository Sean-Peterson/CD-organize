<?php

    class CD
    {
        private $title;
        private $artist;
        private $year;

        function __construct($title, $artist, $year)
        {
            $this->title=$title;
            $this->artist=$artist;
            $this->year=$year;
        }

        function get($property)
        {
            if (property_exists($this, $property)) {
                return $this->$property;
            } else {
                return "That property does not exist.";
            }
        }

        function set($property, $value)
        {
            if (property_exists($this, $property)) {
                $this[$property] = $value;
            } else {
                return "That property does not exist.";
            }
        }






    }


?>
