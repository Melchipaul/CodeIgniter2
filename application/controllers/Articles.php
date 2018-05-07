<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    /**
     *  On liste les articles
     */
    public function index() {
         $all_data = $this->article->get_data();
        foreach ($all_data as $data){
        $this->load->view('vue_articles',$data);
        }
    }
    
    public function view($id) {
        $this->article->article_id = $id;
        $this->article->load();
        $this->load->view('vue_article', $this->article);
        
    }
    
    public function add() {
        $this->load->view('article_form');
        
    }
    
    public function delete($id) {
        $this->article->article_id = $id;
        $this->article->delete();
        
    }
    
    public function calendar($id) {
        $this->article->article_id = $id;
        $this->article->load();
        $expl = explode('-', $this->article->article_modified);
        $data = array(
            $expl[2] => $this->config->base_url() .'articles/view' . $id
        );
        $this->load->library('calendar');
        echo $this->calendar->generate($expl[0],$expl[1],$data);
        
    }

}
