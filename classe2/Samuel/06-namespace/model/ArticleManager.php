<?php
// création du namespace
namespace model;

use PDO;

class ArticleManager implements ManagerInterface, CrudInterface
{
    private PDO $db;

    // implémenté à cause de MangerInterface
    public function __construct(PDO $connect){
        $this->db = $connect;
    }

    // Appel du trait Slugify pour slugifier le titre
    use SlugifyTrait;


    /*
     * méthodes implémentées à cause de CrudInterface
     */
    public function create(AbstractMapping $data)
    {
        // TODO: Implement create() method.
    }

    public function readById(int $id): bool|AbstractMapping
    {
        // TODO: Implement readById() method.
    }

    // récupération de tous nos articles
    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` ";
        if($orderDesc===true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }

    public function update(int $id, AbstractMapping $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    /*
     * Nos méthodes n'existant pas dans l'interface
     */

    // on souhaite ne récupérer que les articles visibles
    public function readAllVisible(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` WHERE `article_visibility`=1 ";
        if($orderDesc===true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }
}