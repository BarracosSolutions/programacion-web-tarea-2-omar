<?php 
    session_start();
    function loadPageObjects(){
        if(!isset($_SESSION["data"])){
        }
        else{
            fillTableWithData();
        }

        addDataToSession();
    }

    function addDataToSession(){
        if(isset($_GET["date-value"]) && isset($_GET["hora-value"]) && isset($_GET["evento-value"])){
            $concat_data = $_GET["date-value"] . "," . $_GET["hora-value"] . "," . $_GET["evento-value"] . "|";
            if(!isset($_SESSION["data"])){
                $_SESSION["data"] = $concat_data;
            }
            else{
                $_SESSION["data"] = $_SESSION["data"] . $concat_data;
            }
            
        }
    }

    function fillTableWithData(){
        $data = $_SESSION["data"];
        $data_array = explode("|", $data);
        foreach($data_array as $item){
            echo "<tr>";
            $column_data = explode(",",$item);
            foreach($column_data as $iitem){
                echo "<td>";
                echo $iitem;
                echo "</td>";
            }
            echo "</tr>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head><head>
    <body>
        <header><header>
        <main>
            <?php 
                loadPageObjects();
            ?>
            <h1>Calendario de eventos</h1>
            <table>
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Hora</th>
                        <th>Evento</th>
                        <th>Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        fillTableWithData();
                    ?>
                </tbody>
            </table>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method='get'
                <label for='date-value'>Día</label>
                <input type="date" id="date-value" name="date-value">
                <label for='hora'>Hora</label>
                <input type="time" id="hora" name="hora-value">
                <label for='evento'>Evento</label>
                <input type="text" id="evento" name="evento-value">
                <button type='submit' class='btn btn-primary'>Add</button>
            </form>
        </main>
        <footer></footer>
    <body>
</html>