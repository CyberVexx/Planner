<?php

class PostItManager
{
    private $postIts;
    private $lastId;

    public function __construct() {
        $this->postIts = isset($_SESSION['postIts']) ? $_SESSION['postIts'] : [];
        $this->lastId = isset($_SESSION['lastPostItId']) ? $_SESSION['lastPostItId'] : 0;
    }

    public function applyForm($postIt, $formData) {
        $postIt->setTitle($formData['title']);
        $postIt->setDescription($formData['description']);
        $postIt->setContent($formData['content']);
        $postIt->setDate($formData['date']);
        return $postIt;
    }

    public function addPostIt($postIt) {
        $this->lastId++;
        $postIt->setId($this->lastId);
        $this->postIts[] = $postIt;

        $this->applyArrayToSession();
        $_SESSION['lastPostItId'] = $this->lastId;
    }

    public function editPostIt($postItId, $formData) {

        foreach ($this->postIts as $existingPostIt) {
            if ($existingPostIt->getId() === $postItId) {
                $this->applyForm($existingPostIt, $formData);
                break;
            }
        }

        $this->applyArrayToSession();
    }

    public function removePostIt($postItId) {
        $this->postIts = array_values(array_filter($this->postIts, function($p) use ($postItId) {
            return $p->getId() !== $postItId;
        }));
        var_dump($this->postIts);
        $this->applyArrayToSession();
    }


    private function applyArrayToSession() {
        $_SESSION['postIts'] = $this->postIts;
    }

    /**
     * @return array|mixed
     */
    public function getPostIts()
    {
        return $this->postIts;
    }

    /**
     * @return int|mixed
     */
    public function getLastId()
    {
        return $this->lastId;
    }
}

