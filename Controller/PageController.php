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

    public function homeAction()
    {
        $route = "home";
        require "View/home.php";
    }
    public function timelineAction()
    {
        $route = "timeline";
        $request = $_GET;

        // récupère le nom de la compétition
        if(isset($request['name'])) {
          $name = $request['name'];
        } else {
          $name = "euro_2016";
        }

        // récupérère la compétition par le nom
        $competition = $this->repository->getCompetitionByName($name);

        $populaire = $this->repository->getTimelinePopulaire($competition->id);
        $competition = $this->repository->getTimelineDataById($competition->id);



        // récupération de la compétion précédente et suivante à notre compétition actuelle.
        $prevAndNext = $this->repository->getNextAndPreviousFor($competition[0]['id']);
        $competition[0]['prev'] = $prevAndNext['prev'];
        $competition[0]['next'] = $prevAndNext['next'];
        $competition[0]['populaire'] = $populaire;

        require "View/timeline.php";
    }

    public function getCompetition($id)
    {
        $route = "competition";
        $competition = $this->repository->getCompetitionById($id);

        $populaire = $this->repository->getTimelinePopulaire($competition->id);
        
        $competition = $this->repository->getTimelineDataById($competition->id);



        // récupération de la compétion précédente et suivante à notre compétition actuelle.
        $prevAndNext = $this->repository->getNextAndPreviousFor($competition[0]['id']);
        $competition[0]['prev'] = $prevAndNext['prev'];
        $competition[0]['next'] = $prevAndNext['next'];
        $competition[0]['populaire'] = $populaire;

        $response = $competition;

        require "View/response.php";
    }

    public function datesAction()
    {
        $route = "dates";

        $competition = $this->repository->findAllCompetition();
        //competition_date
        require "View/dates.php";
    }
    public function paysAction()
    {
        $route = "pays";
        //pays join hymne join image
        $countries = $this->repository->getAllCountries();
        require "View/pays.php";
    }

    public function getPays($name)
    {
        $response = [];
        $pays = $this->repository->getPaysByName($name);

        if($pays == false) {
            $response['type'] = "error";
            $response['message'] = "Pays non référencé";
        } else {
            $response['type'] = "success";
            $response['pays'] = $pays[0];
        }
        echo json_encode($response);
    }
    public function quizzAction()
    {
        $route = "quizz";
        $quizz = $this->repository->findFiveQuizz();
        //quizz
        require "View/quizz.php";
    }

    public function getGoodAnswer($answer, $id_question)
    {
        $response = [];

        $question = $this->repository->getQuizzById($id_question);
        if($question->bonne_reponse == $answer) {
            $response['is_good'] = true;
        } else {
            $response['is_good'] = false;
        }

        $response['bonne_reponse'] = $question->bonne_reponse;
        echo json_encode($response);
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
            case 'quizz':
                require "View/admin_ajouter_quizz.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    $new = (object) array(
                        'question' => $_POST['question'],
                        'reponse_1' => $_POST['reponse_1'],
                        'reponse_2' => $_POST['reponse_2'],
                        'reponse_3' => $_POST['reponse_3'],
                        'bonne_reponse' => $_POST['bonne_reponse']
                    );
                    $this->repository->insererQuizz($new);
                }
                break;
            case 'populaire':
                $competition = $this->repository->findAllCompetition();
                require "View/admin_ajouter_populaire.php";
                if(count($_POST) === 0) {
                    // ne rien faire
                } else {
                    // traitement de la requete
                    $new = (object) array(
                        'name' => $_POST['name'],
                        'id_competition' => $_POST['id_competition'],
                        'description' => $_POST['description'],
                        'audio' => $_POST['audio']
                    );
                    $this->repository->insererPopulaire($new);
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
        $quizz = $this->repository->findAllQuizz();
        $populaire = $this->repository->findAllPopulaire();
        // afficher les donnees
        include "View/admin_list.php";
    }

}
