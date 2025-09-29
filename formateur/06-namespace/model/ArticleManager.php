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

    /*
     * méthodes implémentées à cause de CrudInterface
     */
    public function create(AbstractMapping $data)
    {
        // Génération du slug
        if (method_exists($data, 'getArticleTitle') && method_exists($data, 'setArticleSlug')) {
            // Utilisation du trait SlugifyTrait
            $slug = (new class { use SlugifyTrait; })->slugify($data->getArticleTitle());
            $data->setArticleSlug($slug);
        }
        $sql = "INSERT INTO article (article_title, article_slug, article_text, article_date, article_visibility) VALUES (:title, :slug, :text, :date, :visibility)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':title', $data->getArticleTitle());
        $stmt->bindValue(':slug', $data->getArticleSlug());
        $stmt->bindValue(':text', $data->getArticleText());
        $stmt->bindValue(':date', $data->getArticleDate());
        $stmt->bindValue(':visibility', $data->getArticleVisibility());
        return $stmt->execute();
    }

    public function readById(int $id): bool|AbstractMapping
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new ArticleMapping($data);
        }
        return false;
    }

    // récupération de tous nos articles
    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` ";
        if($orderDesc===true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }

    public function update(int $id, AbstractMapping $data)
    {
    // Regénérer le slug si un titre est fourni
    if (method_exists($data, 'getArticleTitle') && method_exists($data, 'setArticleSlug') && $data->getArticleTitle()) {
        $slug = (new class { use SlugifyTrait; })->slugify($data->getArticleTitle());
        $data->setArticleSlug($slug);
    }
    $sql = "UPDATE article SET article_title = :title, article_slug = :slug, article_text = :text, article_date = :date, article_visibility = :visibility WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':title', $data->getArticleTitle());
    $stmt->bindValue(':slug', $data->getArticleSlug());
    $stmt->bindValue(':text', $data->getArticleText());
    $stmt->bindValue(':date', $data->getArticleDate());
    $stmt->bindValue(':visibility', $data->getArticleVisibility());
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
    }

    public function delete(int $id)
    {
    $sql = "DELETE FROM article WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
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
        $result = [];
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }
}