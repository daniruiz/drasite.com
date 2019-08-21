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
            $this->content = mb_convert_encoding(file_get_contents(self::POSTS_CONTENT_DIR . $this->file), 'HTML-ENTITIES', "UTF-8");
            $document = new DOMDocument();
            $document->loadHTML("<body>{$this->content}</body>");
            $children = $document->getElementsByTagName('body')->item(0)->childNodes;
            $this->preview = '';
            $i = 0;
            foreach ($children as $child) {
                if (!empty($child) && get_class($child) !== "DOMText") {
                    $this->preview .= $document->saveHTML($child);
                    $i++;
                }
                if ($i > 3) break;
            }
            list(, $rawDate, $this->title) = $matches;
            $this->date = new DateTime($rawDate);
            $this->date_string = $this->date->format('F j, Y');
            $this->datetime = $this->date->format('Y-m-d');
        }

        public static function from_pattern($title_pattern)
        {
            $post_files = array_diff(scandir('content/blog/posts'), ['.', '..']);
            $file = array_pop($post_files);
            foreach ($post_files as $post_file)
                if (preg_match("/\d{8}-.*$title_pattern.*.html/i", $post_file))
                    $file = $post_file;
            return new self($file);
        }
    }