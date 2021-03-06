<?php

use ts\tournament\TournamentManager;
use ts\tournament\TournamentTeamManager;

class AdminTournamentsController extends MvcAdminController
{

    var $default_columns = array('name', 'date', 'serie' => array('value_method' => 'admin_serie_name'));

    public function add()
    {
        $this->set_series();
        $this->set_location();
        $this->set_responsible();
        $this->create_or_save();
    }

    public function open_registration()
    {
        $this->verify_id_param();
        $this->set_object();
        $this->object->open_for_registration = 1;
        $this->__internal__save($this->object);

        $url = MvcRouter::admin_url(array('controller' => 'results', 'action' => 'edit_result', 'id' => $this->object->id));
        $this->redirect($url);
    }

    public function close_registration()
    {
        $this->verify_id_param();
        $this->set_object();
        $this->object->open_for_registration = 0;
        $this->__internal__save($this->object);

        $url = MvcRouter::admin_url(array('controller' => 'results', 'action' => 'edit_result', 'id' => $this->object->id));
        $this->redirect($url);
    }

    private  function __internal__save($object) {
        //TODO: This should not be hardcoded
        $fields = array('id', 'name', 'serie_id', 'date', 'location_id', 'details', 'final_seeding',
            'price', 'tournament_responsible_id', 'maximum_teams', 'open_for_registration');
        $data = array();
        foreach($fields as $field):
            $data[$field] = $object->$field;
        endforeach;
        $responds = $this->model->save($data);
    }

    public function edit()
    {
        $this->verify_id_param();
        $this->set_series();
        $this->set_responsible();
        $this->set_location();
        $this->set_object();
        $this->create_or_save();
    }


    private function set_series()
    {
        $this->load_model('Series');
        $series = $this->Series->find(array('selects' => array('id', 'name')));
        $this->set('series', $series);
    }

    private function set_location()
    {
        $this->load_model('Location');
        $locations = $this->Location->find(array('selects' => array('id', 'name')));
        $this->set('locations', $locations);
    }

    private function set_responsible()
    {
        $this->load_model('TournamentResponsible');
        $tournamentResponsibles = $this->TournamentResponsible->find(array('selects' => array('id', 'name')));
        $this->set('tournamentResponsible', $tournamentResponsibles);
    }

    public function admin_serie_name($object)
    {
        return empty($object->series) ? null : $object->series->name;
    }

    public function results()
    {
        $tournaments_model = mvc_model("Tournament");
        $all_tournaments = $tournaments_model->find();
        $options = array('locals' => array('tournaments' => $all_tournaments));
        $this->render_view("admin/tournaments/choose_tournament", $options);
    }

}

?>