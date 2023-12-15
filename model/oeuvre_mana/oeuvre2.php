<?php
class oeuvres
{
    private ?int $id_image = null;
    private ?string $path = null;
    private ?int $categorie = null;
    private ?int $user = null;

    public function __construct($id_image, $path, $categorie, $user)
    {
        $this->id_image = $id_image;
        $this->path = $path;
        $this->categorie = $categorie;
        $this->user = $user;
    }

    public function getIdImage()
    {
        return $this->id_image;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getcategorie()
    {
        return $this->categorie;
    }

    public function getpatient()
    {
        return $this->user;
    }
}
