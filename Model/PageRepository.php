<?php

/**
 * Created by PhpStorm.
 * User: Lumi
 * Date: 16/06/2016
 * Time: 14:34
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
     * @return \stdClass|bool
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
                    `id_participants`,
                    `id_organisateur`,
                    `id_podium`,
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
     * @param $data
     * @return bool
     */
    public function modifier($id, $data)
    {
        $sql ="UPDATE
                  `livre_or`
               SET
                  `message` = :message
                WHERE
                  `id` = :id
                LIMIT
                  1
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':message',$data->message,\PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,\PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    /**
     * @param $id
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
                      `id_participants`,
                      `id_organisateur`,
                      `id_podium`,
                      `id_hymne`,
                      `id_image`,
                      `description`
                )
                VALUES
                (
                    :name,
                    :type,
                    :date,
                    :id_participants,
                    :id_organisateur,
                    :id_podium,
                    :id_hymne,
                    :id_image,
                    :description
                )
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':type',$data->type,\PDO::PARAM_STR);
        $stmt->bindParam(':date',$data->date,\PDO::PARAM_STR);
        $stmt->bindParam(':id_participants',$data->id_participants,\PDO::PARAM_STR);
        $stmt->bindParam(':id_organisateur',$data->id_organisateur,\PDO::PARAM_STR);
        $stmt->bindParam(':id_podium',$data->id_podium,\PDO::PARAM_STR);
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
                      `id_winner`,
                      `name`,
                      `id_second`,
                      `id_semi_1`,
                      `id_semi_2`
                )
                VALUES
                (
                    :id_winner,
                    :name,
                    :id_second,
                    :id_semi_1,
                    :id_semi_2
                )
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id_winner',$data->id_winner,\PDO::PARAM_STR);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
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
        $cp=1;
        $chaine = "id_participant_".$cp;

        $sql ="INSERT INTO
                `participants`
                (";
        for($cp=1; $cp<=32; $cp++){
            $sql.="`".$chaine."`";
            if($cp != 32){
                $sql.=",";
            }
        }
        $sql.= ")
                VALUES
                ( :name,";
        for($cp=1; $cp<=32; $cp++){
            $sql.=":".$chaine;
            if($cp != 32){
                $sql.=",";
            }
        }
        $sql.=")";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':name',$data->name,\PDO::PARAM_STR);
        $stmt->bindParam(':type',$data->type,\PDO::PARAM_STR);
        $stmt->bindParam(':date',$data->date,\PDO::PARAM_STR);
        $stmt->bindParam(':id_participants',$data->id_participants,\PDO::PARAM_STR);
        $stmt->bindParam(':id_organisateur',$data->id_organisateur,\PDO::PARAM_STR);
        $stmt->bindParam(':id_podium',$data->id_podium,\PDO::PARAM_STR);
        $stmt->bindParam(':id_hymne',$data->id_hymne,\PDO::PARAM_STR);
        $stmt->bindParam(':id_image',$data->id_image,\PDO::PARAM_STR);
        $stmt->bindParam(':description',$data->description,\PDO::PARAM_STR);
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
                    `id_participants`,
                    `id_organisateur`,
                    `id_podium`,
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
                    `lien`
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
        $cp=1;
        $chaine = "id_participant_".$cp;

        $sql ="SELECT
                    `id`,
                    `name`,";
        for($cp=1; $cp<=32; $cp++){
            $sql.="`".$chaine."`";
            if($cp != 32){
                $sql.=",";
            }
        }
        $sql.="FROM
                    `participants`";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}