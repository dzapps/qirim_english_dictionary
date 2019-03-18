<?php

/*
$mysqli = new mysqli("127.0.0.1", "root", "root", "qirim_english_dictionary");


if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$sql = "
    INSERT INTO
        `english_b`
    SET
        description = '2'
    ";

$mysqli->query($sql);
*/



$abbreviation_eng = [
    'n' => 'noun',
    'a' => 'adjective' ,
    'adv' => 'adverb',
    'attr.' => 'attributive',
    'conj' => 'conjunction',
    'etc.' => 'etc',
    'imp.' => 'imperative',
    'inf.' => 'infinitive',
    'int' => 'interjenction',
    'num' => 'numeral',
    'o.s.' => 'oneself',
    'p. p.' => 'past_participle',
    'pass.' => 'passive',
    'past' => 'past_tense',
    'pl' => 'plural',
    'pref' => 'prefix',
    'pres.p.' => 'present_participle',
    'pron' => 'pronoun',
    'prep' => 'preposition',
    'refl.' => 'reflexive',
    'syn.' => 'synonym',
    'smb.' => 'somebody',
    'smth.' => 'something',
    's.o.' => 'someone',
    'v' => 'verb',
    'vi' => 'verb_intransitive',
    'vt' => 'verb_transitive'
];
$abbreviation_rus = [
    'ав.' => 'авиация',
    'австрал.' => 'австалийская терминология',
    'авт.' => 'автотранспорт',
    'ам.' => 'американская терминология',
    'анат.' => 'анатомия',
    'англ.' => 'английская терминология',
    'амер.' => 'американская терминология',
    'англоинд.' => 'англоиндийская терминология',
    'араб.' => 'арабская терминология',
    'арт.' => 'артиллерия',
    'арх.' => 'архитектура',
    'археол.' => 'археология',
    'астр.' => 'астрономия',
    'астрол.' => 'астрология',
    'бакт.' => 'бактериология',
    'библ.' => 'библейская терминология',
    'биол.' => 'биология',
    'бирж.' => 'биржевая терминология',
    'бот.' => 'ботаника',
    'букв.' => 'буквально',
    'бухг.' => 'бухгалтерская терминология',
    'вет.' => 'ветеринария',
    'вм.' => 'вместо',
    'воен.' => 'военное дело',
    'вопрос.' => 'вопросительный',
    'в разн. знач.'  => 'в разных значениях',
    'вульг.' => 'вульгаризм',
    'г.' => 'город',
    'генет.' => 'генетика',
    'геогр.' => 'география',
    'геод.' => 'геодезия',
    'геол.' => 'геология',
    'геом.' => 'геометрия',
    'гер.' => 'геральдика',
    'гидр.' => 'гидротехника',
    'гл.' => 'главным',
    'глаг.' => 'глагол',
    'голл.' => 'голландская терминология',
    'горн.' => 'горное дело',
    'грам.' => 'грамматика',
    'греч.' => 'греческая терминология',
    'груб.' => 'грубое слово или выражение',
    'дет.' => 'детская терминология',
    'диал.' => 'диалектизм',
    'дип.' => 'дипломатический термин',
    'др.-греч.' => 'древнегреческая история',
    'др.-рим.' => 'древнеримская история',
    'ед.ч.' => 'единственное число',
    'жарг.' => 'жаргонный термин',
    'жив.' => 'живопись',
    'ж.р.' => 'женский род',
    'ж.-д.' => 'железнодорожный термин',
    'зоол.' => 'зоология',
    'и др.' => 'и другое',
    'и пр.' => 'и прочее',
    'информ.' => 'информация',
    'инд.' => 'индийская терминология',
    'ирл.' => 'ирландская терминология',
    'ирон.' => 'иронично',
    'иск.' => 'искусство',
    'исп.' => 'испанская терминология',
    'ист.' => 'исторический термин',
    'и т.п.' => 'и тому подобное',
    'итал.' => 'итальянская терминология',
    'карт.' => 'термин карточной игры',
    'кино' => 'кинематография',
    'кит' => 'китайская терминология',
    'ком.' => 'коммерческий термин',
    'книжн.' => 'книжный термин',
    'комп.' => 'информатика и компьютерные технологии',
    'кул.' => 'кулинария',
    'л.' => 'лицо',
    'ласк.' => 'ласкательное слово или выражение',
    'лат.' => 'латинский термин',
    'лес.' => 'лесное дело',
    'лингв.' => 'лингвистика',
    'лит.' => 'литература',
    'лог.' => 'логика',
    'мат.' => 'математика',
    'мед.' => 'медицина',
    'мест.' => 'местоимение',
    'метал.' => 'металлургия',
    'метеор.' => 'метеорология',
    'метр.' => 'метрология',
    'мех.' => 'механика',
    'мин.' => 'минералогия',
    'миф.' => 'мифология',
    'мн.ч.' => 'множественное число',
    'мор.' => 'морское дело',
    'муз.' => 'музыка',
    'накл.' => 'наклонение',
    'напр.' => 'например',
    'нареч.' => 'наречие',
    'науч.' => 'научная терминология',
    'нач.' => 'начало',
    'нем.' => 'немецкая терминология',
    'неол.' => 'неологизм',
    'обыкн.' => 'обыкновенно',
    'опт.' => 'оптика',
    'особ.' => 'особенно',
    'охот.' => 'охотничий термин',
    'офиц.' => 'официальное выражение',
    'парл.' => 'парламентский термин',
    'перен.' => 'в переносном значении',
    'погов.' => 'поговорка',
    'пол.' => 'политический термин',
    'полигр.' => 'полиграфия',
    'португ.' => 'португальская терминология',
    'посл.' => 'пословица',
    'поэт.' => 'поэтический термин',
    'превосх.' => 'превосходная',
    'предл.' => 'предложение',
    'предлог.' => 'предлогами',
    'презр.' => 'презрительно',
    'преим.' => 'преимущественно',
    'пренебр.' => 'пренебрежительно',
    'прибл.' => 'приблизительно',
    'прилаг.' => 'имя пралагательное',
    'притяж.' => 'притяжательное местоимение',
    'прям.' => 'в прямом значении',
    'психол.' => 'психология',
    'р.' => 'род',
    'рад.' => 'радиотехника',
    'разг.' => 'разговорное выражение',
    'распр.' => 'распространительно',
    'редк.' => 'редко употребляемое слово',
    'рел.' => 'религия',
    'рит.' => 'риторика',
    'род.' => 'родительный (падеж)',
    'св.' => 'святой',
    'сказ.' => 'сказочная терминология',
    'см.' => 'смотри',
    'собир.' => 'собирательное выражение',
    'сокр.' => 'сокращение',
    'сослаг.' => 'сослагательный',
    'спорт.' => 'физкультура и спорт',
    'ср.' => 'сравни',
    'сравнит.' => 'сравнительная',
    'ср.-век.' => 'средневековый',
    'степ.' => 'степень',
    'стр.' => 'строительный термин',
    'сущ.' => 'имя существительное',
    'с.-х.' => 'сельское хозяйство',
    'твор.' => 'творительный (падеж)',
    'т.е.' => 'то есть',
    'театр.' => 'театральный термин',
    'текст.' => 'текстильное дело',
    'тел.' => 'телефония',
    'телев.' => 'телевидение',
    'тех.' => 'техника',
    'тж.' => 'также',
    'топогр.' => 'топография',
    'тур.' => 'турецкая терминология',
    'уменьш.' => 'уменьшительная форма',
    'унив.' => 'универскитетский термин',
    'употр.' => 'употребляется',
    'уст.' => 'устаревшее слово или выражение',
    'утверд.' => 'утвердительный',
    'фарм.' => 'фармакология',
    'физ.' => 'физика',
    'физиол.' => 'физиология',
    'филол.' => 'филология',
    'филос.' => 'философия',
    'фин.' => 'финансковый термин',
    'фон.' => 'фонетика',
    'фот.' => 'фотография',
    'фр.' => 'французская терминология',
    'футб.' => 'футбол',
    'хим.' => 'химия',
    'хир.' => 'хирургия',
    'церк.' => 'церковный термин',
    'что-н.' => 'что-нибудь',
    'шахм.' => 'шахматный термин',
    'шк.' => 'школьное выражение',
    'шотл.' => 'шотландская терминология',
    'шутл.' => 'шутливое выражение',
    'эвф.' => 'эвфемизм',
    'эк.' => 'экономика',
    'эл.' => 'электроника',
    'южноафр.' => 'юэноафриканская терминология',
    'юр.' => 'юридический термин',
    'яп.' => 'японская терминология'
];
$word_data = [
        'origin' => '',
        'translation' => ''
 ];
 
 $current_object = [
        'origin' => '',
        'words' => []
 ];
 
 $result = [];
 $qirim_result = [];
 
function scanPage(){
    set_time_limit(8000);
    $result_object = [];
    global $word_data;
    global $current_object;
    global $result;
    global $qirim_result;
    
    $letters = [
        'b','c','d','e','f','g','h','i','j','k','l','m','n','o', 'p','q','r','s','t','u','v','w','x','y','z'
    ];
    for($k = 0; $k < count($letters); $k++){
        $words= explode(' | ',file_get_contents('differences/'.$letters[$k].'.txt'));
        $file = '';
        for($i = 0; $i < count($words); $i++){
            $result_object = [
                'origin' => '<origin>'.$words[$i].'</origin>',
            ];

            $current_object = [
                'origin' => $words[$i],
                'transcription' => '',
                 'words' => []
            ];
            $word_str = getTranslation($words[$i]);
            $result_object['transcription'] = '<tr>'.trim($word_str['transcription']).'</tr>';
            $result_object['word'] = '<word>'.$word_str['word'].'</word>';
            $string = '<ar>'.implode('',$result_object).'</ar>';
            $file .= $string;
            $current_object = [
                    'origin' => '',
                    'transcription' => '',
                    'translation' => ''
             ];
            //$words[$i]['size'] = sizeof($words[$i]['translation']);
        }
         file_put_contents('gufo_words/'.$letters[$k].'.txt', $file);
        //print_r($result);
    }
} 

function getTranslation($word){
    $word_string = [];
    global $abbreviation_rus;
    set_time_limit(8000);
    $html = file_get_contents('https://gufo.me/dict/enru_muller/'.$word);
    $start = strpos($html, 'lightslategray');
    $end = strpos($html, '<div class="fb-quote"></div>');

    $length = $end-$start;
    $html = substr($html, $start, $length);
    preg_match('/(\[.*\] )/', $html, $mathces_tr);
    if($mathces_tr){
        $word_string['transcription'] = $mathces_tr[0];
    } else {
        $word_string['transcription'] = '';
    }
    $html = strip_tags($html);
    $new_start = strpos($html, ']');
    $new_length = strlen($html)-$new_start;
    $word_string['word'] = trim(substr($html, $new_start+1, $new_length));
    
    return $word_string;
    
    
    $result_object = findAbbreviationEng($word_string);
    /*foreach ($abbreviation_rus as $abbr_rus=>$value){
        if (strpos($meaning_object['word'],'_'.$abbr_rus) > -1 && strpos($meaning_object['word'],'_'.$abbr_rus) < 6){
            $new_word_string = str_replace('_'.$abbr_rus,'', $meaning_object['word']);
            $meaning_object['word'] = $new_word_string;
            array_push($meaning_object['abbreviation_rus'],$value);
        } else {
             continue;
        }
    }*/
    if(strpos($result_object['word'],'_I')>-1){
        $result_object['word'] = getFirstMeaning($result_object['word']);
    } else if (strpos($result_object['word'],'1.')>-1){
        $result_object['word'] = getSecondMeaning($result_object);
    } else if(strpos($result_object['word'],'1)')>-1){
        
        $result_object['word'] = getThirdMeaning($result_object);
    } else if(strpos($result_object['word'],'а)')>-1){
        $result_object['word'] = getFourthMeaning($result_object);
    } else {
        $result_object = findAbbreviationRus($result_object);
    }
    return $result_object;
    //getQirimTranslation(trim($newhtml));
}
function getFirstMeaning($translation_string){
    $result_object = [];
    $translation_lvl1 = preg_split("/(_I+V?)/", $translation_string);
    array_shift($translation_lvl1);
    foreach ($translation_lvl1 as $second_meaning){
        if(strpos($second_meaning,'1.')>-1){
            $new_second_meaning = findAbbreviationEng($second_meaning);
            array_push($result_object, getSecondMeaning($new_second_meaning));
        } else {
            if(strpos($second_meaning,'1)')>-1){
                $third_meaning = getThirdMeaning($third_meaning);
                array_push($result_object,$third_meaning );
            } else {
                $check_eng = findAbbreviationEng($second_meaning);
                array_push($result_object,findAbbreviationRus($check_eng));
            }
        }
    }
    
    return $result_object;    
}

function getSecondMeaning($translation_string){
    $result_object = [
        'abbreviation_eng' => $translation_string['abbreviation_eng'],
        'word' => []
        
    ];
    
    $second_meaning = preg_split("/[0-9]\./", $translation_string['word']);
   
    array_shift($second_meaning);
    foreach ($second_meaning as $third_meaning){
        if(strpos($third_meaning,'1)')>-1){
            $check_eng = findAbbreviationEng($third_meaning);
            $new_meaning = getThirdMeaning($check_eng);
            array_push($result_object['word'],$new_meaning );
        } else {
            $check_eng = findAbbreviationEng($third_meaning);
            array_push($result_object['word'],findAbbreviationRus($check_eng));
        }
    }
    return $result_object;
}

function getThirdMeaning($translation_string){
    $result_object = [
        'abbreviation_eng' => $translation_string['abbreviation_eng'],
        'word' => []
    ];
    
    $third_meaning = preg_split("/([0-9]*\))/", $translation_string['word']);
    array_shift($third_meaning);
    
            
    foreach ($third_meaning as $fourth_meaning){
        if(strpos($third_meaning,'а)')>-1){
            $check_eng = findAbbreviationEng($fourth_meaning);
            $new_meaning = getFourthMeaning($check_eng);
            array_push($result_object['word'],$new_meaning );
        } else {
            $check_eng = findAbbreviationEng($fourth_meaning);
            array_push($result_object['word'],findAbbreviationRus($check_eng));
        }
    }
    return $result_object; 
}


function getFourthMeaning($translation_string){
    $result_object = [
        'abbreviation_eng' => $translation_string['abbreviation_eng'],
        'word' => []
    ];
    
    $third_meaning = preg_split("/[а-я]{1}\)/", $translation_string['word']);
    array_shift($third_meaning);
    foreach ($third_meaning as $meaning){
            $check_eng = findAbbreviationEng($meaning);
            array_push($result_object['word'],findAbbreviationRus($check_eng) );
    }
    return $result_object; 
}

$previous_abbreviation_eng = '';

function findAbbreviationEng($word_string){
    
    error_reporting(0);
    global $previous_abbreviation_eng;
    global $abbreviation_eng;
    $meaning_object = [
                'word' => $word_string,
                'abbreviation_eng' => []
    ];
    foreach ($abbreviation_eng as $abbr_eng=>$value){
        if (strpos($word_string, $abbr_eng) > -1 && strpos($word_string, $abbr_eng) < 6){
            $new_word_string = str_replace($abbr_eng, '', $word_string);
            $previous_abbreviation_eng = $value;
            return $meaning_object = [
                'word' => $new_word_string,
                'abbreviation_eng' => $value
            ];
        } else {
            continue;
        }
    }
    
    $meaning_object['abbreviation_eng'] = $previous_abbreviation_eng;
    error_reporting(1);
    return $meaning_object;
}

function findSynonims ($word){
    
    $word['synonim'] = '';
    if (preg_match('/(от [a-zA-Z])/',$word['word'])){
        $synonims = preg_split('/(от)/', $word['word']);
        $word['word'] = $synonims[0];
        $synonim = $synonims[1];
        if(strpos($synonim,'_Ant:')>-1){
           $antonims = preg_split('/(_Ant:)/', $synonim);
           $word['antonim'] = explode(',', $antonims[1]); 
           $word['synonim'] = explode(',', $antonims[0]);
        }else{
           $word['synonim'] = explode(',', $synonim);
        }
    } else if (preg_match('/= [a-z]*/',$word['word'])){
        $synonim = explode('=',$word['word']);
        $word['synonim'] = explode(',', $synonim[1]);
        $word['word'] = $synonim[0];
    }
    return $word;
}

function findAbbreviationRus($word_string){
    
    error_reporting(0);
    global $abbreviation_rus;
    global $current_object;
    global $qirim_result;
    global $result;
    $meaning_object = [
                'word' => $word_string['word'],
                'abbreviation_eng' => $word_string['abbreviation_eng'],
                'abbreviation_rus' => []
    ];
    foreach ($abbreviation_rus as $abbr_rus=>$value){
        if (strpos($meaning_object['word'],$abbr_rus) > -1 && strpos($meaning_object['word'],$abbr_rus) < 6){
            $new_word_string = str_replace($abbr_rus,'', $meaning_object['word']);
            $meaning_object['word'] = $new_word_string;
            array_push($meaning_object['abbreviation_rus'],$value);
        } else {
             continue;
        }
    }
    error_reporting(1);
    $meaning_object = findSynonims($meaning_object);
    preg_match('/[A-Z]{1}[\s, \S]*[\.,?,!]?/', $meaning_object['word'], $matches);
    if($matches[0]){
        $meaning_object['big_example'] = $matches[0];
        $meaning_object['word'] = str_replace($matches[0], '', $meaning_object['word']);
    }
    
    preg_match_all('/\([a-z].*\)/', $meaning_object['word'], $descr_matches);
    if($descr_matches[0]){
        $meaning_object['description'] = $descr_matches[0];
        $meaning_object['word'] = str_replace($descr_matches[0], '', $meaning_object['word']);
    }
    
    preg_match_all('/\([а-я,].*\)/', $meaning_object['word'], $rus_descr_matches);
    if($rus_descr_matches[0]){
        $meaning_object['rus_description'] = $rus_descr_matches[0];
        $meaning_object['word'] = str_replace($rus_descr_matches[0], '', $meaning_object['word']);
    }
    
    $meaning_object['origin'] = str_replace("'", "\'", $current_object['origin']);
    
    $tmp_word_array = [];
    $meaning_object['word'] = preg_split('/(;)/', $meaning_object['word']);
    
    for($i = 0; $i<count($meaning_object['word']);$i++){
        if(preg_match_all("/([\а-я]*\,.*котор)|([\а-я]*\,.*?(что)|(чей)|(чья)|(чье))/", $meaning_object['word'][$i])){
            array_push($tmp_word_array, $meaning_object['word'][$i]);
        } else {
            $arr = explode(',', $meaning_object['word'][$i]);
            foreach($arr as $key){
                array_push($tmp_word_array, $key);
            }
        }
    }
    $meaning_object['word'] = $tmp_word_array;
    if(count($meaning_object['word'])>1){
        getLastMeaning($meaning_object);
    } else {
        $meaning_object['word'] = $meaning_object['word'][0];
        finalObject($meaning_object);
    }
}

function getLastMeaning($meaning_object){
    for($i = 0; $i < count($meaning_object['word']); $i++){
        $meaning_object['word'] = $meaning_object['word'][$i];
        finalObject($meaning_object);
    }
}

function finalObject($meaning_object){
    global $result;
    global $abbreviation_rus;
    $meaning_object['word'] = preg_replace("/(_[A-Za-z]\.)/", '', $meaning_object['word']);

    $meaning_object['word'] = ltrim($meaning_object['word']);
    foreach ($abbreviation_rus as $abbr_rus=>$value){
        if (strpos($meaning_object['word'],$abbr_rus) > -1 ){
            $new_word_string = str_replace($abbr_rus,'', $meaning_object['word']);
            $meaning_object['word'] = $new_word_string;
            array_push($meaning_object['abbreviation_rus'], $value);  
        } 
    }
    
    $meaning_object['word'] = preg_replace("/(_?[A-Za-z]*\.)/", '', $meaning_object['word']);
    preg_match_all("/([A-Za-z- ]+[^\S])/", $meaning_object['word'], $tiny_descr);
    if($tiny_descr){
        $meaning_object['tiny_example'] = $tiny_descr[0];
    } 
    $meaning_object['word'] = preg_replace("/[A-Za-z-]/", '', $meaning_object['word']);
    $meaning_object['word'] = preg_replace('/^ */', '', $meaning_object['word']);
    $meaning_object['word'] = preg_replace('/^\s+/', '', $meaning_object['word']);
    $meaning_object['word'] = rtrim($meaning_object['word']);
    array_push($result, $meaning_object);
    //writeDownOrigin($meaning_object);    
    //return $meaning_object;
    
    //$meaning_object['qirim_translation'] = getQTTranslation($meaning_object['word']);
       /*
        if(count($meaning_object['qirim_translation']) == 0 ){
            $meaning_object['status'] = 'empty';
        } else if(count($meaning_object['qirim_translation']) == 1 && !is_array($meaning_object['qirim_translation'][0])){
            $meaning_object['status'] = 'complete';
        }  else if(count($meaning_object['qirim_translation']) > 1){
            $meaning_object['status'] = 'warning';
        }  else {
            $meaning_object['status'] = 'warning';
        }*/
        /*
        if(isset($meaning_object['qirim_translation'][0])){
            array_push($qirim_result, $meaning_object);
        }
        
         */
    /*$last_meaning_obj = [
            'word'=> preg_replace("/[^АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЫЪЭЮЯабвгдеёжзийклмнопрстуфхцчшщьыъэюя ]/", '', $meaning_object['word'][$i]),
            'qirim_translation'=>getQTTranslation($meaning_object['word'][$i])
        ];
        $meaning_object['word'][$i] = $last_meaning_obj;*/
}
function getQirimTranslation($word){
    $html = file_get_contents('https://gufo.me/dict/rucrh/'.$word);
    $start = strpos($html, 'lightslategray');
    $end = strpos($html, '<div class="fb-quote"></div>');

    $length = $end-$start;
    $html = substr($html, $start, $length);
    $html = strip_tags($html);
    $new_start = strpos($html, ']');
    $new_length = strlen($html)-$new_start;
    $newhtml = substr($html, $new_start+3, $new_length);
    
}
print_r(scanPage());
//print_r(validateTextWord());