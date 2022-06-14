<?php
class Movie {
    public $title;
    public $original_title;
    public $description;
    public $year;
    public $original_language;
    public $director;
    public $duration_min;
    public $min_age;
    public $flag = "";

    function __construct($_original_title, $_year, $_min_age) {
        $this->original_title = $_original_title;
        $this->year = $_year;
        $this->min_age = $_min_age;

        if ($this->min_age === 18) {
            $this->flag = "red";
        } elseif ($this->min_age === 16) {
            $this->flag = "yellow";
        } else {
            $this->flag = "green";
        }
    }

    public function getFilmTeaser() {
        return "$this->original_title | anno: $this->year | bollino: $this->flag";
    }

    public function getFilmTeaserArray() {
        return [
            "originalTitle" => $this->original_title,
            "year" => $this->year,
            "bollino" => $this->flag
        ];
    }

}

$matrix = new Movie("Matrix", 1999, 16);
$matrix->duration_min = 120;
var_dump($matrix);

$forest_gump = new Movie("Forest Gump", 1994, 14);
$forest_gump->duration_min = 142;
var_dump($forest_gump);
?>

<h2>
    <?php echo $matrix->getFilmTeaser(); ?>
</h2>

<h2>
    <?php echo $forest_gump->getFilmTeaser(); ?>
</h2>

<div>
    <?php $matrixInfo = $matrix->getFilmTeaserArray();?>
    <h2><?php echo $matrixInfo["originalTitle"]; ?> </h2>
    <p>Anno di uscita: <?php echo $matrixInfo["year"]; ?></p>
</div>

<ul>
    <?php foreach($matrix->getFilmTeaserArray() as $key=>$info) {?>
    <li> <?php echo "$key: $info"; ?> </li>
    <?php } ?>
</ul>