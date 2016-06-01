<?php
namespace Yd\Model;
use Think\Model\ViewModel;

class NotesViewModel extends ViewModel {

    public $viewFields = array(
        'Notes'=>array('rid','r1','r2','r3','r4','r5','r6','r7','uid','rtime','_type'=>'LEFT'),
        'User'=>array('uid','username','_on'=>'Notes.uid=User.uid'),
    );
}