<?php
$query = "SELECT * FROM users";

$GLOBALS['tableResults'] = mysqli_query($db, $query);
$GLOBALS['customerTableResults'] = mysqli_query($db, $query);
$GLOBALS['gridResults'] = mysqli_query($db, $query);

function make_query($db)
{
    $queryImage = "SELECT * FROM images ORDER BY id ASC";
    $result = mysqli_query($db, $queryImage);
    return $result;
}

function make_slide_indicators($db){
    $output = '';
    $count = 0;
    $result = make_query($db);
    while($row = mysqli_fetch_array($result)){
        if ($count == 0){
            $output .= '
                            <li data-target="#myCarousel" data-slide-to=" '.$count.'  " class="active"></li>
                        ';
        }else{
            $output .= '
                            <li data-target="#myCarousel" data-slide-to=" '.$count.' "></li>
                        ';
        }
        $count = $count + 1;
    }
    return $output;
}

function make_slides($db){
    $output = '';
    $count = 0;
    $result = make_query($db);
    while ($row = mysqli_fetch_array($result)){
        if ($count == 0){
            $output .= '
                            <div class="item active">
                        ';
        }else{
            $output .='
                            <div class="item">
                        ';
        }
        $output .='
                        <img src="img/gallery/'.$row["file_name"].'" alt="Los Angeles" style="width:100%;" />
                        <div class="carousel-caption">
                            <h3>The Universe Through A Child S Eyes</h3>
                        </div>
                     </div>
                    ';
        $count = $count + 1;
    }
    return $output;
}