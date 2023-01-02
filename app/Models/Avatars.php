<?php

namespace App\Models;

use CodeIgniter\Model;

class Avatars extends Model
{
    private array $avatarIcons;
    protected $db;
    protected int $idOfSelectedAvatar;
    protected array $avatars;
    protected array $avatarsBought;



    public function __construct($idStudent)
    {
        $this->avatars=$this->geAvatars();
        $this->avatarsBought=$this->geAvatarsBought($idStudent);
        if (! empty($this->avatars)):
            $this->setIdOfSelectedAvatar();
            $this->setAvatarIcons($idStudent);
        endif;
    }


    public function getAvatarIcons(): array
    {
        return $this->avatarIcons;
    }


    public function setIdOfSelectedAvatar():void
    {
        $this->idOfSelectedAvatar=1;
        if (! empty($this->avatarsBought)):
            foreach ($this->avatarsBought as $avatarBought):
                if($avatarBought->selected):
                    $this->idOfSelectedAvatar=$avatarBought->idAvatar_fk;
                    break;
                endif;
            endforeach;
        endif;
    }
    public function setAvatarIcons($idStudent): void
    {

    }
    private function geAvatars():array
    {
        $query_text = 'SELECT idAvatars , price FROM avatars ;';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }
    private function geAvatarsBought($idStudent)
    {
        $query_text = 'SELECT  idAvatar_fk, selected FROM student_avatar_fk WHERE idStudent_fk= ?;';
        $query = $this->db->query($query_text, $idStudent);
        return $query->getResult();
    }
}