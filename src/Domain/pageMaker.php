<?php

namespace ProjetPHP\Domain;

class pageMaker 
{
    /**
     * Sperate full text's article in differents pages
     *
     * @param the full text of a chapter
     * @return $pages array[] with page seperated
     */

    public function createPage($fullText) {

        $fullTextWrap = wordwrap($fullText, 2200, '----', false);
        $pages = explode('----', $fullTextWrap); 

        return $pages;
    }
}

