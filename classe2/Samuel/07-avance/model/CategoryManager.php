<?php

// Création de namespace
namespace model;

use PDO;
use Exception;

class CategoryManager implements ManagerInterface, CrudInterface {

    private PDO $db;

    // Implémenter à cause de Manager Interface
    public function __construct(PDO $connect){
        $this->db = $connect;
    }

    // Appel du trait pour slugifier le name
    use SlugifyTrait;

    /*
    * méthodes implémentées à cause de CrudInterface
    * AbstractMapping est le parent de tous nos
    * mapping, c'est-à-dire données où on applique un CRUD
    * dans notre cas une bdd MySQL
    */

    /*
     * Create
     */
    public function create(AbstractMapping $data): bool|string
    {
        $sql = "INSERT INTO `category` (`category_name`, `category_slug`, `category_desc`) VALUES (?,?,?)";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute([
                $data->getCategoryName(),
                $data->getCategorySlug(),
                $data->getCategoryDesc()
            ]);
            return true;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    /*
     * Read
     */
    public function readById(int $id): bool|AbstractMapping
    {
        $sql = "SELECT * FROM `category` WHERE `id` = ?";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(1,$id,PDO::PARAM_INT);
        try{
            $prepare->execute();
            // si pas de catégorie récupérée
            if($prepare->rowCount()!==1)
                return false;
            // si on a une catégorie
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
            // création de l'instance de type CategoryMapping
            $category = new CategoryMapping($result);
            $prepare->closeCursor();
            return $category;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `category`";
        if ($orderDesc === true)
            $sql .= "ORDER BY `id` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item) {
            // Réutilisation des setters
            $result[] = new CategoryMapping($item);
        }
        $query->closeCursor();
        return $result;

    }

    /*
     * Update
     */
    public function update(int $id, AbstractMapping $data): bool|string
    {
        // on vérifie que l'id ($id = get et $data->getId() vient du POST) de la catégorie n'a pas été modifié par l'utilisateur
        if ($id != $data->getId())
            return "Pas bien de toucher à l'id !";
        // on peut faire l'update
        $sql = "UPDATE `category` SET 
                     `category_name`= :name,
                     `category_slug`= :slug,
                     `category_desc`= :desc
                WHERE `id` = :id;      
                     ";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue("id", $data->getId(), PDO::PARAM_INT);
        $prepare->bindValue("name", $data->getCategoryName());
        $prepare->bindValue("slug", $data->getCategorySlug());
        $prepare->bindValue("desc", $data->getCategoryDesc());
        try{
            $prepare->execute();
            return true;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    /*
     * Delete
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM `category` WHERE `id`=?";
        $prepare = $this->db->prepare($sql);
        try{
            $prepare->execute([$id]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
}
