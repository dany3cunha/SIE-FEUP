<?php
$conn = pg_connect("host=db.fe.up.pt dbname=sie2252  user=sie2252  password=GDQllMDQ");
if (!$conn) {
echo "Nao foi possivel estabelecer a ligacao";
exit();
}
$query = "set schema 'siefinal';";
pg_exec($conn, $query);
?>