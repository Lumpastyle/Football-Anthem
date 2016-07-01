<?php

/**
 * Created by PhpStorm.
 * User: Lumi
 * Date: 21/06/2016
 */

namespace Model;

class PageRepository
{
    /**
     * @var \PDO
     */
    private $PDO;

    /**
     * PageRepository constructor.
     * @param \PDO $PDO
     */
    public function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    /**
     * @param $id
     * @param $type
     * @return bool|mixed
     */
    public function get($id, $type)
    {
        switch($type){
            case 'competition':
                return $this->getCompetitionById($id);
                break;
            case 'pays':
                return $this->getPaysById($id);
                break;
            case 'hymne':
                return $this->getHymneById($id);
                break;
            case 'quizz':
                return $this->getQuizzById($id);
                break;
            case 'populaire':
                return $this->getPopulaireById($id);
                break;
            default:
                return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCompetitionById($id){

        //

        $sql ="SELECT
                    `id`,
                    `name`,
                    `type`,
                    `date`,
                    `id_organisateur`,
                    `id_hymne`,
                    `id_image`,
                    `description`
                FROM
                    `competition`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getCompetitionByName($name){
        $sql ="SELECT
                    `id`,
                    `name`,
                    `type`,
                    `date`,
                    `id_organisateur`,
                    `id_hymne`,
                    `id_image`,
                    `description`
                FROM
                    `competition`
                WHERE
                    `name` = :name
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$name,\PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getNextAndPreviousFor($id){
        $sql ="SELECT
                    *
                FROM
                    `competition`
                ORDER BY
                    `date`
                DESC
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach ($result as $index => $date) {
            if ($date['id'] == $id) {
                if ($index == 0) {
                    $prev = null;
                } else {
                    $prev = $result[$index-1];
                }

                if ($index == count($result)) {
                    $next = null;
                } else {
                    $next = $result[$index+1];
                }

                return ['prev' => $prev, 'next' => $next];
            }
        }
    }

    public function getTimelineData()
    {
        $sql ="SELECT
                    c.id as id,
                    c.date as c_date,
                    c.type as c_type,
                    image.lien as c_image,
                    c.description as c_description,
                    h.chanteur as h_chanteur,
                    h.date as h_date,
                    pod.id_winner as c_gagnant,
                    pod.id_second as c_finaliste,
                    pod.id_semi_1 as c_semi_1,
                    pod.id_semi_2 as c_semi_2,
                    py2.name as pays_participant,
                    part.name as compe
                FROM
                    competition as c
                    JOIN hymne as h ON h.id = c.id_hymne
                    JOIN pays as py1 ON py1.id = c.id_organisateur
                    JOIN podium as pod ON pod.id_competition = c.id
                    JOIN image ON image.id = c.id_image
					JOIN participants as part ON part.id_competition = c.id
					JOIN pays as py2 ON part.id_pays = py2.id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getTimelineDataById($id)
    {
        $sql ="SELECT
                    c.id,
                    c.date as c_date,
                    c.type as c_type,
                    h.audio as c_audio,
                    h.auteur as c_hymne,
                    h.description as h_desc,
                    img1.lien as c_image,
                    c.description as c_description,
                    h.chanteur as h_chanteur,
                    h.date as h_date,
                    py1.name as orga,
                    py2.name as pays_participant,
                    part.name as compe,
                    img2.lien as gagnant_flag,
                    c.visuel as c_visuel,
                    pyw.name as c_gagnant,
                    pyf.name as c_finaliste,
                    pys1.name as c_semi_1,
                    pys2.name as c_semi_2

                FROM
                    competition as c
                    JOIN hymne as h ON h.id = c.id_hymne
                    JOIN pays as py1 ON py1.id = c.id_organisateur
                    JOIN podium as pod ON pod.id_competition = c.id
                    JOIN image as img1 ON img1.id = c.id_image
					JOIN participants as part ON part.id_competition = c.id
					JOIN pays as py2 ON part.id_pays = py2.id
                    JOIN pays as py3 ON py3.id = pod.id_winner
                    JOIN image as img2 ON py3.id_image = img2.id
                    JOIN pays as pyw ON pyw.id = pod.id_winner
                    JOIN pays as pyf ON pyf.id = pod.id_second
                    JOIN pays as pys1 ON pys1.id = pod.id_semi_1
                    JOIN pays as pys2 ON pys2.id = pod.id_semi_2
				WHERE
				    c.id = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function getTimelineDataByName($name)
    {
        $sql ="SELECT
                    c.id as id,
                    c.name,
                    c.date as c_date,
                    c.type as c_type,
                    image.lien as c_image,
                    c.description as c_description,
                    h.chanteur as h_chanteur,
                    h.date as h_date,
                    pod.id_winner as c_gagnant,
                    pod.id_second as c_finaliste,
                    pod.id_semi_1 as c_semi_1,
                    pod.id_semi_2 as c_semi_2,
                    py2.name as pays_participant,
                    part.name as compe
                FROM
                    competition as c
                    JOIN hymne as h ON h.id = c.id_hymne
                    JOIN pays as py1 ON py1.id = c.id_organisateur
                    JOIN podium as pod ON pod.id_competition = c.id
                    JOIN image ON image.id = c.id_image
					JOIN participants as part ON part.id_competition = c.id
					JOIN pays as py2 ON part.id_pays = py2.id
				WHERE
				    c.name = :name
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$name,\PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function getTimelinePopulaire()
    {
        $sql ="SELECT
                    c.id,
                    pop.name,
                    pop.audio,
                    pop.description
                FROM
                    competition as c
                    INNER JOIN populaire as pop ON c.id = pop.id_competition
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPaysById($id){
        $sql ="SELECT
                    `id`,
                    `name`,
                    `id_hymne`,
                    `nb_euro`,
                    `nb_world`,
                    `description`,
                    `id_image`
                FROM
                    `pays`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getHymneById($id){
        $sql ="SELECT
                    `id`,
                    `name`,
                    `date`,
                    `auteur`,
                    `chanteur`,
                    `description`,
                    `audio`
                FROM
                    `hymne`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getQuizzById($id){
        $sql ="SELECT
                    `id`,
                    `question`,
                    `reponse_1`,
                    `reponse_2`,
                    `reponse_3`,
                    `bonne_reponse`
                FROM
                    `quizz`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPopulaireById($id){
        $sql ="SELECT
                    `id`,
                    `name`,
                    `id_competition`,
                    `description`,
                    `audio`
                FROM
                    `populaire`
                WHERE
                    `id` = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function modifier($id, $data)
    {
        $sql ="UPDATE
                  `xxx`
               SET
                  `champ` = :champ
                WHERE
                  `id` = :id
                LIMIT
                  1
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':champ',$data->champ,\PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,\PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    /**
     * @param $id
     * @param $type
     * @return bool
     */
    public function supprimer($id, $type)
    {
        $sql="DELETE
              FROM
                `$type`
              WHERE
                `id` = :id
              LIMIT
                1
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id',$id,\PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererCompetition($data)
    {
        $sql ="INSERT INTO
                `competition`
                (
                      `name`,
                      `type`,
                      `date`,
                      `id_organisateur`,
                      `id_hymne`,
                      `id_image`,
                      `description`
                )
                VALUES
                (
                    :name,
                    :type,
                    :date,
                    :id_organisateur,
                    :id_hymne,
                    :id_image,
                    :description
                )
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':type',$data->type,\PDO::PARAM_STR);
        $stmt->bindParam(':date',$data->date,\PDO::PARAM_STR);
        $stmt->bindParam(':id_organisateur',$data->id_organisateur,\PDO::PARAM_STR);
        $stmt->bindParam(':id_hymne',$data->id_hymne,\PDO::PARAM_STR);
        $stmt->bindParam(':id_image',$data->id_image,\PDO::PARAM_STR);
        $stmt->bindParam(':description',$data->description,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererPays($data)
    {
        $sql ="INSERT INTO
                `pays`
                (
                      `name`,
                      `id_hymne`,
                      `nb_euro`,
                      `nb_world`,
                      `win_euro`,
                      `win_world`,
                      `description`,
                      `id_image`
                )
                VALUES
                (
                    :name,
                    :id_hymne,
                    :nb_euro,
                    :nb_world,
                    :win_euro,
                    :win_world,
                    :description,
                    :id_image
                )
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':id_hymne',$data->id_hymne,\PDO::PARAM_STR);
        $stmt->bindParam(':nb_euro',$data->nb_euro,\PDO::PARAM_STR);
        $stmt->bindParam(':nb_world',$data->nb_world,\PDO::PARAM_STR);
        $stmt->bindParam(':win_euro',$data->win_euro,\PDO::PARAM_STR);
        $stmt->bindParam(':win_world',$data->win_world,\PDO::PARAM_STR);
        $stmt->bindParam(':description',$data->description,\PDO::PARAM_STR);
        $stmt->bindParam(':id_image',$data->id_image,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererHymne($data)
    {
        $sql ="INSERT INTO
                `hymne`
                (
                      `name`,
                      `date`,
                      `auteur`,
                      `chanteur`,
                      `description`,
                      `audio`
                )
                VALUES
                (
                    :name,
                    :date,
                    :auteur,
                    :chanteur,
                    :description,
                    :audio
                )
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':date',$data->date,\PDO::PARAM_STR);
        $stmt->bindParam(':auteur',$data->auteur,\PDO::PARAM_STR);
        $stmt->bindParam(':chanteur',$data->chanteur,\PDO::PARAM_STR);
        $stmt->bindParam(':description',$data->description,\PDO::PARAM_STR);
        $stmt->bindParam(':audio',$data->audio,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererPodium($data)
    {
        $sql ="INSERT INTO
                `podium`
                (
                      `name`,
                      `id_competition`,
                      `id_winner`,
                      `id_second`,
                      `id_semi_1`,
                      `id_semi_2`
                )
                VALUES
                (
                    :name,
                    :id_competition,
                    :id_winner,
                    :id_second,
                    :id_semi_1,
                    :id_semi_2
                )
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':id_competition',$data->id_winner,\PDO::PARAM_STR);
        $stmt->bindParam(':id_winner',$data->id_winner,\PDO::PARAM_STR);
        $stmt->bindParam(':id_second',$data->id_second,\PDO::PARAM_STR);
        $stmt->bindParam(':id_semi_1',$data->id_semi_1,\PDO::PARAM_STR);
        $stmt->bindParam(':id_semi_2',$data->id_semi_2,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererImage($data)
    {
        $sql ="INSERT INTO
                `image`
                (
                      `name`,
                      `lien`
                )
                VALUES
                (
                    :name,
                    :lien
                )
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':lien',$data->lien,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererParticipants($data)
    {
        $sql ="INSERT INTO
                `participants`
                (
                      `name`,
                      `id_competition`,
                      `id_pays`
                )
                VALUES
                (
                    :name,
                    :id_competition,
                    :id_pays
                )
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':id_competition',$data->id_competition,\PDO::PARAM_STR);
        $stmt->bindParam(':id_pays',$data->id_pays,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererQuizz($data)
    {
        $sql ="INSERT INTO
                `quizz`
                (
                      `question`,
                      `reponse_1`,
                      `reponse_2`,
                      `reponse_3`,
                      `bonne_reponse`
                )
                VALUES
                (
                    :question,
                    :reponse_1,
                    :reponse_2,
                    :reponse_3,
                    :bonne_reponse
                )
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':question',$data->question,\PDO::PARAM_STR);
        $stmt->bindParam(':reponse_1',$data->reponse_1,\PDO::PARAM_STR);
        $stmt->bindParam(':reponse_2',$data->reponse_2,\PDO::PARAM_STR);
        $stmt->bindParam(':reponse_3',$data->reponse_3,\PDO::PARAM_STR);
        $stmt->bindParam(':bonne_reponse',$data->bonne_reponse,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insererPopulaire($data)
    {
        $sql ="INSERT INTO
                `populaire`
                (
                      `name`,
                      `id_competition`,
                      `description`,
                      `audio`
                )
                VALUES
                (
                    :name,
                    :id_competition,
                    :description,
                    :audio
                )
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':id_competition',$data->id_competition,\PDO::PARAM_STR);
        $stmt->bindParam(':description',$data->description,\PDO::PARAM_STR);
        $stmt->bindParam(':audio',$data->audio,\PDO::PARAM_STR);
        $stmt->execute();

        return 1;
    }

    /**
     * @return array
     */
    public function findAllCompetition()
    {
        $sql ="SELECT
                    `id`,
                    `name`,
                    `type`,
                    `date`,
                    `id_organisateur`,
                    `id_hymne`,
                    `id_image`,
                    `description`
                FROM
                    `competition`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findAllPays()
    {
        $sql ="SELECT
                    `id`,
                    `name`,
                    `id_hymne`,
                    `nb_euro`,
                    `nb_world`,
                    `win_euro`,
                    `win_world`,
                    `description`,
                    `id_image`
                FROM
                    `pays`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findAllHymne()
    {
        $sql ="SELECT
                    `id`,
                    `name`,
                    `date`,
                    `auteur`,
                    `chanteur`,
                    `description`,
                    `audio`
                FROM
                    `hymne`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findAllImage()
    {
        $sql ="SELECT
                    `id`,
                    `name`,
                    `lien`
                FROM
                    `image`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findAllPodium()
    {
        $sql ="SELECT
                    `id`,
                    `name`,
                    `id_competition`,
                    `id_winner`,
                    `id_second`,
                    `id_semi_1`,
                    `id_semi_2`
                FROM
                    `podium`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findAllParticipants()
    {
        $sql ="SELECT
                    `id`,
                    `name`,
                    `id_competition`,
                    `id_pays`
                FROM
                    `participants`
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findAllQuizz()
    {
        $sql ="SELECT
                    `id`,
                    `question`,
                    `reponse_1`,
                    `reponse_2`,
                    `reponse_3`,
                    `bonne_reponse`
                FROM
                    `quizz`
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findAllPopulaire()
    {
        $sql ="SELECT
                    `id`,
                    `name`,
                    `id_competition`,
                    `description`,
                    `audio`
                FROM
                    `populaire`
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function findFiveQuizz()
    {
        $sql ="SELECT
                    `id`,
                    `question`,
                    `reponse_1`,
                    `reponse_2`,
                    `reponse_3`,
                    `bonne_reponse`
                FROM
                    `quizz`
                ORDER BY
                    rand()
                LIMIT
                    5
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
