<?php
session_start();
$is_admin = $_SESSION["admin"] ?? false;
$is_logged_in = isset($_SESSION["user"]);

if (!$is_admin) {
    die("You don't have permission to view this page");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">
    <title>Geboekt</title>
</head>
<body>
<?php include_once('../includes/admin-header.php'); ?>

<?php
include('../process/db.php');
$db = new db();
$conn = $db->get_connection();

$sql = "
    SELECT r.id AS reis_id, r.land, u.username
    FROM reizen r
    LEFT JOIN user_reizen ur ON r.id = ur.reis_id
    LEFT JOIN users u ON ur.user_id = u.id
    ORDER BY r.id
";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$reizen = [];
foreach ($rows as $row) {
    $id = $row['reis_id'];
    if (!isset($reizen[$id])) {
        $reizen[$id] = [
            'land' => $row['land'],
            'users' => []
        ];
    }
    if (!empty($row['username'])) {
        $reizen[$id]['users'][] = $row['username'];
    }
}
?>

<section class="reizen-spacer-container center column">
    <h2 class="reizen-geboekt-txt">Overzicht van geboekte reizen</h2>

    <?php foreach ($reizen as $reis_id => $reis): ?>
        <div class="reizen-admin-blokje center column">
            <div class="reizen-blokje-header center column">
                <h1 class="reizen-headtxt">Reis naar <?= $reis["land"] ?></h1>
                <div>
                    <h2 class="reizen-subtxt center">Geboekt door:</h2>
                    <?php if (!empty($reis["users"])): ?>
                        <ul>
                            <?php foreach ($reis["users"] as $username): ?>
                                <li class="reizen-user center"><?= $username ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="reizen-no-users">Nog niemand heeft deze reis geboekt.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="admin-gap row">
                <form method="POST" action="../process/verwijder-reis.php">
                    <input type="hidden" name="reis_id" value="<?= $reis_id ?>">
                    <button type="submit" class="delete-edit-button pointer">Verwijder</button>
                </form>
                <form method="POST" action="bewerken.php?reis_id=<?= $reis_id ?>">
                    <button type="submit" class="delete-edit-button pointer">Aanpassen</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php include_once('../includes/footer.php'); ?>
</body>
</html>