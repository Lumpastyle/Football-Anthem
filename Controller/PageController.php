<?php

/**
 * Created by PhpStorm.
 * User: Lumi
 * Date: 21/06/2016
 */

namespace Controller;
use Model\PageRepository;

class PageController
{
    /**
     * PageController constructor.
     * @param \PDO $PDO
     */
    public function __construct(\PDO $PDO)
    {
        $this->repository = new PageRepository($PDO);
    }

    public function ajoutAction()
    {
        $type = $_GET['type'];

        switch($type){
            case 'competition':
                $pays = $this->repository->findAllPays();
                $hymne = $this->repository->findAllHymne();
                $image = $this->repository->findAllImage();
                require "View/admin_ajouter_competition.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    $new = (object) array(
                        'name' => $_POST['name'],
                        'type' => $_POST['type'],
                        'date' => $_POST['date'],
                        'id_organisateur' => $_POST['id_organisateur'],
                        'id_hymne' => $_POST['id_hymne'],
                        'id_image' => $_POST['id_image'],
                        'description' => $_POST['description']
                    );
                    $this->repository->insererCompetition($new);
                }
                break;
            case 'pays':
                $hymne = $this->repository->findAllHymne();
                $image = $this->repository->findAllImage();
                require "View/admin_ajouter_pays.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    $new = (object) array(
                        'name' => $_POST['name'],
                        'id_hymne' => $_POST['id_hymne'],
                        'nb_euro' => $_POST['nb_euro'],
                        'nb_world' => $_POST['nb_world'],
                        'win_euro' => $_POST['win_euro'],
                        'win_world' => $_POST['win_world'],
                        'description' => $_POST['description'],
                        'id_image' => $_POST['id_image']
                    );
                    $this->repository->insererPays($new);
                }
                break;
            case 'hymne':
                require "View/admin_ajouter_hymne.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    $new = (object) array(
                        'name' => $_POST['name'],
                        'date' => $_POST['date'],
                        'auteur' => $_POST['auteur'],
                        'chanteur' => $_POST['chanteur'],
                        'description' => $_POST['description'],
                        'audio' => $_POST['audio']
                    );
                    $this->repository->insererHymne($new);
                }
                break;
            case 'participants':
                $competition = $this->repository->findAllCompetition();
                $pays = $this->repository->findAllPays();
                require "View/admin_ajouter_participants.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    foreach($_POST['id_pays'] as $data){
                        $new = (object) array(
                            'name' => $_POST['name'],
                            'id_competition' => $_POST['id_competition'],
                            'id_pays' => $data
                        );
                        $this->repository->insererParticipants($new);
                    }
                }
                break;
            case 'podium':
                $competition = $this->repository->findAllCompetition();
                $pays = $this->repository->findAllPays();
                require "View/admin_ajouter_podium.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    $new = (object) array(
                        'name' => $_POST['name'],
                        'id_competition' => $_POST['id_competition'],
                        'id_winner' => $_POST['id_winner'],
                        'id_second' => $_POST['id_second'],
                        'id_semi_1' => $_POST['id_semi_1'],
                        'id_semi_2' => $_POST['id_semi_2']
                    );
                    $this->repository->insererPodium($new);
                }
                break;
            case 'image':
                require "View/admin_ajouter_image.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    $new = (object) array(
                        'name' => $_POST['name'],
                        'lien' => $_POST['lien']
                    );
                    $this->repository->insererImage($new);
                }
                break;
            default:
                return false;
        }

        return 1;

    }

    public function supprimerAction()
    {
        $id = $_GET['id'];
        $type= $_GET['type'];
        $this->repository->supprimer($id, $type);
        header('location:index.php');
    }

    public function modifierAction()
    {
        $id = $_GET['id'];
        $type = $_GET['type'];
        $data = $this->repository->get($id, $type);
        require "View/_admin_modifier.php";

        if(count($_POST) === 0) {
            // ne rien faire
        } else {
            // traitement de la requete
            $newpost = (object) array(
                'message' => $_POST['message']
            );
            $this->repository->modifier($id, $newpost);
        }
    }

    public function listeAction()
    {
        // recuperer les donnees
        $compe = $this->repository->findAllCompetition();
        $pays = $this->repository->findAllPays();
        $hymne = $this->repository->findAllHymne();
        $participants = $this->repository->findAllParticipants();
        $podium = $this->repository->findAllPodium();
        $image = $this->repository->findAllImage();
        // afficher les donnees
        include "View/admin_list.php";
    }

}