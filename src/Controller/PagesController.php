<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function index()
    {
        $model = TableRegistry::get('Pages');
        $q = $model->find()->where(['slug' =>'about-us'])->first();
        if($q)
        $this->set('about',$q);
        
        $packages = TableRegistry::get('Packages');
        $pmodel = $packages->find()->where(['is_tour'=>0])->order(['id' =>'desc'])->all();
        if($pmodel)
        $this->set('packages',$pmodel);
    }
    public function view($slug)
    {
        $model = TableRegistry::get('Pages');
        $tags = TableRegistry::get('Tags');
        
        $q = $model->find()->where(['slug' =>$slug])->first();
        $ta = $tags->find()->where(['page_id'=>$q->id])->all();
        $pcat = array();
        $tcat = array();
        foreach($ta as $t)
        {
            if($t->package_id)
            {
                $pcat[] = $t->package_id;
            }
            if($t->tour_id)
            {
                
                $tcat[] = $t->tour_id;
            }
        }
        $this->set('tcat',$tcat);
        $this->set('pcat',$pcat);
        
        if($q)
        $this->set('page',$q);
        
    }
    function team(){
        $model = TableRegistry::get('teams')->find()->where(['is_testimonial'=>'0'])->all();
        $this->set('model',$model);
    }
    function testimonial($id=null){
        if(isset($id)&& $id != '')
            $model = TableRegistry::get('teams')->find()->where(['id'=>$id])->first();
        else
            $model = TableRegistry::get('teams')->find()->where(['is_testimonial'=>'1'])->all();
        $this->set('model',$model);
        if(!isset($id))
            $this->render('team');
    }
    function videos()
    {
        $model = $this->paginate('videos');
        $this->set('model',$model);
    }
    function contactus()
    {
        $model = TableRegistry::get('Pages');
        $tags = TableRegistry::get('Tags');
        
        $q = $model->find()->where(['id' =>6])->first();
        $ta = $tags->find()->where(['page_id'=>$q->id])->all();
        $pcat = array();
        $tcat = array();
        foreach($ta as $t)
        {
            if($t->package_id)
            {
                $pcat[] = $t->package_id;
            }
            if($t->tour_id)
            {
                
                $tcat[] = $t->tour_id;
            }
        }
        $this->set('tcat',$tcat);
        $this->set('pcat',$pcat);
        
        if($q)
        $this->set('page',$q);
    }
    
}
