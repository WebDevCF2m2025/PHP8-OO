## 18 étapes du flux (du POST à l'affichage)

Ce guide détaille le cheminement: formulaire HTML (POST) → hydratation objet → validation/normalisation → insertion DB → lecture DB → affichage en liste. Focus sur l’hydratation.

### 1) Configuration (`config.php`)
- Définit les constantes DB (`DB_HOST`, `DB_LOGIN`, `DB_PWD`, `DB_NAME`, `DB_PORT`, `DB_CHARSET`, `DB_TYPE`).
- Définit `RACINE_PATH = __DIR__` pour les inclusions.

### 2) Chargements et connexion PDO (`public/index.php`)
- `require_once "../config.php"` puis inclusions `AbstractMapping.php` et `ArticleMapping.php` via `RACINE_PATH`.
- DSN: `DB_TYPE:host=...;port=...;dbname=...;charset=...`.
- `new PDO(...)` + attributs: erreurs en exceptions, `FETCH_ASSOC` par défaut.

### 3) Détection POST
- `if (!empty($_POST)) { ... }`.
- Checkbox: si `article_visibility` absent → `false`.

### 4) Création objet métier
- `new ArticleMapping($_POST)`.
- Le constructeur parent appelle `hydrate($datas)`.

### 5) Hydratation (mécanisme)
- Pour chaque `(clé, valeur)`:
  - `ucwords(cle, '_')` → suppression `_` → `ArticleTitle`.
  - Préfixe `set` → `setArticleTitle`.
  - Si `method_exists`, appel dynamique `$this->$setterName($value)`.
- Clés inconnues ignorées.

### 6) Validation/normalisation (setters)
- Chaînes: `strip_tags` → `htmlspecialchars` → `trim` + longueurs.
- `id` > 0; `article_title` 6–120; `article_slug` 6–125; `article_text` ≥ 20.
- `article_date`: `strtotime` + format `Y-m-d H:i:s`.
- `article_visibility`: cast `(bool)`.

### 7) Génération du slug (`slugify`)
- Source: `html_entity_decode(getArticleTitle())`.
- Étapes: regex Unicode → translittération ASCII → nettoyage → compactage → `strtolower` → préfixe hex aléatoire.

### 8) Mise à jour du slug
- `setArticleSlug($slug)` pour revalider et stocker.

### 9) Préparation INSERT (PDO)
- SQL: `INSERT INTO article (article_title, article_text, article_slug, article_visibility, article_date)
  VALUES (:title, :text, :slug, :visibility, NOW())`.
- `prepare` + paramètres nommés via getters.

### 10) Exécution INSERT
- `execute([...])` avec `:title`, `:text`, `:slug`, `:visibility`.
- Sous `try/catch` pour erreurs.

### 11) Sélection des visibles
- SQL: `SELECT * FROM article WHERE article_visibility = 1 ORDER BY article_date DESC`.
- `prepare` + `execute` + `fetchAll()`.

### 12) Re-hydratation des lignes SQL
- Pour chaque `$row`: `new ArticleMapping($row)`.
- Même pipeline de setters/validations.

### 13) Préparation pour la vue
- Tableau d’objets `ArticleMapping` propres et cohérents.

### 14) Affichage en liste
- Boucle: titre `getArticleTitle()` + date `getArticleDate()`.
- Cas vide: message « Aucun article publié pour le moment. ».

### 15) Détails d’`hydrate`
- Construction du setter: `set` + `ucwords` (par `_`) + suppression `_`.
- `method_exists` protège des appels inexistants.
- Logique métier centralisée dans les setters.

### 16) Exemples de transformations
- `article_title`: `'  <b>Titre</b>  '` → `Titre` (nettoyé/trim/encodé).
- `article_text`: min 20, sinon exception.
- `article_visibility`: `'1'` → `true` (cast bool).
- `article_date`: `'2025-09-22T10:15'` → `2025-09-22 10:15:00`.

### 17) Pourquoi slug côté serveur ?
- Cohérence des règles, robustesse aux accents/HTML, préfixe hex anti-collision.

### 18) Cartographie des fichiers
- `config.php`: constantes DB + `RACINE_PATH`.
- `model/AbstractMapping.php`: constructeur commun, `hydrate`, `slugify`.
- `model/ArticleMapping.php`: propriétés + getters/setters.
- `public/index.php`: orchestration (POST → INSERT, SELECT → affichage).

Astuce: clé snake_case `article_slug` → `Article_Slug` → `ArticleSlug` → `setArticleSlug`.


