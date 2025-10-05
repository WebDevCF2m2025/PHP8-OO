<?php

// création du namespace
namespace model\Manager;

use model\Traits\SlugifyTrait;
use model\Interfaces\ManagerInterface;
use model\Interfaces\UserCrudInterface;
use model\Mapping\AbstractMapping;
use model\Mapping\ArticleMapping;


use Exception;
use PDO;


class UserManager implements ManagerInterface, UserCrudInterface
{
    use SlugifyTrait;
    private PDO $db;

    // implémenté à cause de MangerInterface
    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    /*
     * méthodes implémentées à cause de CrudInterface
     */
    public function create(AbstractMapping $data)
    {
        try {
            $sql = "INSERT INTO user (user_name, user_email, user_password)
                VALUES (:name, :email, :password)";

            // Hasher le mot de passe avant de l'insérer
            $hashedPassword = password_hash($data->getUserPassword(), PASSWORD_DEFAULT);

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ":name" => $data->getUserName(),
                ":email" => $data->getUserEmail(),
                ":password" => $hashedPassword
            ]);
            $stmt->closeCursor();
            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public function readById(int $id): bool|AbstractMapping
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        if ($result) {
            return new ArticleMapping($result);
        }

        return false;
    }

    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` ";
        if ($orderDesc === true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item) {
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }



    public function update(int $id, AbstractMapping $data)
    {
        // try {
        //     $slug = $this->slugify($data->getArticleTitle());
        //     $sql = "UPDATE article SET 
        //         article_title = :title,
        //         article_slug = :slug,
        //         article_text = :text,
        //         article_visibility = :visibility
        //     WHERE id = :id";

        //     $stmt = $this->db->prepare($sql);
        //     $stmt->execute([
        //         ":title" => $data->getArticleTitle(),
        //         ":slug" => $slug,
        //         ":text" => $data->getArticleText(),
        //         ":visibility" => $data->getArticleVisibility(),
        //         ":id" => $id
        //     ]);
        //     $stmt->closeCursor();
        // } catch (Exception $e) {
        //     throw new Exception($e->getMessage());
        // }
    }

    public function delete(int $id)
    {

        try {
            $sql = "DELETE FROM article WHERE id = ?";
            $prepare = $this->db->prepare($sql);
            $prepare->execute([$id]);
            $prepare->closeCursor();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function logout()
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }


        session_destroy();
    }

    public function login(string $email, string $password): bool
    {


        $sql = "SELECT * FROM user WHERE user_email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['user_password'])) {
            return false;
        }



        return true;
    }
}
