<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film_model extends Ci_model
{

    public function _construct()
    {
        parent::__construct();
        
    }

    public function get_network()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query_Net = $db2->get('network')->result_array();
        return $query_Net;
    }

    public function get_rating()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query_rate = $db2->get('rating')->result_array();
        return $query_rate;
    }

    public function get_film()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query_SerMov = $db2->select('*')->from('film')->get()->result_array();
        // $query_SerMov = "SELECT `film`.*,`link_series`.*,`link_movies`.* 
        //                      FROM `film` 
        //                     LEFT JOIN `link_series` ON `film`.`id` = `link_series`.`id`
        //                     LEFT JOIN `link_movies` ON `film`.`id` = `link_movies`.`id`
        //                     ORDER BY `film`.`title` DESC ";
        return $query_SerMov;

   }

   public function get_filmById($id)
   {
       $db2 = $this->load->database('db2', TRUE);
       $query_filmId = $db2->select('*')->from('film')->where('id',$id)->get()->row_array();
       return $query_filmId;
   }

   public function get_movies()
   {
       $db2 = $this->load->database('db2', TRUE);
       
       // $query_Mov = "SELECT `film`.*, MAX(`film`.`vote`),  
       //                 FROM `film`
       //              GROUP BY film.id HAVING `film`.`type` = 'movies' ORDER BY film.title DESC ";
       $query_Mov = $db2->select('film.*')->select_max('vote')->from('film')->group_by('id')->having('type','movies')->limit(5)->get()->result_array();
        return $query_Mov;
         
        // $query = $db2->query($query_Mov)->result_array();
        // return $query;

   }

   public function get_series()
   {
         $db2 = $this->load->database('db2', TRUE);
         $query_Ser = $db2->select('film.*')->select_max('vote')->from('film')->group_by('id')->having('type','series')->limit(5)->get()->result_array();
         return $query_Ser;
       
   }


   public function get_lang()
   {
    $db2 = $this->load->database('db2',TRUE);
    $query_Lang = $db2->get('language')->result_array();
    return $query_Lang;
   }


   public function addFilm()
   {

            $db2 = $this->load->database('db2',TRUE);
            $image = $_FILES['image']['name'];
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './version/images/film/';
            $this->load->library('upload',$config);
            if ( $this->upload->do_upload('image') ) {
                $upload_image =  $this->upload->data('file_name');
                   $data = [
                    'title' => htmlspecialchars($this->input->post('title', TRUE)),
                    'description' => htmlspecialchars($this->input->post('description', TRUE)),
                    'release_year' =>  htmlspecialchars($this->input->post('release_year', TRUE)),
                    'language' => $this->input->post('hide_lang', true),
                    'length' => htmlspecialchars($this->input->post('length', TRUE)),
                    'rating' =>  $this->input->post('rating',true),
                    'image' => $upload_image,
                    'network' => $this->input->post('network', true),
                    'type' => $this->input->post('type',true),
                    'vote' => htmlspecialchars($this->input->post('vote', TRUE)),
                    'release_date' => htmlspecialchars($this->input->post('release_date', TRUE)),
                    'last_update ' => time(),
            ];
                
                $db2->insert('film', $data);
                
            } else {
                echo $this->upload->display_errors();
            }
               
             
   }

   public function updateFilm($id)
   {
         $db2 = $this->load->database('db2',TRUE);
         $film_image = $db2->select('image')->from('film', ['id' => $id])->get()->row_array();
                    $title = htmlspecialchars($this->input->post('title', TRUE));
                    $description = htmlspecialchars($this->input->post('description', TRUE));
                    $release_year =  htmlspecialchars($this->input->post('release_year', TRUE));
                    $language = $this->input->post('up_lang', true);
                    $length = htmlspecialchars($this->input->post('length', TRUE));
                    $rating =  $this->input->post('rating',true);
                    $network = $this->input->post('network', true);
                    $type = $this->input->post('type',true);
                    $vote = htmlspecialchars($this->input->post('vote', TRUE));
                    $release_date = htmlspecialchars($this->input->post('release_date', TRUE));
                    $last_update = time();
        

         $image = $_FILES['image']['name'];
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './version/images/film/';

        if ( $this->upload->do_upload('image') ) {
            $old_image = $film_image['image'];

            if ($film_image) {
                unlink(FCPATH . 'version/image/film/' . $film_image);
            }
            $new_image = $this->upload->data('file_name');
            $db2->set('image', $new_image);
        }else {
            echo $this->upload->display_errors();
        }
        $db2->set( $title);
        $db2->set( $description);
        $db2->set( $release_year);
        $db2->set( $language);
        $db2->set( $length);
        $db2->set( $rating);
        $db2->set( $description);
        $db2->set( $network);
        $db2->set( $type);
        $db2->set( $vote);
        $db2->set( $release_date);
        $db2->set( $last_update);
        $db2->where('id', ['id' => $this->input->post('id')]);
        $db2->update('film', $data);
         
   }

}
