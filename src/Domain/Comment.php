<?php

namespace ProjetPHP\Domain;

class Comment 
{
    /**
     * Comment id.
     *
     * @var integer
     */
    private $id;

    /**
     * Comment author.
     *
     * @var \ProjetPHP\Domain\User
     */
    private $user;

    /**
     * Comment content.
     *
     * @var integer
     */
    private $content;

    /**
     * Associated chapter.
     *
     * @var \ProjetPHP\Domain\Chapter
     */
    private $chapter;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser(User $user) {
        $this->user = $user;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getChapter() {
        return $this->chapter;
    }

    public function setChapter(Chapter $chapter) {
        $this->chapter = $chapter;
        return $this;
    }
}