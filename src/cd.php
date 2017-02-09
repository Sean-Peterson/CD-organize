<?php

    class CD
    {
        private $artist;
        private $title;
        private $year;

        function __construct($artist, $title, $year)
        {
            $this->artist=$artist;
            $this->title=$title;
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

        function save()
        {
            array_push($_SESSION['cd_array'], $this);
        }

        static function getAll()
        {
            return $_SESSION['cd_array'];
        }

        static function delete()
        {
            return $_SESSION['cd_array'] = array();
        }

    }


?>
