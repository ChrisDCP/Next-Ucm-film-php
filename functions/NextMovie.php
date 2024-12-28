<?php
declare(strict_types=1);

class NextMovie{
    public function __construct(
        private int $days_until,
        private string $title,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview,
    )
    {}

    public function get_until_message(): string
    {
        $days = $this -> days_until;
        
        return match(true){
            $days === 0 => "Hoy!, Gran estreno!",
            $days === 1 => "Mañana!, Gran estreno!",
            $days <7    => "Gran estreno, esta semana!",
            $days <30   => "Gran estreno, este mes!",
            default     => "$days dias para el estreno"
        };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie{
        $result = file_get_contents($api_url);
        $data = json_decode($result, true);

        return new self(
            $data["days_until"],
            $data["title"],
            $data["following_production"]['title'] ?? "desconocido",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"],
        );
    }

    public function get_data(){
        return get_object_vars($this);
    }
}