<?php
class IngredientDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addIngredient($nom_ingredient, $unitemesure) {
        try {
            $query = "INSERT INTO ingredients (nom_ingredient) VALUES (:nom_ingredient)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom_ingredient', $nom_ingredient);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur d'ajout de l'ingrédient : " . $e->getMessage();
            return false;
        }
    }

    public function deleteIngredient($id_ingredient) {
        try {
            $query = "DELETE FROM ingredients WHERE id_ingredient = :id_ingredient";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_ingredient', $id_ingredient);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de suppression de l'ingrédient : " . $e->getMessage();
            return false;
        }
    }

    public function updateIngredient($id_ingredient, $nouveau_nom) {
        try {
            $query = "UPDATE ingredients SET nom_ingredient = :nouveau_nom WHERE id_ingredient = :id_ingredient";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_ingredient', $id_ingredient);
            $stmt->bindParam(':nouveau_nom', $nouveau_nom);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de mise à jour de catégorie : " . $e->getMessage();
            return false;
        }
    }

    public function getAllIngredients() {
        $query = $this->db->query("SELECT * FROM ingredients");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

$db = new PDO('dbname=cuisine', 'root', 'admin');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$ingredientDAO = new IngredientDAO($db);