
<?php
require '../config.php';
class event_typec {

public function afficheevents($temps) {
try {
$pdo = config::getConnexion ();
$query = $pdo->prepare("SELECT * FROM event WHERE temps = :temps");
$query->execute (['temps'=> $temps]);
return $query->fetchALL();
} catch (PDOException $e) {
echo $e->getMessage ();
}
}
public function afficheEvenementtypes () {
try {
$pdo =config::getConnexion();
$query = $pdo->prepare("SELECT * FROM event_type");
$query->execute ();
return $query->fetchALL();
} catch (PDOException $e) {
echo $e->getMessage ();
}
}
}
?>