<?php

    class Post
    {
        const POSTS_CONTENT_DIR = 'content/blog/posts/';
        private $file;
        private $date;
        public $datetime;
        public $date_string;
        public $title;
        public $content;
        public $preview;

        public function __construct($file)
        {
            $this->file = $file;
            preg_match('/^(\d{8})-(.+)\.html$/', $this->file, $matches);
            $this->content = file_get_contents(self::POSTS_CONTENT_DIR . $this->file);
            $document = new DOMDocument();
            $document->loadHTML('<body>' . $this->content . '</body>');
            $children = $document->getElementsByTagName('body')->item(0)->childNodes;
            $this->preview = '';
            for ($i = 0; $i <= 4; $i++)
                $this->preview .= $document->saveHTML($children->item($i));
            list(, $rawDate, $this->title) = $matches;
            $this->date = new DateTime($rawDate);
            $this->date_string = $this->date->format('F j, Y');
            $this->datetime = $this->date->format('Y-m-d');
        }

        public static function from_pattern($title_pattern)
        {
            $matching_files = glob(self::POSTS_CONTENT_DIR . "????????-*$title_pattern*");
            $matching_files = empty($matching_files)
                ? scandir(self::POSTS_CONTENT_DIR)
                : $matching_files;
            $file = basename(array_pop($matching_files));
            return new self($file);
        }
    }