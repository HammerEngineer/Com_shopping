<?php

    class Paging{
        private $_records;
        private $_max_pp;
        private $_numb_of_pages;
        private $_current;
        private $_offset =0;
        private static $_key = 'pg';
        private $_url;
        
        
        public function __construct($rows , $max =10) {
            $this->_records = $rows;
            $this->_numb_of_pages = count($this->_records);
            $this->_max_pp = $max;
            $this->_url = Url::getCurrentUrl(self::$_key);
            $current = Url::getParam(self::$_key);
            $this->_current = !empty($current) ? $current : 1;
            $this->numberOfPages();
            $this->getOffset();
        }
    }
?>

