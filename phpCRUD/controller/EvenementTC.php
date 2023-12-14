
<?php
require '../config.php';
class event_typec {

public function afficheevents($type_event) {
try {
$pdo = config::getConnexion ();
$query = $pdo->prepare("SELECT * FROM event_type WHERE type_event = :type_event");
$query->execute (['type_event'=> $type_event]);
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