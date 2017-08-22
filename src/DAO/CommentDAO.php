<?php

namespace ProjetPHP\DAO;

use ProjetPHP\Domain\Comment;

class CommentDAO extends DAO 
{
    /**
     * @var \ProjetPHP\DAO\ChapterDAO
     */
    private $chapterDAO;

    /**
     * @var \ProjetPHP\DAO\UserDAO
     */
    private $userDAO;

    public function setChapterDAO(ChapterDAO $chapterDAO) {
        $this->chapterDAO = $chapterDAO;
    }


    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }

    /**
     * Returns a comment matching the supplied id.
     *
     * @param integer $id The comment id
     *
     * @return \ProjetPHP\Domain\Comment|throws an exception if no matching comment is found
     */
    public function find($id) {
        $sql = "SELECT * FROM comment WHERE com_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de commentaire correspondant à l'id : " . $id);
    }

    /**
     * Return a list of all comments for a chapter, sorted by date (most recent last).
     *
     * @param integer $chapterId The comment id.
     *
     * @return array A list of all comments for the chapter.
     */
    public function findAllByChapter($chapterId) {
        // The associated chapter is retrieved only once
        $chapter = $this->chapterDAO->find($chapterId);

        // chap_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "SELECT com_id, com_content, com_user FROM comment WHERE com_chap_id=? ORDER BY com_id DESC";
        $result = $this->getDb()->fetchAll($sql, array($chapterId));

        // Convert query result to an array of domain objects
        $comments = array();
        foreach ($result as $row) {
            $comId = $row['com_id'];
            $comment = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $comment->setChapter($chapter);
            $comments[$comId] = $comment;
        }
        return $comments;
    }

    /**
     * Returns a list of all comments, sorted by date (most recent first).
     *
     * @return array A list of all comments.
     */
    public function findAll() {
        $sql = "SELECT * FROM comment ORDER BY com_id DESC";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['com_id'];
            $entities[$id] = $this->buildDomainObject($row);
        }
        return $entities;
    }

    /**
     * Saves a comment into the database.
     *
     * @param \ProjetPHP\Domain\Comment $comment The comment to save
     */
    public function save(Comment $comment) {
        $commentData = array(
            'com_chap_id' => $comment->getChapter()->getId(),
            'com_user' => $comment->getUser()->getId(),
            'com_content' => $comment->getContent()
            );

        if ($comment->getId()) {
            // The comment has already been saved : update it
            $this->getDb()->update('comment', $commentData, array('com_id' => $comment->getId()));
        } else {
            // The comment has never been saved : insert it
            $this->getDb()->insert('comment', $commentData);
            // Get the id of the newly created comment and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $comment->setId($id);
        }
    }

    /**
     * Removes a comment from the database.
     *
     * @param @param integer $id The comment id
     */
    public function delete($id) {
        // Delete the comment
        $this->getDb()->delete('comment', array('com_id' => $id));
    }

    /**
     * Removes all comments for a user
     *
     * @param integer $userId The id of the user
     */
    public function deleteAllByUser($userId) {
        $this->getDb()->delete('comment', array('com_user' => $userId));
    }

    /**
     * Removes all comments for a chapter
     *
     * @param $chapterId The id of the chapter
     */
    public function deleteAllByChapter($chapterId) {
        $this->getDb()->delete('comment', array('com_chap_id' => $chapterId));
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \ProjetPHP\Domain\Comment
     */
    protected function buildDomainObject(array $row) {
        $comment = new Comment();
        $comment->setId($row['com_id']);
        $comment->setContent($row['com_content']);

        if (array_key_exists('com_chap_id', $row)) {
            // Find and set the associated chapter
            $chapterId = $row['com_chap_id'];
            $chapter = $this->chapterDAO->find($chapterId);
            $comment->setChapter($chapter);
        }
        
        if (array_key_exists('com_user', $row)) {
            // Find and set the associated author
            $userId = $row['com_user'];
            $user = $this->userDAO->find($userId);
            $comment->setUser($user);
        }

        return $comment;
    }
}