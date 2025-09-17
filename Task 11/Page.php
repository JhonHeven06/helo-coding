<?php
// models/Page.php

class Page {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM pages ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO pages (title, content) VALUES (?, ?)");
        return $stmt->execute([$data['title'], $data['content']]);
    }

    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM pages WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE pages SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$data['title'], $data['content'], $id]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM pages WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
