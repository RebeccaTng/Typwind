<?php

namespace App\Models;

use CodeIgniter\Entity\Cast\StringCast;
use CodeIgniter\Model;

class AvatarsModel extends Model
{

    protected $db;
    protected $DBGroup = 'default';

    const  BOUGHT_CSS_CLASS = ['avatarChoice bought','Purchased'];
    const  SELECTED_CSS_CLASS = ['avatarChoice chosen','Selected'];

    const  NO_MONEY_CSS_CLASS = ['avatarChoice locked noMoney',''];
    const  LOCK_CSS_CLASS = ['avatarChoice locked',''];

    protected int $idOfSelectedAvatar;
    private array $avatarIcons=array();
    private int $coins;
    protected function initialize()
    {
        $this->updateAvatars();
    }
    public function updateAvatars(): void
    {
        $avatars=$this->geAvatars();
        $avatarsBought=$this->geAvatarsBought(session()->id);
        $this->getCurrentCoins(session()->id);
        $this->setIdOfSelectedAvatar($avatarsBought);
        $this->setAvatarIcons($avatars,$avatarsBought);
    }

    public function getAvatarIcons(): array
    {
        return $this->avatarIcons;
    }


    public function getIdOfSelectedAvatar(): int
    {
        return $this->idOfSelectedAvatar;
    }
    public function setIdOfSelectedAvatar($avatarsBought):void
    {
        $this->idOfSelectedAvatar=1;
        if (! empty($avatarsBought)):
            foreach ($avatarsBought as $avatarBought):
                if($avatarBought->selected):
                    $this->idOfSelectedAvatar=$avatarBought->idAvatar_fk;

                    break;
                endif;
            endforeach;
        endif;
        session()->set('idOfAvatar',$this->idOfSelectedAvatar);
    }

    public function setAvatarIcons($avatars,$avatarsBought): void
    {
        $avatarIcons=array();
        if (! empty($avatars)):
                for($i=0;$i<count($avatars);$i++):
                    if($avatars[$i]->price>=$this->coins) $avatarIcons[$i] = array('idAvatars' => $avatars[$i]->idAvatars,'classCSS'=>self::NO_MONEY_CSS_CLASS[0], 'price' =>  $avatars[$i]->price);
                    else $avatarIcons[$i] = array('idAvatars' => $avatars[$i]->idAvatars,'classCSS'=>self::LOCK_CSS_CLASS[0], 'price' =>  $avatars[$i]->price);
                    if (! empty($avatarsBought)){
                        foreach ($avatarsBought as $avatarBought):
                            if($avatarBought->idAvatar_fk== $avatars[$i]->idAvatars){
                                $avatarIcons[$i]['classCSS']= self::BOUGHT_CSS_CLASS[0];
                                $avatarIcons[$i]['price']=self::BOUGHT_CSS_CLASS[1];
                                if ($avatarBought->selected){
                                    $avatarIcons[$i]['classCSS']= self::SELECTED_CSS_CLASS[0];
                                    $avatarIcons[$i]['price']=self::SELECTED_CSS_CLASS[1];
                                }
                                break;
                            }
                        endforeach;
                    }
                endfor;
        endif;
        if($this->getIdOfSelectedAvatar()!=1){
            $avatarIcons[0]['classCSS']= self::BOUGHT_CSS_CLASS[0];
            $avatarIcons[0]['price']=self::BOUGHT_CSS_CLASS[1];
        }else{
            $avatarIcons[0]['classCSS']= self::SELECTED_CSS_CLASS[0];
            $avatarIcons[0]['price']=self::SELECTED_CSS_CLASS[1];

        }
        unset($this->avatarIcons);
        $this->avatarIcons= $avatarIcons;
    }
    private function setCurrentCoins($inputCoins): void
    {
        $this->coins=0;
        if(!empty($inputCoins)){
            $this->coins=$inputCoins[0]->coins;
            session()->set('coins',$this->coins);
        }
    }
    private function getCurrentCoins($idStudent): void
    {
        $query_text = 'SELECT coins FROM students WHERE idStudents=37;';
        $query = $this->db->query($query_text,$idStudent);
        $this->setCurrentCoins($query->getResult());
    }
    private function geAvatars():array
    {
        $query_text = 'SELECT idAvatars , price FROM avatars ;';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }
    private function geAvatarsBought($idStudent):array
    {
        $query_text = 'SELECT  idAvatar_fk, selected FROM student_avatar_fk WHERE idStudent_fk= ?;';
        $query = $this->db->query($query_text, $idStudent);
        return $query->getResult();
    }

    private function updateCoins($idStudent,$coins){
        $query_text =  'UPDATE students SET coins= :coins: WHERE idStudents= :idStudents:;';
        $this->db->query($query_text, [
            'coins'     => $coins,
            'idStudents' => $idStudent,
        ]);
    }
    private function setAvatarAsBought($idOfAvatar,$idStudent){
        $query_text =  'INSERT INTO student_avatar_fk ( idAvatar_fk, idStudent_fk) VALUES (:idAvatar_fk:, :idStudent_fk:);';
        $this->db->query($query_text, [
            'idAvatar_fk'     => $idOfAvatar,
            'idStudent_fk' => $idStudent,
        ]);
    }
    public function buyAvatar($idStudent,$idOfAvatar){
        $this->db->transStart();
        $this->setAvatarAsBought($idOfAvatar,$idStudent);
        $this->updateCoins($idStudent,$this->getNewCoins($idOfAvatar));
        $this->db->transComplete();
    }
    private function  getNewCoins($idOfAvatar):int
    {
        foreach ($this->avatarIcons as $av){
            if($av['idAvatars']==$idOfAvatar) return $this->coins- $av['price'];
        }
        return 0;
    }

    public function changeSelectedAvatar($newSelectedAvatar){
        print("New avatar ".$newSelectedAvatar);
        print("\nOld avatar ".$this->getIdOfSelectedAvatar());
        $query_text =
            '    UPDATE student_avatar_fk
                SET selected
                        = CASE idAvatar_fk
                              WHEN :oldAvatar_fk: THEN false
                              WHEN :newAvatar_fk: THEN true
                              ELSE selected
                        END
                WHERE idAvatar_fk IN(:oldAvatar_fk:, :newAvatar_fk:);';
        $this->db->query($query_text, [
            'oldAvatar_fk'     => $this->getIdOfSelectedAvatar(),
            'newAvatar_fk' => $newSelectedAvatar,
        ]);
    }


}