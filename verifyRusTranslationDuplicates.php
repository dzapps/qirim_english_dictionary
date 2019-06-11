<?php
$current_word_list = [];
$query = '';
function getList(){
    global $query;
    if(!empty($_GET['query'])){
        $query = $_GET['query'];
    }
    $already_done = file_get_contents('done_commas.txt');
    if(!empty($already_done)){
        $already_done = 'HAVING rw.rus_word_id NOT IN ('.$already_done.') ';
    } else {
        $already_done = '';
    }
    $mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");
    $mysqli->set_charset("utf8");
    $mysqli->query("CREATE TEMPORARY TABLE duplicates SELECT rus_word_id, name, COUNT(*) c FROM rus_words GROUP BY name HAVING c > 1;");
    
    $sql_2 = "
        SELECT 
            (SELECT 
                    eng_part_descr
                FROM
                    qirim_english_dictionary.parts_of_speech pos
                WHERE
                    rw.part_of_speech_id = pos.part_of_speech_id) AS part,
            name,
            rus_word_id
        FROM
            qirim_english_dictionary.rus_words rw
        WHERE
            name IN (SELECT 
                    name
                FROM
                    duplicates) $already_done
        LIMIT 50
        ";
    echo json_encode(mysqli_fetch_all($mysqli->query($sql_2)));
}

function getTotal(){
    global $query;
    if(!empty($_GET['query'])){
        $query = $_GET['query'];
    }
    $already_done = file_get_contents('done_commas.txt');
    if(!empty($already_done)){
        $already_done = 'HAVING rus_word_id NOT IN ('.$already_done.') ';
    } else {
        $already_done = '';
    }
    $mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");
    $mysqli->set_charset("utf8");
    $sql_2 = "
         SELECT  name, COUNT(*) c FROM rus_words GROUP BY name HAVING c > 1 $already_done
        ";
    echo json_encode($mysqli->query($sql_2)->num_rows);
}

function commit(){
    global $query;
    set_time_limit(500);
    if(!empty($_GET['query'])){
        $query = $_GET['query'];
    }
    if(!empty($_GET['data'])){
        $data = json_decode($_GET['data']);
        for($i=0; $i<count($data); $i++){
            $object = [
                'rus_word' => $data[$i][2]
            ];
            putThatDone($object['rus_word']);
            continue;
        }
        return getList();
    }
}

function updateRusName($rus_id = '', $eng_id = '', $rus_word = ''){
    $mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");
    $mysqli->set_charset("utf8");
    if(!empty($_GET['newword'])){
        $data = explode(';',$_GET['newword']);
        $rus_word_id = $data[0];
        $new_word_name = $data[1];
        $eng_word_id = $data[2];
    } else {
        $rus_word_id = $rus_id;
        $new_word_name = editWord($rus_word);
        $eng_word_id = $eng_id;
    }
    $sql_4 = "
       UPDATE qirim_english_dictionary.rus_words 
       SET name = '".$new_word_name."'
       WHERE rus_word_id = '".$rus_word_id."'
       ";
    $mysqli->query($sql_4);
    $error = mysqli_error($mysqli);
    if(strpos($error, 'Duplicate entry')>-1){
          insertQuery($new_word_name,$eng_word_id);
          deleteQuery($rus_word_id, $eng_word_id);
    }
    $mysqli->close();
}

function insertQuery($rus_name, $eng_id){
    $mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");
    $mysqli->set_charset("utf8");
    $sql_5 = "
        SELECT rus_word_id FROM qirim_english_dictionary.rus_words 
        WHERE name = '".$rus_name."' LIMIT 1
        ";
    $rus_id = mysqli_fetch_all($mysqli->query($sql_5))[0][0];
    $sql_4 = "
        INSERT INTO  qirim_english_dictionary.`references`
        SET rus_word_id = '".$rus_id."', eng_word_id = '$eng_id'
        ";
    $mysqli->query($sql_4);
    $error = mysqli_error($mysqli);
    $mysqli->close();
}


function deleteRusName(){
    $mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");
    $mysqli->set_charset("utf8");
    if(!empty($_GET['deleteid'])){
        $rus_id = $_GET['deleteid'];
        $sql_5 = "
            DELETE  FROM  qirim_english_dictionary.rus_words 
            WHERE rus_word_id = '".$rus_id."'
            ";
        $mysqli->query($sql_5);
        $sql_4 = "
            DELETE  FROM  qirim_english_dictionary.`references`
            WHERE rus_word_id = '".$rus_id."'
            ";
        $mysqli->query($sql_4);
    }
    $mysqli->close();
}

function explodeWord($object){
    $mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");
    $mysqli->set_charset("utf8");
    $exploded = explode(', ',$object['rus_word']);
    
    for($i = 0; $i<count($exploded); $i++){
        $sql_3 = "
            INSERT INTO qirim_english_dictionary.rus_words 
            SET name = '".$exploded[$i]."', part_of_speech_id = '".$object['part_of_speech_id']."'
            ";
        $mysqli->query($sql_3);
        $sql_2 = "
            SELECT 
                rus_word_id
            FROM
                qirim_english_dictionary.rus_words
            WHERE
                name = '".$exploded[$i]."'  AND part_of_speech_id = '".$object['part_of_speech_id']."'
        ";
        $new_rus_word_id = mysqli_fetch_row($mysqli->query($sql_2))[0];
        $sql_4 = "
            INSERT INTO qirim_english_dictionary.`references` 
            SET eng_word_id = '".$object['eng_id']."', rus_word_id = '".$new_rus_word_id."'
            ";
        $mysqli->query($sql_4);
    }
    deleteQuery($object['rus_id'], $object['eng_id']);
    $mysqli->close();
}


function deleteQuery($rus_id, $eng_id){
    $mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");
    $mysqli->set_charset("utf8");
    $sql_3 = "
        DELETE  FROM  qirim_english_dictionary.rus_words
        WHERE rus_word_id = '".$rus_id."'
        ";
    $mysqli->query($sql_3);
    $sql_4 = "
        DELETE  FROM  qirim_english_dictionary.`references`
        WHERE rus_word_id = '".$rus_id."' AND eng_word_id = '".$eng_id."'
        ";
    $mysqli->query($sql_4);
    $mysqli->close();
}

function editWord($word){
    global $query;
    $city = str_replace('г', "г.", $query);
    $new_word = trim(str_replace($query, $city, $word));
    return $new_word;
}

function putThatDone($data){
    $already_done = file_get_contents('done_commas.txt');
    if(!$already_done){
        file_put_contents('done_commas.txt', $data);
    } else {
        $already_done .= ','.$data;
        file_put_contents('done_commas.txt', $already_done);
    }
}

if(function_exists($_GET['f'])) {
   $_GET['f']();
}