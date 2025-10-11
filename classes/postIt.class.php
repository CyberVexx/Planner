<?php

require 'color.class.php';

class PostIt
{
    public $id;
    public $title;
    public $description;
    public $content;
    public $date;

    public function __construct($id = null, $title = '', $description = '', $content = '', $date = '') {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;  
        $this->content = $content;
        $this->date = $date;
    }

    public function render()
    {
        if (empty($this->title)) {
            return;
        }

        echo "<div class='post-it'>
                <h2>$this->title</h2>
                <p>$this->description</p>
                <p>$this->content</p>
                <p>$this->date</p>
                <form method='post'>
                    <input name='postItId' type='hidden' value='$this->id'>
                    <button name='deletePostIt' type='submit'>Delete</button>
                </form>
            </div>";
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed|string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed|string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed|string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed|string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed|string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed|string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}