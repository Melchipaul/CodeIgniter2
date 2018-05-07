<?php

class Article extends MY_Model {

    public $article_id;
    public $article_name;
    public $article_body;
    public $article_modified;
    public $article_created;
    
    public function get_db_table(){
        return 'article';
    }
    
    public function get_db_table_pk() {
        return 'article_id';
    }
    
    public function  save(){
        $this->article_modified = date('Y-m-d H:i:s');
        
        return parent::save();
    }

   

}
