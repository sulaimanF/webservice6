<?php 
    if (isset($_GET["id"])) {
        $id = (int) $_GET["id"];
        $all = file_get_contents('mata_kuliah.json');
        $all = json_decode($all, true);
        $jsonfile = $all["mata_kuliah"];
        $jsonfile = $jsonfile[$id];

        if ($jsonfile) {
            unset($all["mata_kuliah"][$id]);
            $all["mata_kuliah"] = array_values($all["mata_kuliah"]);
            file_put_contents("mata_kuliah.json", json_encode($all));
        }
        header("Location: tampil_mk.php");
    }
?>