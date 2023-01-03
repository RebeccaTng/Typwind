<?php

namespace App\Models;

use CodeIgniter\Model;

class Avatars extends Model
{
    private array $avatarIcons=array();
    protected $db;
    protected $DBGroup = 'default';
    protected int $idOfSelectedAvatar;
    protected array $avatars;
    protected array $avatarsBought;
    const  BOUGHT_CSS_CLASS = 'bought';
    const  SELECTED_CSS_CLASS = 'chosen';



    public function getAvatarIcons($idStudent): array
    {
        $this->avatars=$this->geAvatars();
        $this->avatarsBought=$this->geAvatarsBought($idStudent);
        if (! empty($this->avatars)):
            $this->setIdOfSelectedAvatar();
            $this->setAvatarIcons();
        endif;
        return $this->avatarIcons;
    }


    public function getIdOfSelectedAvatar(): int
    {
        return $this->idOfSelectedAvatar;
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
    public function setAvatarIcons(): void
    {
        $avatarIcons=array();
        for($i=0;$i<count($this->avatars);$i++){
            $avatarIcons[$i] = array('idAvatars' => $this->avatars[$i]->idAvatars, 'classCSS' => 'avatarChoice locked', 'price' =>  $this->avatars[$i]->price);
            if (! empty($this->avatarsBought)){
                foreach ($this->avatarsBought as $avatarBought){
                    if($avatarBought->idAvatar_fk== $this->avatars[$i]->idAvatars||$this->avatars[$i]->idAvatars==1){
                        $avatarIcons[$i]['classCSS']= 'avatarChoice'.' '.self::BOUGHT_CSS_CLASS;
                        $avatarIcons[$i]['price']='';
                        if ($avatarBought->selected){
                            $avatarIcons[$i]['classCSS']= 'avatarChoice'.' '.self::SELECTED_CSS_CLASS;
                            $avatarIcons[$i]['price']='';

                        }
                        break;
                    }
                }
            }
        }
        unset($this->avatarIcons);
        $this->avatarIcons= $avatarIcons;
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