<?php

namespace ProjetPHP\DAO;

use ProjetPHP\Domain\Chapter;

class ChapterDAO extends DAO
{
    /**
     * Returns a Chapter matching the supplied id.
     *
     * @param integer $id
     *
     * @return \ProjetPHP\Domain\Chapter|throws an exception if no matching chapter is found
     */
    public function find($id) {
        $sql = "SELECT * FROM chapter WHERE chap_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No chapter matching id " . $id);
    }

    /**
     * Returns last chapter post.
     *
     * @return object last chapter
     */
    public function findLast() {
        $sql = "SELECT * FROM chapter ORDER BY chap_id DESC LIMIT 0,1";
        $row = $this->getDb()->fetchAssoc($sql);

        if ($row)
            return $this->buildDomainObject($row);
        else
            return false;
    }


    /**
     * Return a array with a list of all chapter, sorted by date (most recent first).
     *
     * @return array A list of all chapter.
     */
    public function findAll() {
        $sql = "SELECT * FROM chapter ORDER BY chap_id";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $chapters = array();

        if ($result) {
            foreach ($result as $row) {
                $chapterId = $row['chap_id'];
                $chapters[$chapterId] = $this->buildDomainObject($row);
            }
            return $chapters;
        }
            
        else
            return false;
        
    }

    /**
     * Saves an chapter into the database.
     *
     * @param \ProjetPHP\Domain\chapter $chapter The chapter to save
     */
    public function save(Chapter $chapter) {
        $chapterData = array(
            'chap_title' => $chapter->getTitle(),
            'chap_content' => $chapter->getContent(),
            'chap_date' => $chapter->getNowDate(),
            );

        if ($chapter->getId()) {
            // The chapter has already been saved : update it
            $this->getDb()->update('chapter', $chapterData, array('chap_id' => $chapter->getId()));
        } else {
            // The chapter has never been saved : insert it
            $this->getDb()->insert('chapter', $chapterData);
            // Get the id of the newly created chapter and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $chapter->setId($id);
        }
    }

    /**
     * Removes an chapter from the database.
     *
     * @param integer $id The chapter id.
     */
    public function delete($id) {
        // Delete the chapter
        $this->getDb()->delete('chapter', array('chap_id' => $id));
        $this->getDb()->exec('ALTER TABLE chapter AUTO_INCREMENT = 1');
    }


    /**
     * Creates a Chapter object based on a DB row.
     *
     * @param array $row The DB row containing Chapter data.
     * @return \ProjetPHP\Domain\Chapter
     */
    protected function buildDomainObject(array $row) {
        $chapter = new Chapter();
        $chapter->setId($row['chap_id']);
        $chapter->setTitle($row['chap_title']);
        $chapter->setContent($row['chap_content']);
        $chapter->setDate($row['chap_date']);
        return $chapter;
    }
}


