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
        $stmt->bindParam(':question',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':reponse_1',$data->id_competition,\PDO::PARAM_STR);
        $stmt->bindParam(':reponse_2',$data->id_competition,\PDO::PARAM_STR);
        $stmt->bindParam(':reponse_3',$data->id_competition,\PDO::PARAM_STR);
        $stmt->bindParam(':bonne_reponse',$data->id_pays,\PDO::PARAM_STR);
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
                `quizz`
                (
                      `name`,
                      `description`,
                      `audio`
                )
                VALUES
                (
                    :name,
                    :description,
                    :audio
                )
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':description',$data->id_competition,\PDO::PARAM_STR);
        $stmt->bindParam(':audio',$data->id_competition,\PDO::PARAM_STR);
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
                    `description`,
                    `audio`
                FROM
                    `populaire`
                ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}